<?php if(!defined('BASEPATH')) exit ('Woa...Not Find System Folder');

/*-----------------------------------------------
# Rao_vat version 1.0
# Model Product
# Extends CI_Model
# Author: Nguyen Duc Hung - http://tinagroup.net
# Create date: 12/05/2011
------------------------------------------------*/
class Service_model extends CI_Model {

	protected $table = 'service';

	function __construct() {
		
		parent:: __construct();
		
	}
	
	
	function add($data) {
		
		$this->db->set('p_name', $data['title']);
		$this->db->set('p_name_alias', $data['alias']);
		$this->db->set('catid', $data['catid']);
		$this->db->set('p_detail', $data['content']);
		$this->db->set('p_image', $data['image']);
		$this->db->set('p_image_thumb', $data['image_thumb']);
		$this->db->set('status', $data['status']);
        $this->db->set('p_description', $data['p_description']);
		
		if($this->db->insert($this->table)) return TRUE; else return FALSE;
		
	}
	
	function update($id, $data) {
		
		$this->db->where('id', $id);
		$this->db->set('p_name', $data['title']);
		$this->db->set('p_name_alias', $data['alias']);
		$this->db->set('catid', $data['catid']);
		$this->db->set('p_detail', $data['content']);
		$this->db->set('p_image', $data['image']);
		$this->db->set('p_image_thumb', $data['image_thumb']);
		$this->db->set('status', $data['status']);
		$this->db->set('p_description', $data['p_description']);
		if($this->db->update($this->table)) return TRUE; else return FALSE;
		
	}
	

	function del_pro($id) {
		
		$this->db->where('id', $id);
		
		if($this->db->delete($this->table)) return TRUE; else return FALSE;
	}
	
	
	function get_image($id) {
	
		$this->db->where('id', $id);
		$this->db->select('p_image, p_image_thumb');
		$q = $this->db->get($this->table);
		if($q->num_rows() > 0)
		{
			return $q->row();
		} else {
			return FALSE;
		}
	}
	
	function get_where($where = null, $limit, $offset)
	{
		if($where != null) {
			foreach($where as $key => $val) {
				$this->db->where($key, $val);
			}
		}
		
		$this->db->select('id,title, create_date, num_view, active');
		$this->db->order_by('create_date', 'desc');
		$this->db->limit($limit, $offset);
		
		$q = $this->db->get($this->table);
		
		return $q;
		
		$q->free_result();
	}
	
	// Lay 6 bai viet moi nhat
	function get_pro_by_cat($category = null, $tinh = null, $type = null, $where = null, $order = null, $limit = null) {
		
		if($category != null) $this->db->where_in('category_id', $category);
		if($tinh != null) $this->db->where('province_id', $tinh);
		if($type != null) $this->db->where('article_type', $type);
		
		if($where !=null) {
			foreach($where as $key => $val) {
				
				$this->db->where($key, $val);
			}
			
		}
		
		if($order != null) {
			foreach($order as $key => $val) {
				$this->db->order_by($key, $val);
			}
		}
		
		if($limit != null) {
			$this->db->limit($limit['max'], $limit['begin']);
		}
		
		$this->db->select('id, title, price,province_id,alias, category_id, article_type');
		
		$q = $this->db->get($this->table);
		
		return $q;
		
		$q->free_result();
	}
	
	
	// Lay 6 bai viet moi nhat
	function get_all_pro($select = null, $category = null, $name = null, $status = null, $where = null, $order = null, $limit = null) {
		
		if($category != null) $this->db->where_in('catid', $category);
		if($name != null) $this->db->where('MATCH(p_name, p_name_alias) AGAINST("'.$name.'" IN BOOLEAN MODE)');
		if($status != null) $this->db->where('status', $status);
		
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
		
		if($limit != null) {
			$this->db->limit($limit['max'], $limit['begin']);
		}
		
		if($select !=null) 
		{
			foreach($select as $key)
			{
				$this->db->select($key);
			}
		}
		
		
		$q = $this->db->get($this->table);
		
		return $q;
		
		$q->free_result();
	}
	
	function total_product($category = null, $name = null, $status = null) {
		
		if($category != null) $this->db->where_in('catid', $category);
		if($name != null) $this->db->where('MATCH(p_name, p_name_alias) AGAINST("'.$name.'" IN BOOLEAN MODE)', NULL, FALSE);
		if($status != null) $this->db->where('status', $status);
		
		return $this->db->count_all_results($this->table);
		
	}
	
	
	function get_title_pro($id) {
		
		$q = $this->db->select('p_name')->get_where($this->table, array('id' => $id));
		
		if($q->num_rows() > 0) {
			
			$result = $q->row();
		} else {
			return FALSE;
		}
		
		return $result->p_name;
		
	}
	
	
	function get_view($id) {
		
		$q = $this->db->query(
			"SELECT p.id, p.title, p.content, p.province_id, p.category_id, p.article_type, p.price, date_format(p.create_date, '%d/%m/%Y %H:%i:%s') as tao_ngay, p.num_view, m.mem_fullname, m.mem_phone, m.mem_address, m.mem_email, m.mem_id, mem_nick, mem_name 
			FROM product p 
			LEFT JOIN member m ON m.mem_id = p.mem_id  WHERE p.id=".$id);
		
		return $q;
		$q->free_result();
	}
	
	public function get_one_pro($id) {
		
		$this->db->where('id', $id);
		
		$q = $this->db->get($this->table);
		
		return $q->row();
		
		$q->free_result();
		
	}
	
	
}
// End file
// Local application/models/product/product_model.php