<?php if(!defined('BASEPATH')) exit('Woa...Not find system folder');

/*-----------------------------------------------
# Rao_vat version 1.0
# Advertise Controler
# Extends CI_Controller
# Author: Nguyen Duc Hung - http://tinagroup.net
# Create date: 28/05/2011
------------------------------------------------*/
require_once APPPATH.'third_party/admin_controller'.EXT;

class Advertise extends Admin_controller {

	public function __construct() {
		
		parent:: __construct();
		
		$this->check_login(); //Chech user login
		$this->load->model('advertise/advertise_model', 'adver'); //Load model 
		$this->load->model('product/category_model', 'cat');
		
	}
	
	public function index() {
	
		$data = array();
		$data['render_path'] = array('Admin' => $this->index_url.'admin', 'Quản lý quảng cáo' => '#');
		$data['heading_title'] = 'Quản lý quảng cáo';
		$data['url_create'] = $this->index_url.'admin/advertise/add_adver';
		$data['action'] = $this->index_url.'admin/advertise';
		
		$data['active'] = $this->input->get('active') ? $this->input->get('active') : '';
		$data['cus'] 	= $this->input->get('cus') ? $this->input->get('cus') : '';
		$data['position'] = $this->input->get('position') ? $this->input->get('position') : '';
		$data['page_view'] = $this->input->get('page_view') ? $this->input->get('page_view') : '';
		$page = $this->input->get('page') ? $this->input->get('page') : '';
		
		// Config pagination
		$config['base_url'] = $this->index_url.'admin/advertise/?active='.$data['active'].'&cus='.$data['cus'].'&position='.$data['position'].'&page_view='.$data['page_view'];
		$config['total_rows'] = $this->adver->total_cus($data['active'], $data['cus'],$data['position'], $data['page_view']);
		$config['page_query_string'] = TRUE;
		$config['query_string_segment'] = 'page';
		$config['per_page'] = $this->per_page;
		$config['num_links'] = 8;
		$this->pagination->initialize($config);
		
		$data['page'] = $this->pagination->create_links();
		
		$data['advertises'] = $this->adver->get_all($data['active'], $data['cus'],$data['position'], $data['page_view'], array('max' => $config['per_page'], 'begin' => $page));
		
		$this->render($this->load->view('admin/advertise/index', $data, TRUE));
	
	}
	
	
	function customer() {
	
		$data = array();
		$data['render_path'] = array('Admin' => $this->index_url.'admin', 'Khách hàng' => '#');
		$data['heading_title'] = 'Quản lý khách hàng';
		$data['url_create'] = $this->index_url.'admin/advertise/add_cus';
		$data['action'] = $this->index_url.'admin/advertise';
	
		// Config pagination
		$config['base_url'] = $this->index_url.'admin/advertise/customer';
		$config['total_rows'] = $this->adver->total_cus();
		$config['uri_segment'] = 4;
		$config['per_page'] = $this->per_page;
		$config['num_links'] = 8;
		$this->pagination->initialize($config);
		
		$data['page'] = $this->pagination->create_links();
		$customers = $this->adver->select_cus(array('max' => $config['per_page'], 'begin' => $this->uri->segment(4)));
		
		if($customers) {
			
			foreach($customers->result() as $row) {
				
				$data['customers'][] = array(
					
					'id'		 			=> $row->cus_id,
					'name' 		 			=> $row->cus_name,
					'address'	 			=> $row->cus_address,
					'phone'		 			=> $row->cus_phone,
					'email'		 			=> $row->cus_email,
					'url_del'	 			=> $this->index_url.'admin/advertise/delete_cus/'.$row->cus_id,
					'url_edit'	 			=> $this->index_url.'admin/advertise/add_cus/'.$row->cus_id,
					'url_manager_image' 	=> $this->index_url.'admin/advertise/?active=&cus='.$row->cus_id.'&position=&page_view='
					
				);
				
			}
			
		} else {
			$data['customers'] = NULL;
		}
		
		$this->render($this->load->view('admin/advertise/cus_manager', $data, TRUE));
		
		
	}
	
	function add_cus() {
	
		$data = array();
		$data['render_path'] = array('Admin' => $this->index_url.'admin', 'Khách hàng' => $this->index_url.'admin/advertise/customer', 'Thêm mới khách hàng' => '#');
		$data['heading_title'] = 'Thêm mới khách hàng';
		$data['url_create'] = $this->index_url.'admin/advertise/add_cus';
		$data['action'] = $this->index_url.'admin/advertise/add_cus';
		
		$this->valid->set_rules('username', 'Username', 'required');
		$this->valid->set_rules('address','Adress', 'required');
		$this->valid->set_rules('phone', 'Phone','required');
		$this->valid->set_rules('email', 'Email','required|valid_email');
		
		if($this->valid->run() == TRUE) {
			
			$data['name'] = $this->input->post('username');
			$data['address'] = $this->input->post('address');
			$data['phone'] = $this->input->post('phone');
			$data['email'] = $this->input->post('email');
			$id = (int)$this->input->post('id');
			if($id && $id !='') {
			
				if($this->adver->update_cus($id, $data)) {
					$this->session->set_flashdata('message', 'Cập nhật khách hàng thành công');
					redirect('admin/advertise/add_cus/'.$id);
				} else {
					$this->session->set_flashdata('message', 'Đã có lỗi xảy ra, Không thể cập nhật');
					redirect('admin/advertise/add_cus/'.$id);
				}

			} else {
				if($this->adver->add_cus($data)) {
					$this->session->set_flashdata('message', 'Thêm mới khách hàng thành công');
					redirect('admin/advertise/customer');
				} else {
					$this->session->set_flashdata('message', 'Đã có lỗi xảy ra, Không thể thêm mới');
					redirect('admin/advertise/customer');
				}
			}
					
		}
			
			$_id = (int)$this->uri->segment(4);
			if($_id) {
				$q = $this->adver->get_cus($_id);
				if($q) {
					$data['cus'] = $q;
					//var_dump($data['cus']);
				}
			}
		
		$this->render($this->load->view('admin/advertise/add_cus_form', $data, TRUE));

	}
	
