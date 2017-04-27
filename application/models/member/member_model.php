<?php if(!defined('BASEPATH')) exit ('Woa...Not Find System Folder');

/*-----------------------------------------------
# Rao_vat version 1.0
# Model Member
# Extends CI_Model
# Author: Nguyen Duc Hung - http://tinagroup.net
# Create date: 09/05/2011
------------------------------------------------*/

class Member_model extends CI_Model {
	
	var $table = 'member';
	
	function __construct() {
		
		parent:: __construct();
		
	}
	
	
	public function register_mem($data) {
	
		$this->db->set('mem_name', $data['username']);
		$this->db->set('mem_password', $data['pass']);
		$this->db->set('mem_email', $data['email']);
		$this->db->set('mem_address', $data['address']);
		$this->db->set('mem_phone', $data['phone']);
		$this->db->set('key_active', $data['key_active']);
		$this->db->set('create_date', $data['create_date']);
		
		if($this->db->insert($this->table)) return TRUE; else return FALSE;
	
	}
	
	
	public function login($username) {
		
		$this->db->select('mem_name, mem_id, mem_password, mem_active');
		$q = $this->db->get_where($this->table, array('mem_name' => $username));
		
		if($q->num_rows() > 0)  {
			return $q;
			return TRUE; 
		} else {
			return FALSE;
		}
		
	}
	
	
	public function user_active($uid, $key) {
		
		$q = $this->db->get_where($this->table, array('mem_id' => $uid, 'key_active' => $key));
		
		if($q->num_rows() > 0) {
			$this->db->where('mem_id', $uid);
			$this->db->set('key_active', NULL);
			$this->db->set('mem_active', 1);
			if($this->db->update($this->table)) return TRUE; else return FALSE;
		} else {
			return FALSE;
		}
		
	}
	
	
	public function check_username($username) {
	
		if($username !='') {
			
			$q = $this->db->get_where($this->table, array('mem_name' => $username));
			
			if($q->num_rows() > 0) return TRUE; else return FALSE;
		}
	
	}
	
	
	public function check_email($email= null, $uid = null) {
			
		$this->db->select('mem_email');	
		if($email != null) $this->db->where('mem_email', $email);
		if($uid != null) $this->db->where('mem_id !=', $uid);
		$q = $this->db->get($this->table);
			
		if($q->num_rows() > 0) return TRUE; else return FALSE;
		
	
	}
	
	
	public function get_mem_by_id($uid) {
		
		$this->db->select('mem_name, mem_email, mem_address, mem_phone, mem_website, mem_sex, mem_avatar, mem_fullname, mem_nick');
		
		$q = $this->db->get_where($this->table, array('mem_id' => $uid));
		
		return $q->row();
		
	}
	
	public function profile($uid,$data) {
	
		$this->db->where('mem_id', $uid);
		$this->db->set('mem_email', $data['email']);
		$this->db->set('mem_address', $data['address']);
		$this->db->set('mem_phone', $data['phone']);
		$this->db->set('mem_website', $data['website']);
		$this->db->set('mem_sex', $data['sex']);
		$this->db->set('mem_avatar', $data['avatar']);
		$this->db->set('mem_fullname', $data['fullname']);
		$this->db->set('mem_nick', $data['nick']);
		
		if($this->db->update($this->table)) return TRUE; else return FALSE;
	
	}
	
	
	public function check_pass($pass) {
		
		$this->db->select('mem_password');
		$q = $this->db->get_where($this->table, array('mem_password' => $pass));
		
		if($q->num_rows() > 0) return TRUE; else return FALSE;
		
	}
	
	public function update_pass($new_pass) {
		
		$this->db->where('mem_id', $this->session->userdata('mem_id'));
		$this->db->set('mem_password', $new_pass);
		if($this->db->update($this->table)) return TRUE; else return FALSE;
		
	}
	
	public function get_all($active = null, $order = null, $limit = null) {
		
		if($active != null) $this->db->where('mem_active', $active);
		
		if($order != null) {
			foreach($order as $key => $val) {
				$this->db->order_by($key, $val);
			}
		}
		
		if($limit != null) {
			$this->db->limit($limit['max'], $limit['begin']);
		}
		
		$this->db->select('mem_id, mem_name, mem_email, mem_active, create_date');
		
		$q = $this->db->get($this->table);
		
		return $q;
		
		$q->free_result();
		
	}
	
	
	public function total($active = null) {
		
		if($active != null) $this->db->where('mem_active', $active);
		return $this->db->count_all_results($this->table);
	}
	
	function get_member($id) {
	
		$this->db->where('mem_id', $id);
		$this->db->select('mem_name');
		$q = $this->db->get($this->table)->row();
		
		return $q->mem_name;
		
		$q->free_result();
		
	}

}
// End file
// Local application/mdoels/member/member_model.php
