<?php if(!defined('BASEPATH')) exit('Woa...Not find system folder');

/*-----------------------------------------------
# Rao_vat version 1.0
# Product Controler
# Extends CI_Controller
# Author: Nguyen Duc Hung - http://tinagroup.net
# Create date: 17/05/2011
------------------------------------------------*/
require_once APPPATH.'third_party/public_controller'.EXT;

class Service extends Public_controller {

	function __construct() {
		
		parent:: __construct();	
		$this->load->library('ajax_pagination');
	}
	
	public function index() {
		$data['render_path'] = array('Trang chủ' => site_url('trang-chu'), 'Danh sách Dịch vụ' => site_url('#'));
		$this->site_title = 'Danh Sách Dịch vụ';
		
		$data['products'] = $this->service->get_all_pro(array('id','p_name','p_name_alias', 'status','p_image_thumb','catid','gia','khuyenmai','noibat','p_description'), null, null, null, null, array('id' => 'desc'), array('max' => 30, 'begin' => 0));
		
		if($this->input->is_ajax_request())
		{
			// If request by ajax that...
			$this->load->view('service/page_category_ajax', $data);
			
		} else {
			
			$this->render($this->load->view('service/page_category', $data, TRUE), '3col');
		}
	}
	
	
	public function detail() 
	{
		$uri_1 = $this->uri->segment(2);
		$uri = explode("-", $uri_1);
		$id = (int)$uri[0];
		$catid = (int)$uri[1];
		$cat_url = site_url('danh-muc-dich-vu/' . $catid . '-' . $this->category_service->get_name_alias($catid));
		
		$data['render_path'] = array('Trang chủ' => site_url('trang-chu'), $this->category_service->get_name($catid) => $cat_url, $this->service->get_title_pro($id) => '#');
		$this->site_title = $this->service->get_title_pro($id);
		
		$data['pro_view'] = $this->service->get_one_pro($id);
		
		$data['other_products'] = $this->service->get_all_pro(array('id','p_name','p_name_alias', 'status','p_image_thumb','catid','gia','khuyenmai','noibat','p_description'), $catid, null, null, array('id !=' => $id), array('id' => 'desc'), array('max' => 10, 'begin' => 0));
		
				
		$this->render($this->load->view('service/page_view',$data, TRUE),'3col');
				
	}
	
	function send_message() {
		
		$title = $this->input->post('title_mess');
		$content = $this->input->post('content_mess');
		$nhan = $this->input->post('nguoinhan');
		$goi = $this->session->userdata('mem_username');
		
		$this->db->set('user_send', $goi);
		$this->db->set('user_accept', $nhan);
		$this->db->set('title_message', $title);
		$this->db->set('content_message', $content);
		
		if($this->db->insert('user_message')) {
			$_data = array('status' => true, 'message' => 'Gởi tin nhắn thành công');
		} else {
			$_data = array('status' => false, 'message' => 'Không thể thực hiện thao tác');
		}
		
		echo json_encode($_data);
	}
	
	
	public function category() {
	
		$uri_1 = $this->uri->segment(2);
		$uri = explode("-", $uri_1);
		$id = (int)$uri[0];
		
		$data['render_path'] = array('Trang chủ' => site_url('trang-chu'), $this->category_service->get_name($id) => site_url('#'));
		$this->site_title = 'Dịch vụ | '. $this->category_service->get_name($id);
		// Config pagination
		$config['base_url'] = $this->index.'danh-muc-dich-vu/' . $uri_1 . '/page';
		$config['total_rows'] = $this->service->total_product($id, null, null);
		$config['per_page'] = $this->per_page;
		$config['suffix'] = '.html';
		$config['uri_segment'] = 4;
		$config['num_links'] = 10;
		$this->ajax_pagination->initialize($config);
		$data['page'] = $this->ajax_pagination->create_links('loadUrl', 'product_list');
		
		$data['products'] = $this->service->get_all_pro(array('id','p_name','p_name_alias', 'status','p_image_thumb','catid','gia','khuyenmai','noibat','p_description'), $id, null, null, null, array('id' => 'desc'), array('max' => $config['per_page'], 'begin' => $this->uri->segment(4)));
		
		if($this->input->is_ajax_request())
		{
			// If request by ajax that...
			$this->load->view('service/page_category_ajax', $data);
			
		} else {
			
			$this->render($this->load->view('service/page_category', $data, TRUE), '3col');
		}
			
	}
	
	public function search()
	{
		$keyword = $this->util->alias($this->input->get('key'));
		$page = (int)$this->input->get('page');
		
		$data['render_path'] = array('Trang chủ' => site_url('trang-chu'), 'Kết quả tìm kiếm' => '');
		$this->site_title = 'Sản phẩm | Kết quả tìm kiếm';
		// Config pagination
		$config['base_url'] = $this->index.'tim-kiem/?key=' . $keyword;
		$config['total_rows'] = $this->product->total_product(null, $keyword, null);
		$config['per_page'] = $this->per_page;
		$config['suffix'] = '.html';
		$config['query_string_segment'] = 'page';
		$config['page_query_string'] = TRUE;
		$config['num_links'] = 10;
		$this->ajax_pagination->initialize($config);
		$data['page'] = $this->ajax_pagination->create_links('loadUrl', 'product_list');
		$data['products'] = $this->product->get_all_pro(array('id','p_name','p_name_alias', 'status','p_image_thumb','catid'), null, $keyword, null, null, array('id' => 'desc'), array('max' => $config['per_page'], 'begin' => $page));
		
		if($this->input->is_ajax_request())
		{
			// If request by ajax that...
			$this->load->view('product/search_result_ajax', $data);
			
		} else {
			
			$this->render($this->load->view('product/search_result', $data, TRUE), '3col');
		}
		
	}
}
// End file
// Local applocation/controllers/product.php