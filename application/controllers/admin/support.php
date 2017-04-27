<?php if(!defined('BASEPATH')) exit('Woa...Not find system folder');

/*-----------------------------------------------
# Rao_vat version 1.0
# Support controller
# Extends CI_Controller
# Author: Nguyen Duc Hung - http://tinagroup.net
# Create date: 02/05/2011
------------------------------------------------*/
require_once APPPATH.'third_party/admin_controller'.EXT;

class Support extends Admin_controller {

	function __construct() {
	
		parent:: __construct();
		
		// Check login
		$this->check_login();
		
		$this->load->model('other/support_model', 'support');
	
	}
	
	
	public function index() {
	
		$data = array();
		$data['render_path'] = array('Admin' => $this->index_url.'admin', 'Hổ trợ trực tuyến' => $this->index_url.'admin/support');
		$data['heading_title'] = 'Quản lý Hổ trợ trực tuyến';
		$data['url_create'] = $this->index_url.'admin/support/create';
		$data['action'] = $this->index_url.'admin/support';
		
		$del = $this->input->post('delete');
		
		if($this->input->post('act_del') == 'act_del') {
			
			if($del) {
			
				if(gettype($del) == 'array' && count($del) > 0) {
				
					foreach($del as $id) {
						
						if($this->support->delete($id)) {
							$this->session->set_flashdata('message', 'Xóa bản tin thành công');
							
						} else {
							$this->session->set_flashdata('message', 'Có lỗi xảy ra rồi');
							redirect('admin/support');
						}
						
					} //End foreach
				
				} // End if
			
			} else {
				$this->session->set_flashdata('message', 'Cần chọn ít nhất 1 bản tin để xóa');
				redirect('admin/support');
			}
			
		}
				
		$article = $this->support->get_all('desc');
		
		if($article->num_rows() > 0) {
			
			foreach($article->result() as $result) {			
				$data['lists'][] = array(
					'id' 		=> $result->s_id,
					'name'		=> $result->s_nickname,
					'desc'		=> $result->s_desc,
					'url_edit'	=> $this->index_url.'admin/support/create/'.$result->s_id,
					'url_del'	=> $this->index_url.'admin/support/delete/'.$result->s_id
				);
			}
		}
		
		$this->render($this->load->view('admin/support/support_index', $data, TRUE));

	}
	
	
	public function create() {
	
		$this->permission_edit_del();
		
		$data = array();
		
		$_id = $this->uri->segment(4);
		$data['render_path'] = array('Admin' => $this->index_url.'admin', 'Hổ trợ trực tuyến' => $this->index_url.'admin/support', ($_id ? 'Sửa <b>'.$this->support->get_name($_id).'</b>' : 'Thêm mới') => '#');
		$data['heading_title'] = 'Thêm - Sửa Nick name';
		$data['action'] = $this->index_url.'admin/support/create';
		
		$this->valid->set_rules('name', 'Name', 'required');
		$this->valid->set_rules('desc', 'Desc', '');
		
		$data['nickname'] = $this->input->post('name');
		$data['s_desc'] = $this->input->post('desc');
		
		$id = (int)$this->input->post('id');
		
		if($this->form_validation->run() == TRUE) {
			
			if($id) {
			
				if($this->support->update($id,$data)) {
					$this->session->set_flashdata('message', 'Cập nhật thành công');
					redirect('admin/support/create/'.$id);
				} else {
					$this->session->set_flashdata('message', 'Có lỗi rồi');
					redirect('admin/support/create');
				}
			} else {
				if($this->support->add($data)) {
					$this->session->set_flashdata('message', 'Thêm mới thành công');
					redirect('admin/support');
				} else {
					$this->session->set_flashdata('message', 'Có lỗi rồi');
					redirect('admin/support/create');
				}
			}
			
		}
		
		if($_id !='') $data['article'] = $this->support->get_by_id($_id);
		
		$this->render($this->load->view('admin/support/support_form', $data, TRUE));
	
	}
	
	
	public function delete(){
	
		$this->permission_edit_del();
		
		$id = $this->uri->segment(4);
		
		if($this->support->delete($id)) {
			$this->session->set_flashdata('message', 'Xóa bản tin thành công');
			redirect('admin/support');
		} else {
			$this->session->set_flashdata('message', 'Có lỗi rồi bạn ơi');
			redirect('admin/support');
		}
	
	}

}

/* End file */
/* Local application/controlers/admin/support.php */