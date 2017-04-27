<?php if(!defined('BASEPATH')) exit ('Woa...Not Find System Folder');

/*-----------------------------------------------
# Rao_vat version 1.0
# Model Member
# Extends CI_Model
# Author: Nguyen Duc Hung - http://tinagroup.net
# Create date: 09/05/2011
------------------------------------------------*/
class Member_baned_model extends CI_Model {

	var $table = 'member_baned';

	function __construct() {
		
		parent:: __construct();
		
	}
	
	
	function add($data) {
		
		$this->db->set('mem_id', $data['mem_id']);
		$this->db->set('banned', 1);
		$this->db->set('desc', $data['desc']);
		$this->db->set('date_begin', $data['begin']);
		$this->db->set('date_end', $data['end']);
		
		if($this->db->insert($this->table)) return TRUE; else return FALSE;
		
	}

}
// End file
// Local applicaiton/models/member_baned_model.php