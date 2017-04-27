<?php if(!defined('BASEPATH')) exit('Woa...Not find system folder');

/*-----------------------------------------------
# Rao_vat version 1.0
# Product Controler
# Extends CI_Controller
# Author: Nguyen Duc Hung - http://tinagroup.net
# Create date: 17/05/2011
------------------------------------------------*/
require_once APPPATH.'third_party/public_controller'.EXT;

class Product extends Public_controller {

	function __construct() {
		
		parent:: __construct();
	
	}
	
	public function index() {
	
	}
	
	
	public function view() {
		
		//$data = array();
		
		$pid = (int)$this->uri->segment(3);

			$this->site_title = $this->product->get_title_pro($pid);
			$this->db->query("update product set num_view = num_view + 1 where id = ".$pid);

			$p_info = $this->product->get_view($pid);
			
			if($p_info->num_rows() > 0) {
				
				foreach($p_info->result() as $row) {

						$data['title']		 	=$row->title;
						$data['price']		 	= number_format($row->price,0,'','.');
						$data['l_x']		 	= $row->num_view;
						$data['create_date'] 	= $row->create_date;
						$data['content'] 		= $row->content;
						$data['images']			= $this->product->get_image($row->id);
						$data['danh_muc']		= $this->category->get_name($row->category_id);
						$data['loai_bv']		= $this->type->get_name($row->article_type);
						$data['mem_name']		= $row->mem_fullname;
						$data['mem_address']	= $row->mem_address;
						$data['mem_phone']		= $row->mem_phone;
						$data['mem_email']		= $row->mem_email;
						$data['mem_id']			= $row->mem_id;
						break;
						
				}
				
				
				// Lay 5 bai viet cung nguoi dang
				$user_post = $this->product->get_6_top_pro(array('id !=' => $pid, 'active' => 1), array('num_view' => 'DESC'), array('max'=>5, 'begin' => 0));
				
				foreach($user_post as $row) {
					$data['user'][] = array(
						'id' 		=> $row->id,
						'title' 	=> $row->title,
						'price'		=> number_format($row->price,0,'','.'),
						'hinh' 		=> $this->product->get_1_image($row->id),
						'tinh' 		=> $this->tinh->get_name($row->province_id),
						'url_view' 	=> site_url('product/view/'.$row->id.'/'.$row->alias),
					);
			
			   }
				//echo $this->view();
			   $this->render($this->load->view('product/page_view', $data, TRUE),'layout_member');
				
			} else {
				redirect('/home');
			}
	}
	
	

}
// End file
// Local applocation/controllers/product.php