<?php if(!defined('BASEPATH')) exit('Woa...Not find system folder');

/*-----------------------------------------------
# Rao_vat version 1.0
# hotro controller
# Extends CI_Controller
# Author: Nguyen Duc Hung - http://tinagroup.net
# Create date: 02/05/2011
------------------------------------------------*/
require_once APPPATH.'third_party/admin_controller'.EXT;

class Hotro extends Admin_controller {

	public function __construct() {
		
		parent:: __construct();
		
		// Check login
		$this->check_login();
		
		// Load model
		$this->load->model('hotro/hotro_model', 'hotro');
		$this->load->library('ckeditor', array('instanceName' => 'CKEDITOR1','basePath' => base_url()."ckeditor/", 'outPut' => true)); 
	 
	}
	
	public function index() {
	
		$data = array();
		$data['render_path'] = array('Admin' => base_url().'admin', 'Danh mục Liên hệ' => base_url().'admin/hotro');
		$data['heading_title'] = 'Quản lý Liên hệ';
		$data['url_create'] = base_url().'admin/hotro/add_edit';
		$data['action'] = base_url().'admin/hotro/add_edit';
		
		$del = $this->input->post('selected');

		
		if($this->input->post('act_del') == 'act_del') {
			
			if($del) {
			
				if(gettype($del) == 'array' && count($del) > 0) {
				
					foreach($del as $id) {
						
						if($this->hotro->delete($id)) {
							$this->session->set_flashdata('warning', 'Xóa danh mục thành công');
							//redirect('admin/article_type');
						} else {
							$this->session->set_flashdata('warning', 'Có lỗi xảy ra rồi');
							redirect('admin/hotro');
						}
						
					} //End foreach
				
				} // End if
			
			} else {
				$this->session->set_flashdata('warning', 'Cần chọn ít nhất 1 bản tin để xóa');
				redirect('admin/hotro');
			}
			
		}
		
			
		
		$article = $this->hotro->get_hotro_where(null, array('id' => 'DESC'), null);
        $data['count']=$article->num_rows();
			foreach($article->result() as $result) {			
				$data['lists'][] = array(
					'name' 		=> $result->name,
					'info'		=> $result->info,
					
                    'used'		=> $result->used,
					'active'		=> $result->active,
					'ord'		=> $result->ord,
					'id'		=> $result->id,
					'url_edit'	=> base_url().'admin/hotro/add_edit/'.$result->id,
					'url_del'	=> base_url().'admin/hotro/delete/'.$result->id
				);
			}
		
		
		$this->render($this->load->view('admin/hotro/index', $data, TRUE));
	
	}
	
	
	public function add_edit() {
		
		
		$_id = $this->uri->segment(4);
		$data['render_path'] = array('Admin' => base_url().'admin', 'Danh mục Liên hệ ' => base_url().'admin/hotro');
		$data['heading_title'] = 'Tạo - Cập nhật ';
		$data['action'] = base_url().'admin/hotro/add_edit';
		
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		
	
		$data['name'] = $this->input->post('name');
		$data['active'] = ($this->input->post('active') == 'on') ? 1 : 0;	
		$data['ord'] = $this->input->post('ord');
		$data['info'] = $this->input->post('info');
		$data['used'] = $this->input->post('used');
			
		$id = (int)$this->input->post('id');
		
		if($this->form_validation->run() == TRUE) {
			
			if($id && $id !='') {
			
				if($this->hotro->update($id,$data)) {
					$this->session->set_flashdata('warning', 'Cập nhật Danh mục thành công');
					redirect('admin/hotro/add_edit/'.$id);
				} else {
					$this->session->set_flashdata('warning', 'Có lỗi rồi');
					redirect('admin/hotro/add_edit');
				}
			} else {
				
					if($this->hotro->add($data)) {
						$this->session->set_flashdata('warning', 'Thêm mới Danh mục thành công');
						redirect('admin/hotro');
					} else {
						$this->session->set_flashdata('warning', 'Có lỗi rồi');
						redirect('admin/hotro/add_edit');
					}
				
			}
			
		}
		
		if($_id !='') $data['article'] = $this->hotro->get_by_id($_id);
		//$data['root'] = $this->hotro->get_root_hotro(0);
		
		$this->render($this->load->view('admin/hotro/hotro_form', $data, TRUE));
		
	}
	
	
	function delete(){
		
		//$this->permission_edit_del();
		
		$id = $this->uri->segment(4);
		/*if($this->hotro->parent_exists($id)) {
			$this->session->set_flashdata('message', 'Bạn cần xóa danh mục con trước khi xóa!');
			redirect('admin/hotro');
		} else {
		*/
			if($this->hotro->delete($id)) {
				$this->session->set_flashdata('warning', 'Xóa danh mục thành công!');
				redirect('admin/hotro');
			} else {
				$this->session->set_flashdata('warning', 'Xóa danh mục Thất bại!');
				redirect('admin/hotro');
			}
		//}
	
	}
	

}
/* End file */
/* Local application/controllers/admin/hotro.php */