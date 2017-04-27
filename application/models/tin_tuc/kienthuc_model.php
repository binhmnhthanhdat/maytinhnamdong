<?php if(!defined('BASEPATH')) exit ('Not script access allow');

/*
* File name: TuVan_Model.php
* Create date: 27/10/2011
* Author: Nguyen Duc Hung
* Email: tinapc@gmail.com
*/

class Kienthuc_model extends CI_Model
{
	protected $table = 'kienthuc';
	
	function __construct()
	{
		parent:: __construct();
	}
	
	public function add($data)
	{
		$this->db->set('title', $data['title']);
		$this->db->set('intro', $data['intro']);
		$this->db->set('content', $data['content']);	
		$this->db->set('image', $data['image']);
		$this->db->set('create_date', $data['date']);
		$this->db->set('modify_date', $data['date']);
	
		if($this->db->insert($this->table))
		{
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	public function update($id,$data)
	{
		$this->db->where('id', $id);
		$this->db->set('title', $data['title']);
		$this->db->set('intro', $data['intro']);
		$this->db->set('content', $data['content']);	
		$this->db->set('image', $data['image']);
		$this->db->set('modify_date', $data['date']);
		
		if($this->db->update($this->table))
		{
			 return TRUE;
		} else {
			return FALSE;
		}
	}
	
	public function read($id)
	{
		$this->db->where('id', $id);
		$q = $this->db->get($this->table);
		
		if($q->num_rows() > 0)
		{
			return $q->row();
		} else {
			return FALSE;
		}
		
	}
	
	public function get_title($id)
	{
		$this->db->where('id', $id);
		$this->db->select('title');
		$q = $this->db->get($this->table);
		$result = $q->row();
		if($q->num_rows() > 0)
		{
			return $result->title;
		} else {
			return FALSE;
		}
		
	}
	
	public function get_image($id)
	{
		$this->db->where('id', $id);
		$this->db->select('image');
		$q = $this->db->get($this->table);
		$result = $q->row();
		if($q->num_rows() > 0)
		{
			return $result->image;
		} else {
			return FALSE;
		}
		
	}
	
	public function delete($id)
	{
		$this->db->where('id', $id);
		if($this->db->delete($this->table))
		{
			 return TRUE;
		} else {
			return FALSE;
		}
			
	}
	
	public function getList($select = null, $where = null, $order = null, $limit = null)
	{
	
		if($select != null)
		{
			foreach($select as $key)
			{
				$this->db->select($key);
			}
		}
		
		if($where !=null)
		{
			foreach($where as $key => $value)
			{
				if($key[0] == '?')
				{
					$this->db->where_in(substr($key, 1), $value);
				} elseif($key[0] == '!') {
				
					$this->db->where_not_in(substr($key, 1), $value);					
				} else {
					$this->db->where($key, $value);
				}
			}
		}
		
		if($order !=null)
		{
			foreach($order as $key => $value)
			{
				$this->db->order_by($key, $value);
			}
		}
		
		if($limit !=null)
		{
			$this->db->limit($limit['max'], $limit['begin']);
		}
		
		$q = $this->db->get($this->table);
		
		return $q;
		
	}
	
	public function total()
	{
		return $this->db->count_all_results($this->table);
	}
	
	
} // End class