<?php  if(!defined('BASEPATH')) exit('Woa...Not find system folder');

/*-----------------------------------------------
# Rao_vat version 1.0
# menu controller
# Extends CI_Controller
# Author: Nguyen Duc Hung - http://tinagroup.net
# Create date: 02/05/2011
------------------------------------------------*/
require_once APPPATH.'third_party/admin_controller'.EXT;

class Menu extends Admin_controller {

	public function __construct() {
		
		parent:: __construct();
		
		// Check login
		$this->check_login();
		
		// Load model
		$this->load->model('menu/menu_model', 'menu');
		$this->load->library('ckeditor', array('instanceName' => 'CKEDITOR1','basePath' => base_url()."ckeditor/", 'outPut' => true)); 
	 
	}
	
	public function index() {
	
		$data = array();
		$data['render_path'] = array('Admin' => base_url().'admin/trangchu/index', 'Danh mục menu' => base_url().'admin/menu/index');
		$data['heading_title'] = 'Quản lý danh mục';
		$data['url_create'] = base_url().'admin/menu/add_edit';
		$data['action'] = base_url().'admin/menu/add_edit';
		
		$del = $this->input->post('selected');

		/*$page = $this->input->get('page') ? $this->input->get('page') : 1;
		$active = (int)$this->input->get('active');
		$show = (int)$this->input->get('show');
		//print_r($delete);
		*/
		if($this->input->post('act_del') == 'act_del') {
			
			if($del) {
			
				if(gettype($del) == 'array' && count($del) > 0) {
				
					foreach($del as $id) {
						
						if($this->menu->delete($id)) {
							$this->session->set_flashdata('warning', 'Xóa danh mục thành công');
							
						} else {
							$this->session->set_flashdata('warning', 'Có lỗi xảy ra rồi');
							redirect('admin/menu/index');
						}
						
					} //End foreach
				    redirect('admin/menu/index');
				} // End if
			
			} else {
				$this->session->set_flashdata('warning', 'Cần chọn ít nhất 1 bản tin để xóa');
				redirect('admin/menu/index');
			}
			
		}
		
			
		
		$article = $this->menu->get_menu_where(null, array('ord' => 'asc'), null);
         $data['count']=$article->num_rows();
			foreach($article->result() as $result) {			
				$data['lists'][] = array(
					'id' 		=> $result->id,
					'ord' 		=> $result->ord,
                    'alias' 		=> $result->alias,
                    'home' 		=> $result->home,
					'name'		=> $result->name,
                   
                   	'active' 		=> $result->active,
				    'type' 		=> $result->type,
                    'link' 		=> $result->link,
                    'parent' 		=> $result->parent,
					'url_edit'	=> base_url().'admin/menu/add_edit/'.$result->id,
					'url_del'	=> base_url().'admin/menu/delete/'.$result->id
				);
			}
		
		
		$this->render($this->load->view('admin/menu/index', $data, TRUE));
	
	}
	
	
	public function add_edit() {
		
		
		$_id = $this->uri->segment(4);
		$data['render_path'] = array('Admin' => base_url().'admin', 'Danh mục sản phẩm' => base_url().'admin/menu/index');
		$data['heading_title'] = 'Tạo - Cập nhật danh mục';
		$data['action'] = base_url().'admin/menu/add_edit';
		
		$this->form_validation->set_rules('name', 'Name', 'trim|required');

		
		$data['name'] = $this->input->post('name');
        
	    $data['link'] = $this->input->post('link');
		$data['ord'] = $this->input->post('ord');
        $data['parent'] = $this->input->post('parent');
         $data['type'] = $this->input->post('type');
		$data['active'] = ($this->input->post('active') == 'on') ? 1 : 0;
        $data['home'] = ($this->input->post('home') == 'on') ? 1 : 0;		
		$id = (int)$this->input->post('id');
	   if($this->form_validation->run() == TRUE) {
		 
			if($id && $id !='') {
			
				if($this->menu->update($id,$data)) {
					$this->session->set_flashdata('warning', 'Cập nhật Danh mục thành công');
					redirect('admin/menu/add_edit/'.$id);
				} else {
					$this->session->set_flashdata('warning', 'Có lỗi rồi');
					redirect('admin/menu/add_edit');
				}
			} else {
				
					if($this->menu->add($data)) {
						$this->session->set_flashdata('warning', 'Thêm mới Danh mục thành công');
						redirect('admin/menu/index');
					} else {
						$this->session->set_flashdata('warning', 'Có lỗi rồi');
						redirect('admin/menu/add_edit');
					}
				
			}
			
		}
	//	$data['cat'] = $this->menu->get_menu_where(array('parent'=>'0'), array('id' => 'DESC'), null);
		if($_id !='') $data['article'] = $this->menu->get_by_id($_id);
		//$data['root'] = $this->menu->get_root_menu(0);
		
		$this->render($this->load->view('admin/menu/menu_form', $data, TRUE));
		
	}
	
	
	function delete(){
		$id = $this->uri->segment(4);
			if($this->menu->delete($id)) {
				$this->session->set_flashdata('warning', 'Xóa danh mục thành công!');
				redirect('admin/menu/index');
			} else {
				$this->session->set_flashdata('warning', 'Xóa danh mục Thất bại!');
				redirect('admin/menu/index');
			}
		//}
	
	}
	

}
/* End file */
/* Local application/controllers/admin/menu.php */