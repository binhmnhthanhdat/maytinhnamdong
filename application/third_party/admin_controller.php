<?php if(!defined('BASEPATH')) exit('Woa...Not find system folder');

/*-----------------------------------------------
# Rao_vat version 1.0
# Admin_controller
# Extends CI_Controller
# Author: Nguyen Duc Hung - http://tinagroup.net
# Create date: 28/04/2011
------------------------------------------------*/

class Admin_controller extends CI_Controller {
	
	var $tinyMCE;
	
	function __construct() {
		
		parent::__construct();
				
		date_default_timezone_set('Asia/Bangkok');
		
		//Load util library
		$this->load->library('util');
		
		$this->load->model('user/user_group_model', 'user_group');
		$this->load->model('user/user_model', 'user');
		
		// Config show validation form
		$this->valid = $this->form_validation;
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_message('required','Không được rỗng');
		$this->form_validation->set_message('matches','Thông tin xác nhận sai');
		$this->form_validation->set_message('valid_email','Email không hợp lệ');
		
		$this->title = 'Quản trị hệ thống  - All in one';
		$this->index_url = $this->config->item('index_url');
		
		// Lay so trang trong bang setting
		//$this->db->select('product_perpage');
		//$q = $this->db->get('setting')->row();
		
		//$this->per_page = $q->product_perpage;
				
		// Kiem tra quyen xem va xoa - sua tren trang hien tai
		$this->permission_view();
	
	}
	
	
	public function check_login() {
	
		if(!$this->isLogin()) redirect('admin/user/login');
	
	}
	
	
	public function isLogin() {
	
		return ($this->session->userdata('logined') && $this->session->userdata('user_id'));
	
	}
	
	
	public function is_admin() {
	
		if(strtolower($this->session->userdata('user_name') == 'admin')) {
			return TRUE;
		} else {
			return FALSE;
		}
	
	}
	
	
	/*-----------CREATE FUCNTION PAGINATION EXTEND LIBRARY PAGINATION--------*/
	function create_page($per_page = 20, $num_link = 8, $total, $base_url) {
		
		$config['base_url'] = $base_url;
		$config['per_page'] = $per_page;
		$config['total_rows'] = $total;
		$config['page_query_string'] = TRUE;
		$config['query_string_segment'] = 'page';
		$config['num_links'] = $num_link;
		$this->pagination->initialize($config);
		
		return $this->pagination->create_links();
	}
	
	/*==============================
	################################
	*==============================*/
	
	protected function permission_view() {
	
		$quyen_xem = array();
		
		if(!$this->is_admin()) {
		
			$user_group_id = $this->session->userdata('group');
			$query  = $this->user_group->read($user_group_id);
			if(count($query) > 0) {
			
				$quyen_xem = unserialize($query->permission_view);
			} 
			
			$url = $this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$this->uri->segment(3);
			$url_per = $this->uri->segment(1).'/'.$this->uri->segment(2);
			
			$igore = array('admin/user/login', 'admin/user/change_password', 'admin/user/profile','admin/user/logout','admin/permission/error');
			
			
				if(!in_array($url,$igore))
				{			
						if(count($quyen_xem) > 0) {
							if(!in_array($url_per, $quyen_xem)) {
								redirect('admin/permission/error');
							} else {
								return TRUE;
							}
						}
					
				} else {
					return TRUE;
				} 
				
		} else {
		
			return TRUE;
		}
		
		return FALSE;
	}
	
	
	protected function permission_edit_del() {
	
		$quyen_xoa = array();
		
		if(!$this->is_admin()) {
		
			$user_group_id = $this->session->userdata('group');
			$query  = $this->user_group->read($user_group_id);
			if(count($query) > 0 ) {
				$quyen_xoa = unserialize($query->permission_edit_del);
			}	
			
			$url = $this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$this->uri->segment(3);
			$url_per = $this->uri->segment(1).'/'.$this->uri->segment(2);
			
				if($url_per) {
						
						if(count($quyen_xoa) > 0) {
							if(!in_array($url_per, $quyen_xoa)) {
								redirect('admin/permission/error');
							} else {
								return TRUE;
							}
						}
					
				}
				
		} else {
			return TRUE;
		}
		
		return FALSE;
	
	}	
	
	
	public function is_ajax() {
	
		return ($_SERVER['HTTP_X_REQUEST_WITH'] == 'XMLHttpRequest') ? TRUE : FALSE;
	
	}
	
	
	public function render($content) {
	
		$data['header'] 		= $this->headers();
		$data['content'] 		= $content;
		$data['footer'] 		= $this->footer();
		$data['body_tinymce'] 	= ($this->tinyMCE !='') ? $this->tinyMCE : NULL;
		$this->load->view('admin/admin_layout', $data);
	
	}
	
	
	function headers() {
		
		$data = array();
		
		if($this->session->userdata('username') && $this->session->userdata('user_id')) {
			$data['username'] = $this->session->userdata('username');
			$u_id = $this->session->userdata('user_id');
			$data['url_profile'] = $this->index_url.'admin/user/profile';
			$data['url_logout'] = $this->index_url.'admin/user/logout';
		}
		
		$data['title'] = 'Quản trị hệ thống | CMS TinaDesign';
		
		return $this->load->view('admin/common/header', $data, TRUE);
	}
	
	
	function menus() {
		$data = array();
		return $this->load->view('admin/common/menu', $data, TRUE);
	}
	
	
	function footer() {
		$data = array();
		return $this->load->view('admin/common/footer', $data, TRUE);
	}
	
	public function deleteFile($file) {
		
		if(is_file($file)) unlink($file);
		
	}
	
}
/* End file admin_controller */
/* Local file application/core/admin_controller.php */