<?php if(!defined('BASEPATH')) exit('Woa...Not find system folder');

/*-----------------------------------------------
# Rao_vat version 1.0
# Product Controler
# Extends CI_Controller
# Author: Nguyen Duc Hung - http://tinagroup.net
# Create date: 17/05/2011
------------------------------------------------*/
require_once APPPATH.'third_party/public_controller'.EXT;

class Partner extends Public_controller {

	function __construct() {
		
		parent:: __construct();	
	}
	
	public function index() {
		$data['render_path'] = array('Trang chủ' => site_url('trang-chu'), 'Đối tác' => site_url('#'));
		$this->site_title = 'Đối tác | '. $this->site_title;
		
		$q = $this->db->get('partner')->row();
		$data['content'] = $q->content;
		
		$this->render($this->load->view('page_other', $data, TRUE), '3col');
	}
}