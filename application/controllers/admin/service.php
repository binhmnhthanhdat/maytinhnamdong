<?php if(!defined('BASEPATH')) exit('Woa...Not find system folder');

/*-----------------------------------------------
# Rao_vat version 1.0
# Admin Product Controler
# Extends CI_Controller
# Author: Nguyen Duc Hung - http://tinagroup.net
# Create date: 26/05/2011
------------------------------------------------*/
require_once APPPATH.'third_party/admin_controller'.EXT;

class Service extends Admin_controller {

	function __construct() {
		
		parent:: __construct();
		
		$this->check_login();
		
		$this->load->model('product/service_model', 'product');
		$this->load->model('product/category_service_model', 'cat');
		
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
						// Xoa hinh truoc
						$q = $this->product->get_image($id);
						 if(file_exists($q->p_image))
						  unlink($q->p_image);
                        if(file_exists($q->p_image_thumb))  
						  unlink($q->p_image_thumb);
						
						// Xoa san pham
						$this->product->del_pro($id);
					}
				}
			} else {
				$this->session->set_flashdata('warning', 'Bạn chọn ít nhất 1 bản tin để xóa');
				redirect('admin/service');
			}
			$this->session->set_flashdata('warning', 'Đã xóa các bản tin thành công');
			redirect('admin/service');
		}
		
		$page 	= (int)$this->input->get('page');
		$cat 	= (int)$this->input->get('cat') ? (int)$this->input->get('cat') : NULL;
		$name 	= $this->input->get('name');
		$status	= (int)$this->input->get('status') ? (int)$this->input->get('status') : NULL;
		
		$data['_name'] = $name;
		$data['_cat'] = $cat;
		$data['_status'] = $status;
		
		// Config pagination
		$config['base_url'] = base_url().'admin/service/?cat='.$cat.'&name='.$name.'&status='.$status;
		$config['total_rows'] = $this->product->total_product($cat, $name, $status);
		$config['per_page'] = 20;
		$config['page_query_string'] = TRUE;
		$config['query_string_segment'] = 'page';
		$config['num_links'] = 10;
		$this->pagination->initialize($config);
		$data['page'] = $this->pagination->create_links();
		
		$data['products'] = $this->product->get_all_pro(array('p_name', 'id','status','p_image_thumb','catid'),$cat, $name, $status,null, array('id' => 'desc'), array('max' => $config['per_page'], 'begin' => $page));
		
		$data['render_path'] = array('Admin' => $this->index_url.'admin', 'Liệt kê dịch vụ' => '#');
		$data['heading_title'] = 'Liệt kê dịch vụ';
		$data['total_record'] = $this->product->total_product($cat, $name, $status);
		
		$data['cat'] = $this->cat->get_category_where(null,null,null)->result();
		$data['url_cur'] = current_url();
		$data['url_edit'] = $this->index_url.'admin/service/create';
		$data['url_del'] = $this->index_url.'admin/service/delete';
		
		$this->render($this->load->view('admin/service/index', $data, TRUE));
		
	}
	
	
	public function create()
	{
		$data['render_path'] = array('Admin' => $this->index_url.'admin', 'Sản phẩm' => $this->index_url.'admin/product', 'Thêm mới - cập nhật dịch vụ' => '#');
		$data['heading_title'] = 'Thêm mới - cập nhật dịch vụ';
		$data['action'] = $this->index_url.'admin/service/create';
		
		$this->valid->set_rules('name', 'Name', 'trim|required');
		$this->valid->set_rules('cat', 'Category', 'required');
		$this->valid->set_rules('desc', 'Description', 'required');
		
		$data['title'] = $this->input->post('name');
		$data['alias'] = $this->util->alias($data['title']);
		$data['catid'] = (int)$this->input->post('cat');
		$data['content'] = $this->input->post('desc');
        $data['p_description'] = $this->input->post('p_description');
		$data['status'] = ($this->input->post('status') == 'on') ? 1 : 0;
		$id = $this->input->post('id');
		$oldImage = $this->input->post('oldImage');
		$oldImageThumb = $this->input->post('oldImageThumb');
		
		if($this->valid->run() == TRUE)
		{
			if($_FILES['image_pro']['name'] !='')
			{
				$file_field = $_FILES['image_pro']['name'];
				$file_name_field = 'image_pro';
				$upload_path = $this->config->item('upload_product_dir');
				$upload_thumb_path = $this->config->item('upload_product_thumb_dir');
				
				if($result = $this->util->upload($upload_path, 1024, 1024, $file_field, $file_name_field))
				{
					$filepath = $result['full_path'];
					$filename = $result['file_name'];
					$data['image'] =  $this->config->item('upload_product_dir') . $filename;
					
					// Create thumb
					$data['image_thumb'] = $this->util->create_image_thumb($upload_thumb_path, 150, 150, $filepath, $filename);
					
					// Delete image old if it's exist
					if($oldImage !='' && $oldImageThumb !='')
					{
						$this->deleteFile($oldImage);
						$this->deleteFile($oldImageThumb);
					}
				}
				
			} else {
				if($oldImage !='' && $oldImageThumb !='') {
					$data['image'] = $oldImage;
					$data['image_thumb'] = $oldImageThumb;
				} else {
					$data['image'] = '';
					$data['image_thumb'] = '';
				}
			} // End upload file
			
			if($id && $id !='')
            {
                if($this->product->update($id,$data))
                {
                    $this->session->set_flashdata('warning', 'Cập nhật nội dung thành công');
					redirect('admin/service/create/'.$id);
                } else {
                    $this->session->set_flashdata('warning', 'Cập nhật nội dung thất bại');
					redirect('admin/service/create/'.$id);
                }
            } else {
                if($this->product->add($data))
                {
                    $this->session->set_flashdata('warning', 'Thêm mới nội dung thành công');
					redirect('admin/service');
                } else {
                    $this->session->set_flashdata('warning', 'Thêm mới nội dung thất bại');
					redirect('admin/service');
                }
            } // End action submit

		}
		
		$_id = $this->uri->segment(4);
        
        if($_id)
        {
            $data['q'] = $this->product->get_one_pro($_id);
        }
		
        $data['cat'] = $this->cat->get_category_where(null, null, null)->result();
		$this->tinyMCE = 'desc';
		
		$this->render($this->load->view('admin/service/create_form', $data, TRUE));
	}
	
	
	public function delete () {
		
		$pid = (int)$this->uri->segment(4);
		
		$q = $this->product->get_image($pid);
		
		if($q) {
			if(file_exists($q->p_image))  
		      	unlink($q->p_image);
            if(file_exists($q->p_image_thumb))  
		      	unlink($q->p_image_thumb);
		}
		
		if($this->product->del_pro($pid)) {
			$this->session->set_flashdata('warning', 'Xóa nội dung thành công');
			redirect('admin/service');
		} else {
			$this->session->set_flashdata('warning', 'Xóa nội dung thất bại');
			redirect('admin/service');
		}
		
	}

}
// End file
// Local application/controllers/admin/product.php