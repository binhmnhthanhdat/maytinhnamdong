<?php if(!defined('BASEPATH')) exit('Woa...Not find system folder');

/*-----------------------------------------------
# Rao_vat version 1.0
# User Group controller
# Extends CI_Controller
# Author: Nguyen Duc Hung - http://tinagroup.net
# Create date: 30/04/2011
------------------------------------------------*/
require_once APPPATH.'third_party/admin_controller'.EXT;

class User_group extends Admin_controller {

	public function __construct() {
	
		parent:: __construct();
		
		// Kiem tra dang nhap
		$this->check_login();
		
		// Load model
		$this->load->model('user/user_group_model', 'user_group');
		
	}
	
	
	public function index() {
	
		$data = array();
		$data['nhom'] = array();
		$data['render_path'] = array('Admin page' => $this->index_url.'admin', 'User group' => '');
		$data['heading_title'] = 'User Group';
		$data['url_create'] = $this->index_url.'admin/user_group/add_edit';
		
		$group_list = $this->user_group->get();
		
		if($group_list->num_rows() > 0 ) {
			
			foreach($group_list->result() as $row) {
				
				$data['nhom'][] = array(
					'group_name' 	=> $row->user_group_name,
					'group_id' 		=> $row->user_group_id,
					'url_del' 	=> $this->index_url.'admin/user_group/delete/'.$row->user_group_id,
					'url_edit'	=> $this->index_url.'admin/user_group/add_edit/'.$row->user_group_id,
				);
			}
			
		}
		
		$this->render($this->load->view('admin/user/user_group_index', $data, TRUE)); 
	
	}
	
	
	public function add_edit() {
	
		$data = array();
		$_id = (int)$this->uri->segment(4);
		if($_id) {
			$data['render_path'] = array('Admin' => $this->index_url.'admin', 'User group' => $this->index_url.'admin/user_group', 'Update user group' => '');
		} else {
			$data['render_path'] = array('Admin' => $this->index_url.'admin', 'User group' => $this->index_url.'admin/user_group', 'Create new group' => '');

		}
		
		$data['heading_title'] = 'Thêm mới nhóm quyền';
		$data['action'] = $this->index_url.'admin/user_group/add_edit';
		
		// Config form_valid
		$this->form_validation->set_rules('group_name', 'Group name', 'trim|required');
		$this->form_validation->set_rules('permis_view[]', 'Permission View', 'required');
		$this->form_validation->set_rules('permis_edit_delete[]', 'Permission Edit Delete', 'required');
		
		// Get data from $_POST
		$id = $this->input->post('id');
		$data['name'] 				= $this->input->post('group_name');
		$data['permis_view'] 		= serialize($this->input->post('permis_view'));
		$data['permis_edit_delete'] = serialize($this->input->post('permis_edit_delete'));
				
		if($this->form_validation->run() == TRUE) {
			
			if($id != NULL) {
				if($this->user_group->update($id, $data)) {
					$this->session->set_flashdata('warning', 'Cập nhật quyền thành công');
					redirect('admin/user_group');
				} else {
					$this->session->set_flashdata('warning', 'Có lỗi trong quá trình cập nhật');
					redirect('admin/user_group/create'.$id);
				}
			} else {
				if($this->user_group->create($data)) {
					$this->session->set_flashdata('warning', 'Thêm mới quyền thành công');
					redirect('admin/user_group');
				} else {
					$this->session->set_flashdata('warning', 'Có lỗi trong quá trình thêm mới');
					redirect('admin/user_group/create');
				}
			}
			
		} 
		
		// Lay tat ca cac file trong controllers admin
		$data['permissions'] = array();
		$files = glob('application/controllers/admin/*.php');
		$file_igore = array('admin/permission', 'admin/home');
		if(count($files)) {
			
				foreach($files as $file) {
				
					$permis = 'admin/'.basename($file,'.php');
					
					if(!in_array($permis, $file_igore)) {
						$data['permissions'][] = $permis;
					}
				}
			
		}
		
		$_id = (int)$this->uri->segment(4);
		if($_id) {
			
			$result = $this->user_group->read($_id);
			
			$data['group_id'] = $result->user_group_id;
			$data['group_name'] = $result->user_group_name;
			$data['permission_view'] = unserialize($result->permission_view);
			$data['permission_edit_delete'] = unserialize($result->permission_edit_del);
			
		}
		
		$this->render($this->load->view('admin/user/user_group_form', $data, TRUE));
	
	}
	
	
	public function delete() {
	
		$this->permission_edit_del();
		
		$id = $this->uri->segment(4);
		
		if($this->user_group->delete($id)) {
			$this->session->set_flashdata('warning', 'Xóa nhóm quyền thành công');
			redirect('admin/user_group');
		} else {
			$this->session->set_flashdata('warning', 'Có lỗi rồi bạn ơi');
			redirect('admin/user_group');
		}
	
	}

}
/* End file user_group */
/* Local application controllers/admin/user_group.php  */
