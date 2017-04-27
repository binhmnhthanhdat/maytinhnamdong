<?php if(!defined('BASEPATH')) exit('Woa...Not find system folder');

/*-----------------------------------------------
# Rao_vat version 1.0
# Home Controler
# Extends CI_Controller
# Author: Nguyen Duc Hung - http://tinagroup.net
# Create date: 28/04/2011
------------------------------------------------*/
require_once APPPATH.'third_party/public_controller'.EXT;

class Home extends Public_controller {

	function __construct() {
	
		parent:: __construct();
	
	}
	
	
	public function index() {
	
		$data = array();

		// Lay nhung sp thuoc danh muc hien thi o trang chu
		$cats = $this->category->get_category_where(array('show_home' => 1), array('ord'=>'asc'), null)->result();
		if($cats) {
			
			foreach($cats as $cat) {
			
				$data['product_categorys'][$cat->catid] = $this->product->get_all_pro(array('id','p_name','p_name_alias','p_image','p_image_thumb','status','catid','gia','khuyenmai','noibat','p_description'), null, null, null, array('status' => 1, 'catid' => $cat->catid), array('id' => 'DESC'), array('max'=> 8, 'begin' => 0))->result();
				
			}
			
		}
		
		$data['categorys'] = $cats;
        	
//        echo "<pre>";
//        print_r($data['categorys']);
//         print_r($data['product_categorys']);
//        echo "</pre>";
//        exit();
        //get service
        // Lay nhung sp thuoc danh muc hien thi o trang chu
		$cats_service = $this->category_service->get_category_where(array('show_home' => 1), array('catid' => 'desc'), null)->result();
		if($cats_service) {
			
			foreach($cats_service as $cat) {
			
				$data['service_categorys'][$cat->catid] = $this->service->get_all_pro(array('id','p_name','p_name_alias','p_image','p_image_thumb','status','catid','gia','khuyenmai','noibat','p_description'), null, null, null, array('status' => 1, 'catid' => $cat->catid), array('id' => 'DESC'), array('max'=> 8, 'begin' => 0))->result();
				
			}
			
		}
		
		$data['categorys_service'] = $cats_service;
//        echo "<pre>";
//        print_r($data['categorys_service']);
//         print_r($data['service_categorys']);
//        echo "</pre>";
//        exit();
        //get news show homepage
        $cats_news = $this->cat_news->get_cat_news_where(array('active'=>1,'home'=>1), array('ord'=>'asc'), null)->result();
        if($cats_news) {
			
			foreach($cats_news as $kqcats_news) {
			
				$data['cats_news_list'][$kqcats_news->id] = $this->tin->getList(null, array('cat_id'=>$kqcats_news->id), array('id' => 'desc'), array('max' => 30, 'begin' => 0))->result();
				
			}
			
		}
        $data['cats_news'] = $cats_news;
       // $data['news'] = $this->tin->getList(null, null, array('id' => 'desc'), array('max' => 30, 'begin' => 0))->result();
		$this->render($this->load->view('home', $data, TRUE),'3col');		
	
	}

}