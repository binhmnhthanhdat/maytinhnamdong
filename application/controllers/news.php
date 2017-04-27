<?php if(!defined('BASEPATH')) exit('Woa...Not find system folder');
/*-----------------------------------------------
# Rao_vat version 1.0
# Home Controler
# Extends CI_Controller
# Author: Nguyen Duc Hung - http://tinagroup.net
# Create date: 28/04/2011
------------------------------------------------*/
require_once APPPATH.'third_party/public_controller'.EXT;

class News extends Public_controller
{
	function __construct()
	{
		parent:: __construct();
		$this->load->library('ajax_pagination');
	}
	
	public function index()
	{
		$data = array();
		$data['render_path'] = array('Trang chủ' => site_url('trang-chu'), 'Tin tức' => site_url('tin-tuc'));
		
		// Config pagination
		$config['base_url'] = $this->index.'tin-tuc/page';
		$config['total_rows'] = $this->tin->total();
		$config['per_page'] = 10;
		$config['suffix'] = '.html';
		$config['uri_segment'] = 3;
		$config['num_links'] = 10;
		$this->ajax_pagination->initialize($config);
		$data['page'] = $this->ajax_pagination->create_links('loadUrl', 'product_list');
		$data['url_view'] = 'xem-tin/';
		$data['news'] = $this->tin->getList(array('id','title','create_date', 'modify_date', 'image', 'intro'), null, array('id' => 'DESC'), array('max' => $config['per_page'], 'begin' => $this->uri->segment(3)))->result();
		
		if($this->input->is_ajax_request())
		{
			// If request by ajax that...
			$this->load->view('tin_tuc/index_ajax', $data);
			
		} else {
			
			$this->render($this->load->view('tin_tuc/index', $data, TRUE),'3col');
		}
		
	}
	public function list_news($id=null)
	{
	//	$uri = $this->uri->segment($id);
		$uri = explode("-", $id);
		$id = (int)$uri[0];
		
			$data = array();
		$data['render_path'] = array('Trang chủ' => site_url('trang-chu'), 'Tin tức' => site_url('tin-tuc'));
		
		// Config pagination
		$config['base_url'] = $this->index.'danh-muc-tin-tuc/page';
		$config['total_rows'] = $this->tin->total();
		$config['per_page'] = 10;
		$config['suffix'] = '.html';
		$config['uri_segment'] = 3;
		$config['num_links'] = 10;
		$this->ajax_pagination->initialize($config);
		$data['page'] = $this->ajax_pagination->create_links('loadUrl', 'product_list');
		$data['url_view'] = 'xem-tin/';
		$data['news'] = $this->tin->getList(array('id','title','create_date', 'modify_date', 'image', 'intro'), array('cat_id'=>$id), array('id' => 'DESC'), array('max' => $config['per_page'], 'begin' => $this->uri->segment(3)))->result();
		
		if($this->input->is_ajax_request())
		{
			// If request by ajax that...
			$this->load->view('tin_tuc/index_ajax', $data);
			
		} else {
			
			$this->render($this->load->view('tin_tuc/index', $data, TRUE),'3col');
		}
		
	}
	public function detail()
	{
		$uri = $this->uri->segment(2);
		$uri = explode("-", $uri);
		$id = (int)$uri[0];
		
		$data['render_path'] = array('Trang chủ' => site_url('trang-chu'), 'Tin tức' => site_url('tin-tuc'));
		
		$this->site_title = 'Tin tức | '. $this->tin->get_title($id);
		$data['news'] = $this->tin->read($id);
        $cat_id=$this->tin->read($id)->cat_id;
		$data['other_news'] = $this->tin->getList(array('id','title','create_date'), array('id !=' => $id,'cat_id'=>$cat_id), array('id' => 'DESC'), array('max' => 5, 'begin' => 0))->result();
		$data['url_view'] = 'xem-tin/';
		
		$this->render($this->load->view('tin_tuc/page_view', $data, TRUE),'3col');
		
	}
}