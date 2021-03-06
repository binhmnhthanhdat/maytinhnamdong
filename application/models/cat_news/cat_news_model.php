<?php
if(!defined('BASEPATH')) exit ('Woa...Not Find System Folder');

/*-----------------------------------------------
# Rao_vat version 1.0
# Model Category
# Extends CI_Model
# Author: Nguyen Duc Hung - http://tinagroup.net
# Create date: 26/04/2011
------------------------------------------------*/
class Cat_news_model extends CI_Model {

	var $table = 'cat_news';
	
	function __construct() {
		
		parent:: __construct();
		
	}
	
	
	function add($data) {
		
		$this->db->set('name', $data['name']);
		$this->db->set('alias', $data['alias']);
		$this->db->set('link', $data['link']);
		$this->db->set('type', $data['type']);
		$this->db->set('active', $data['active']);
		$this->db->set('ord', $data['ord']);
		$this->db->set('parent', $data['parent']);
		if($this->db->insert($this->table)) return TRUE; else return FALSE;
		
	}
	
	
	function update($id, $data) {
		
		$this->db->where('id', $id);
		$this->db->set('name', $data['name']);
		$this->db->set('alias', $data['alias']);
		$this->db->set('link', $data['link']);
		$this->db->set('type', $data['type']);
		$this->db->set('active', $data['active']);
		$this->db->set('ord', $data['ord']);
		$this->db->set('parent', $data['parent']);
		
		if($this->db->update($this->table)) return TRUE; else return FALSE;
		
	}
	
	
	function get_by_id($id) {
		
		$q = $this->db->get_where($this->table, array('id' => $id));
		
		return $q->row();
		
		$q->free_result();
	}
	
	
	function get_root_cat_news($parent) {
		
		$q = $this->db->get_where($this->table, array('parent' => $parent));
		
		return $q;
		
		$q->free_result();
		
	}
	
	
	function delete($id) {
		
		$this->db->where('id', $id);
		
		if($this->db->delete($this->table)) return TRUE; else return FALSE;
		
	}
	
	
	function get_cat_news_where($where = null, $order = null, $limit = null) {
		
		if($where !=null) {
			foreach($where as $key => $val) {
				if($key[0] =='?')
				{
					$this->db->where_in(substr($key, 1), $val);
				} elseif($key[0] =='!')
				{
					$this->db->where_not_in(substr($key, 1), $val);
				} else {
					$this->db->where($key, $val);
				}
			}
		}
		
		if($order != null) {
			foreach($order as $key => $val) {
				$this->db->order_by($key, $val);
			}
		}
		
		if($limit != null)
		{
			$this->db->limit($limit['max'], $limit['begin']);
		}
		
		$q = $this->db->get($this->table);
		
		return $q;
		
		$q->free_result();
		
	}
	
	public function totals()
	{
		return $this->db->count_all_results($this->table);
	}
	
	function get_all($root) {
		
		$cat = array();
		
		$q = $this->db->query("SELECT * FROM category WHERE parent = ".$root);
		
		foreach($q->result() as $row) {
			$cat[] = array(
				'id' 		=> $row->id,
				'cat_name' 		=> $this->getPath($row->id),
				'cat_show'		=> $row->show_home,
				'cat_active'	=> $row->active
			);
			
			$cat = array_merge($cat, $this->get_all($row->id));
		}
		
		return $cat;
	}
	
	function getPath($id) {
		
		$query = $this->db->query("SELECT * FROM cat_news WHERE id=".$id);
		
		$category = $query->row();
		if($category->parent) {
			return $this->getPath($category->parent). '&nbsp;>&nbsp;'.$category->category_name;
		} else  {
			return $category->category_name;
		}
		
	}
	
	
	function get_name($id) {
		
		$this->db->select('name');
		$q = $this->db->get_where($this->table, array('id' => $id));
		
		$result = $q->row();
		
		return $result->cat_name;
		
	}
	
	function get_name_alias($id) {
		
		$this->db->select('alias');
		$q = $this->db->get_where($this->table, array('id' => $id));
		
		$result = $q->row();
		
		return $result->alias;
		
	}

}
// End file
// Local appllication/models/product/cateegory_model.php
