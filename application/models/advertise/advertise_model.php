<?php 
if(!defined('BASEPATH')) exit ('Woa...Not Find System Folder');

/*-----------------------------------------------
# Rao_vat version 1.0
# Model Advertise
# Extends CI_Model
# Author: Nguyen Duc Hung - http://tinagroup.net
# Create date: 28/05/2011
------------------------------------------------*/
class Advertise_model extends CI_Model {

	var $table = 'advertise';
	var $cus = 'customer';

	public function __construct() {
		
		parent:: __construct();
		
	}
	
	
	function add($data) {
		
		$this->db->set('cus_id', $data['cus_id']);
		$this->db->set('image_url', $data['image_url']);
		$this->db->set('file_type', $data['file_type']);
		$this->db->set('position', $data['position']);
		$this->db->set('page_view', $data['page_view']);
		$this->db->set('active', $data['active']);
		$this->db->set('date_begin', $data['date_begin']);
		$this->db->set('date_end', $data['date_end']);
		$this->db->set('desc', $data['desc']);
		$this->db->set('link_to', $data['link_to']);
		
		if($this->db->insert($this->table)) return TRUE; else return FALSE;
		
	}
	
	function update($id, $data) {
		
		$this->db->where('id', $id);
		$this->db->set('cus_id', $data['cus_id']);
		$this->db->set('image_url', $data['image_url']);
		$this->db->set('file_type', $data['file_type']);
		$this->db->set('position', $data['position']);
		$this->db->set('page_view', $data['page_view']);
		$this->db->set('active', $data['active']);
		$this->db->set('date_begin', $data['date_begin']);
		$this->db->set('date_end', $data['date_end']);
		$this->db->set('desc', $data['desc']);
		$this->db->set('link_to', $data['link_to']);
		
		if($this->db->update($this->table)) return TRUE; else return FALSE;
		
	}
	
	function read($id) {
		
		$q = $this->db->get_where($this->table, array('id' => $id));
		if($q->num_rows() > 0) {
			return $q;
		} else {
			return FALSE;
		}
		
		$q->free_result();
	}

	function delete($id) {
		
		$this->db->where('id', $id);
		if($this->db->delete($this->table)) return TRUE; else return FALSE;
		
	}
	
	function get_all($active = null, $cus = null, $position = null, $page_view = null, $limit = null) {
		
		if($active !=null) $this->db->where('active', $active);
		if($cus !=null) $this->db->where('cus_id', $cus);
		if($position !=null) $this->db->where('position', $position);
		if($page_view !=null) $this->db->where('page_view', $page_view);
		
		$this->db->order_by('id', 'desc');
		
		if($limit != null) {
			$this->db->limit($limit['max'], $limit['begin']);
		}
		
		$q = $this->db->get($this->table);
		
		return $q;
		
		$q->free_result();
		
	}
	
	function select($where = null, $limit = null) {
		
		if($where != null) {
			foreach($where as $key => $val) {
				$this->db->where($key, $val);
			}
		}
		
		if($limit != null) $this->db->limit($limit['max'], $limit['begin']);
		
		$q  = $this->db->get($this->table);
		
		return $q;
		$q->free_result();
		
	}
	
	function total($active = null, $cus = null, $position = null, $page_view = null) {
	
		if($active !=null) $this->db->where('active', $active);
		if($cus !=null) $this->db->where('cus_id', $cus);
		if($position !=null) $this->db->where('position', $position);
		if($page_view !=null) $this->db->where('page_view', $page_view);
		
		return $this->db->count_all_results($this->table);
		
	}
	
	/*-------------------------------
	 *
	 * Phan xu ly tren bang Customer
	 *
	--------------------------------*/
	function add_cus($data) {
		
		$this->db->set('cus_name', $data['name']);
		$this->db->set('cus_address', $data['address']);
		$this->db->set('cus_phone', $data['phone']);
		$this->db->set('cus_email', $data['email']);
		
		if($this->db->insert($this->cus)) return TRUE; else return FALSE;
		
	}
	
	function update_cus($id, $data) {
		
		$this->db->where('cus_id', $id);
		$this->db->set('cus_name', $data['name']);
		$this->db->set('cus_address', $data['address']);
		$this->db->set('cus_phone', $data['phone']);
		$this->db->set('cus_email', $data['email']);
		
		if($this->db->update($this->cus)) return TRUE; else return FALSE;
		
	}
	
	
	function get_cus($id) {
		
		$q = $this->db->get_where($this->cus, array('cus_id' => $id));
		if($q->num_rows() > 0) {
			return $q->row();
		} else {
			return FALSE;
		}
		
		$q->free_result();
	}
	
	function del_cus($id) {
		
		$this->db->where('cus_id', $id);
		
		if($this->db->delete($this->cus)) return TRUE; else return FALSE;
		
	}
	
	function select_cus($limit = null) {
	
		if($limit != null) $this->db->limit($limit['max'], $limit['begin']);
		$q = $this->db->get($this->cus);
		return $q;
		$q->free_result();
		
	}
	
	function total_cus() {
		return $this->db->count_all_results($this->cus);
	}
	
}
// End file
// Local application/models/advertise/advertiese_model.php

