<?php if(!defined('BASEPATH')) exit('Woa...Not find system folder');

/*-----------------------------------------------
# Rao_vat version 1.0
# Category controller
# Extends CI_Controller
# Author: Nguyen Duc Hung - http://tinagroup.net
# Create date: 02/05/2011
------------------------------------------------*/
require_once APPPATH.'third_party/admin_controller'.EXT;

class Category extends Admin_controller {

	public function __construct() {
		
		parent:: __construct();
		
		// Check login
		$this->check_login();
		
		// Load model
		$this->load->model('product/category_model', 'category');
		
	}
	
	public function index() {
	
		$data = array();
		$data['render_path'] = array('Admin' => $this->index_url.'admin', 'Danh mục sản phẩm' => $this->index_url.'admin/category');
		$data['heading_title'] = 'Quản lý danh mục';
		$data['url_create'] = $this->index_url.'admin/category/add_edit';
		$data['action'] = $this->index_url.'admin/category';
		
		$del = $this->input->post('selected');

		/*$page = $this->input->get('page') ? $this->input->get('page') : 1;
		$active = (int)$this->input->get('active');
		$show = (int)$this->input->get('show');
		//print_r($delete);
		*/
		if($this->input->post('act') == 'act_del') {
			
			if($del) {
			
				if(gettype($del) == 'array' && count($del) > 0) {
				
					foreach($del as $id) {
						
						if($this->category->delete($id)) {
							$this->session->set_flashdata('warning', 'Xóa danh mục thành công');
							redirect('admin/category');
						} else {
							$this->session->set_flashdata('warning', 'Có lỗi xảy ra rồi');
							redirect('admin/category');
						}
						
					} //End foreach
				
				} // End if
			
			} else {
				$this->session->set_flashdata('warning', 'Cần chọn ít nhất 1 bản tin để xóa');
				redirect('admin/category');
			}
			
		}
		
		/// Config pagination
		$config['base_url'] = $this->index_url.'admin/category/index';
		$config['total_rows'] = $this->category->totals();
		$config['uri_segment'] = 4;
		//$config['page_query_string'] = TRUE;
		//$config['query_string_segment'] = 'page';
		$config['per_page'] = 20;
		$config['num_links'] = 8;
		$this->pagination->initialize($config);
		$data['page'] = $this->pagination->create_links();
		$data['total_record'] = $this->category->totals();		
		
		$article = $this->category->get_category_where(null, array('catid' => 'DESC'), array('max' => $config['per_page'] , 'begin' => $this->uri->segment(4)));
			foreach($article->result() as $result) {			
				$data['lists'][] = array(
					'id' 		=> $result->catid,
					'name'		=> $result->cat_name,
					'show' 		=> $result->show_home,				
                    'parent' 		=> $result->parent,
                    'ord' 		=> $result->ord,
					'url_edit'	=> $this->index_url.'admin/category/add_edit/'.$result->catid,
					'url_del'	=> $this->index_url.'admin/category/delete/'.$result->catid
				);
			}
		
		
		$this->render($this->load->view('admin/product/category/index', $data, TRUE));
	
	}
	
	
	public function add_edit() {
		
		$this->permission_edit_del();
		
		$_id = $this->uri->segment(4);
		$data['render_path'] = array('Admin' => $this->index_url.'admin', 'Danh mục sản phẩm' => $this->index_url.'admin/category');
		$data['heading_title'] = 'Tạo - Cập nhật danh mục';
		$data['action'] = $this->index_url.'admin/category/add_edit';
		
		$this->valid->set_rules('name', 'Name', 'trim|required');
		$this->valid->set_rules('show_home', 'Show home', '');
		
		$data['name'] = $this->input->post('name');
		$data['alias'] = $this->util->alias($data['name']);
		$data['show_home'] = ($this->input->post('show_home') == 'on') ? 1 : 0;				
        $data['parent'] = $this->input->post('parent');
		$id = (int)$this->input->post('id');
		$data['ord'] = $this->input->post('ord');
		if($this->form_validation->run() == TRUE) {
			
			if($id) {
			
				if($this->category->update($id,$data)) {
					$this->session->set_flashdata('warning', 'Cập nhật Danh mục thành công');
					redirect('admin/category/add_edit/'.$id);
				} else {
					$this->session->set_flashdata('warning', 'Có lỗi rồi');
					redirect('admin/category/add_edit');
				}
			} else {
				
					if($this->category->add($data)) {
						$this->session->set_flashdata('warning', 'Thêm mới Danh mục thành công');
						redirect('admin/category');
					} else {
						$this->session->set_flashdata('warning', 'Có lỗi rồi');
						redirect('admin/category/add_edit');
					}
				
			}
			
		}
		
		if($_id !='') $data['article'] = $this->category->get_by_id($_id);
		//$data['root'] = $this->category->get_root_category(0);
		$sql="select * from category where parent=0";	        $data['cat']= $this->db->query($sql)->result();
		$this->render($this->load->view('admin/product/category/category_form', $data, TRUE));
		
	}
	
	
	function delete(){
		
		$this->permission_edit_del();
		
		$id = $this->uri->segment(4);
		/*if($this->category->parent_exists($id)) {
			$this->session->set_flashdata('message', 'Bạn cần xóa danh mục con trước khi xóa!');
			redirect('admin/category');
		} else {
		*/
			if($this->category->delete($id)) {
				$this->session->set_flashdata('warning', 'Xóa danh mục thành công!');
				redirect('admin/category');
			} else {
				$this->session->set_flashdata('warning', 'Xóa danh mục Thất bại!');
				redirect('admin/category');
			}
		//}
	
	}
	

}
/* End file */
/* Local application/controllers/admin/category.php */