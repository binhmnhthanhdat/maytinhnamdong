<?php if(!defined('BASEPATH')) exit('Woa...Not find system folder');

/*-----------------------------------------------
# Rao_vat version 1.0
# Memner Controler
# Extends CI_Controller
# Author: Nguyen Duc Hung - http://tinagroup.net
# Create date: 23/05/2011
------------------------------------------------*/
require_once APPPATH.'third_party/admin_controller'.EXT;

class Member extends Admin_controller {

	function __construct() {
	
		parent:: __construct();
		
		$this->check_login();
		
		$this->load->model('member/member_model', 'member');
	
	}
	
	public function index() {
	
		$data = array();
		
		$data['render_path'] = array('Admin' => $this->index_url.'admin', 'Member' => '#');
		$data['heading_title'] = 'Danh sách thành viên';
		
		$page = (int)$this->input->get('page');
		$active = $this->input->get('active');
		
		//Pagination
		$config['base_url'] = $this->index_url.'admin/member/?active='.$active;
		$config['total_rows'] = $this->member->total($active);
		$config['page_query_string'] = TRUE;
		$config['query_string_segment'] = 'page';
		$config['per_page'] = $this->per_page;
		$config['num_links'] = 10;
		$this->pagination->initialize($config);
		
		$data['page'] = $this->pagination->create_links();
		
		$data['member'] = $this->member->get_all($active, array('mem_id' => 'desc'), array('max' => $config['per_page'], 'begin' => $page));
		
		$data['active'] = $active;
		$data['total_mem'] = $this->member->total($active);
		
		$this->render($this->load->view('admin/member/member_index', $data, TRUE));
	
	}

}
// End file
// Local application/controllers/admin/member.php