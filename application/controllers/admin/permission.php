<?php if(!defined('BASEPATH')) exit('Woa...Not find system folder');

/*-----------------------------------------------
# Rao_vat version 1.0
# Permission controller
# Extends CI_Controller
# Author: Nguyen Duc Hung - http://tinagroup.net
# Create date: 30/04/2011
------------------------------------------------*/
require_once APPPATH.'third_party/admin_controller'.EXT;

class Permission extends Admin_controller {

	function __construct() {
		parent::__construct();
	}
	
	function error() {
	
		$this->render($this->load->view('admin/other/error', array(), TRUE));
	
	}

}