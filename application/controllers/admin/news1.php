<?php if(!defined('BASEPATH')) exit('Woa...Not find system folder');
/*-----------------------------------------------
# Rao_vat version 1.0
# Admin News Controler
# Extends CI_Controller
# Author: Nguyen Duc Hung - http://tinagroup.net
# Create date: 26/05/2011
------------------------------------------------*/
require_once APPPATH.'third_party/admin_controller'.EXT;

class News extends Admin_controller {

	function __construct() {
		
		parent:: __construct();
		
		$this->check_login();
		
		$this->load->model('tin_tuc/tintuc_model', 'news');
		$this->load->helper('date');		
	}
	
	
	public function index() {
		
		$data = array();
		
		$del = $this->input->post('selected');
		$act = $this->input->post('act');
	
		if($act == 'act_del')
		{
			if($del)
			{
				if(gettype($del) == 'array' && count($del > 0))
				{
					foreach($del as $id)
					{
					  // echo $id; exit;
						// Xoa hinh truoc
						$q = $this->news->get_image($id);
						unlink($q);						
						// Xoa san pham
						$this->news->delete($id);
					}
				}
			} else {
				$this->session->set_flashdata('warning', 'Bạn chọn ít nhất 1 bản tin để xóa');
				redirect('admin/news');
			}
			$this->session->set_flashdata('warning', 'Đã xóa các bản tin thành công');
			redirect('admin/news');
		}
		
		// Config pagination
		$config['base_url'] = base_url().'admin/news/index';
		$config['total_rows'] = $this->news->total();
		$config['per_page'] = 20;
		$config['uri_segment'] = 4;
		//$config['page_query_string'] = TRUE;
		//$config['query_string_segment'] = 'page';
		$config['num_links'] = 10;
		$this->pagination->initialize($config);
		$data['page'] = $this->pagination->create_links();
		
		$data['news'] = $this->news->getList(array('title', 'id', 'create_date','modify_date', 'image','cat_id'),null, array('id' => 'desc'), array('max' => $config['per_page'], 'begin' => $this->uri->segment(4)));
		
		$data['render_path'] = array('Admin' => $this->index_url.'admin', 'Danh sách bản tin' => '#');
		$data['heading_title'] = 'Danh sách bản tin';
		$data['total_record'] = $this->news->total();
		$data['action_del'] = $this->index_url.'admin/news';
		
		$data['url_edit'] = $this->index_url.'admin/news/add_edit';
		$data['url_del'] = $this->index_url.'admin/news/delete';
		
		$this->render($this->load->view('admin/news/index', $data, TRUE));
		
	}
	
	
	public function add_edit()
	{
		$data['render_path'] = array('Admin' => $this->index_url.'admin', 'Tin tức' => $this->index_url.'admin/news', 'Thêm mới - cập nhật tin tức' => '#');
		$data['heading_title'] = 'Thêm mới - cập nhật tin tức';
		$data['action'] = $this->index_url.'admin/news/add_edit';
		
		$this->valid->set_rules('title', 'Title', 'trim|required');
		$this->valid->set_rules('intro', 'Intro', 'required');
		$this->valid->set_rules('desc', 'Description', 'required');
		
		$data['title'] = $this->input->post('title');
		$data['intro'] = $this->input->post('intro');
		$data['content'] = $this->input->post('desc');
        $data['cat_id'] = $this->input->post('cat_id');
        
		$data['date'] = time();
		$id = $this->input->post('id');
		$oldImage = $this->input->post('oldImage');
		
		if($this->valid->run() == TRUE)
		{
			if($_FILES['image_news']['name'] !='')
			{
				$file_field = $_FILES['image_news']['name'];
				$file_name_field = 'image_news';
				$upload_path = $this->config->item('upload_news_dir');
				
				if($result = $this->util->upload($upload_path, 1024, 1024, $file_field, $file_name_field))
				{
					$filepath = $result['full_path'];
					$filename = $result['file_name'];
					$data['image'] =  $upload_path . $filename;
					print_r($data['image']);
					
					// Delete image old if it's exist
					if($oldImage !='')
					{
						$this->deleteFile($oldImage);
					}
				}
				
			} else {
				if($oldImage !='') {
					$data['image'] = $oldImage;
				} else {
					$data['image'] = '';
				}
			} // End upload file
			
			if($id && $id !='')
            {				
                if($this->news->update($id,$data))
                {
                    $this->session->set_flashdata('warning', 'Cập nhật nội dung thành công');
					redirect('admin/news/add_edit/'.$id);
                } else {
                    $this->session->set_flashdata('warning', 'Cập nhật nội dung thất bại');
					redirect('admin/news/add_edit/'.$id);
                }
            } else {
                if($this->news->add($data))
                {
                    $this->session->set_flashdata('warning', 'Thêm mới nội dung thành công');
					redirect('admin/news');
                } else {
                    $this->session->set_flashdata('warning', 'Thêm mới nội dung thất bại');
					redirect('admin/news');
                }
            } // End action submit

		}
		
		$_id = $this->uri->segment(4);
        
        if($_id)
        {
            $data['q'] = $this->news->read($_id);
        }
		
		$this->tinyMCE = 'desc';
		$sql="select * from cat_news order by ord asc";	
        $data['cat']= $this->db->query($sql)->result();
		$this->render($this->load->view('admin/news/create_form', $data, TRUE));
	}
	
	
	public function delete () {
		
		$pid = (int)$this->uri->segment(4);
		
		$q = $this->news->get_image($pid);
		
		if($q) {
			unlink($q);
		}
		
		if($this->news->delete($pid)) {
			$this->session->set_flashdata('warning', 'Xóa nội dung thành công');
			redirect('admin/news');
		} else {
			$this->session->set_flashdata('warning', 'Xóa nội dung thất bại');
			redirect('admin/news');
		}
		
	}

}
// End file
// Local application/controllers/admin/product.php