	function delete_cus() {
		
		$cid = (int)$this->uri->segment(4);
		if($cid) {
			if($this->adver->del_cus($cid)) {
				$this->session->set_flashdata('message', 'Xóa khách hàng thành công');
				redirect('admin/advertise/customer');
			} else {
				$this->session->set_flashdata('message', 'Không thể xóa khách hàng này');
				redirect('admin/advertise/customer');
			}
		}
		
	}
	
	
	function add_adver() {
	
		/*
			Vi tri :
			- Top left : 1
			- Top right : 2
			- Center top : 3
			- Center : 4
			- Left 1: 5
			- Left 2: 6
			- Left 3 : 7
			- Left 4: 8
			- Right 1: 9
			- Right 2: 10
			- Right 3: 11
			- Right 4: 12
		*/
		
		$data = array();
		$data['render_path'] = array('Admin' => $this->index_url.'admin', 'Quản lý quảng cáo' => $this->index_url.'admin/advertise', 'Thêm mới quảng cáo' => '#');
		$data['heading_title'] = 'Thêm mới quảng cáo';
		$data['url_create'] = $this->index_url.'admin/advertise/add_';
		$data['action'] = $this->index_url.'admin/advertise/add_adver';
		
		$this->valid->set_rules('customer', 'Customer', 'required');
		$this->valid->set_rules('page_view', 'Page view', 'required');
		$this->valid->set_rules('position', 'Vi tri', 'required');
		$this->valid->set_rules('customer', 'Customer', 'required');
		$this->valid->set_rules('date_begin', 'Date Begin', 'required');
		$this->valid->set_rules('date_end', 'Date End', 'required');
		$this->valid->set_rules('link_to', 'Link to', 'required');
		
		if($this->valid->run() == TRUE) {
			
			$data['cus_id'] = (int)$this->input->post('customer');
			$data['position'] = (int)$this->input->post('position');
			$data['page_view'] = (int)$this->input->post('page_view');
			$data['active'] = 1;
			$data['desc'] = $this->input->post('desc');
			$data['link_to'] = prep_url($this->input->post('link_to'));
			$data['date_begin'] = $this->input->post('date_begin');
			$data['date_end'] = $this->input->post('date_end');
			$id = $this->input->post('id');
			$oldFile = $this->input->post('oldFile');
			$oldFileType = $this->input->post('oldFileType');
			
			$image_adv = $_FILES['file_adv']['name'];
			
			if($image_adv !='') {
				//Config upload
				$config['upload_path'] = './data_uploads/advertise/';
				$config['allowed_types'] = 'gif|jpg|png|swf';
				$config['max_size'] = '5120'; // Toi da la 5Mb
				
				$this->load->library('upload', $config);
				if(!$this->upload->do_upload('file_adv')) {
					$this->session->set_flashdata('message', $this->upload->display_errors());
					redirect('admin/advertise/add_adver');
				} else {
					$upload = $this->upload->data();
					$data['image_url'] = 'data_uploads/advertise/'.$upload['file_name'];
					$data['file_type'] = $upload['file_ext'];
					
					if($oldFile !='') $this->deleteFile($oldFile);
				}
				
			} else {
				if(!empty($oldFile) && !empty($oldFileType)) {
					$data['image_url'] = $oldFile;
					$data['file_type'] = $oldFileType;
				}
			}
			
			if($id && $id !='') {
				if($this->adver->update($id, $data)) {
					$this->session->set_flashdata('message', 'Cập nhật quảng cáo thành công');
					redirect('admin/advertise/add_adver/'.$id);
				} else {
					$this->session->set_flashdata('message', 'Không thể thực hiện lệnh');
					redirect('admin/advertise/add_adver/'.$id);
				}
			} else {
				if($this->adver->add($data)) {
					$this->session->set_flashdata('message', 'Thêm mới quảng cáo thành công');
					redirect('admin/advertise');
				} else {
					$this->session->set_flashdata('message', 'Không thể thực hiện lệnh');
					redirect('admin/advertise');
				}
			}
			
			
		}
		
		$data['customers'] = $this->adver->select_cus(null);
		$data['categorys'] = $this->cat->get_root_category(0);
		$vitri = array(
			'Top left' 		=> 1,
			'Top right' 	=> 2,
			'Center top'	=> 3,
			'Center'		=> 4,
			'Left '			=> 5,
			'Right '		=> 6,
		);
		
		$data['position'] = $vitri;
		
		$_id = (int)$this->uri->segment(4);
		if($_id) {
			$q = $this->adver->read($_id);
			if($q) {
				$data['adv'] = $q->row();
			}
		}
		
		$this->render($this->load->view('admin/advertise/adver_add_form', $data, TRUE));
	
	}
	
	

}
// ENd file
// Local application/controllers/admin/advertise.php