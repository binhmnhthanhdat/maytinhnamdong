<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'third_party/public_controller'.EXT;
class Lienhe extends Public_controller {

	function lienhe()
	{
        parent::__construct();
		$this->load->library('session');
        // $this->load->model('danhmuc_model');
        $this->load->model('lienhe_model');
       // $this->load->model('Trangchu_model');
     $this->load->helper(array('form','url','date','language'));
        
		$this->load->library('form_validation');
       
	}
    function index(){
       
        //$data['laydanhmuctintin']=$this->tintuc_model->laydanhmuctintin();
        $data['title']="Liên hệ";    
		$md5_hash = md5(rand(0,999));
        $security_code = substr($md5_hash, 15, 5);
            //$_SESSION["security_code"] = $security_code;
        $this->session->set_userdata('security_code',$security_code);  
        $this->render($this->load->view('lienhe/lienhe', $data, TRUE),'3col');
    }
    function sendthanhcong(){
       
        //$data['laydanhmuctintin']=$this->tintuc_model->laydanhmuctintin();
       $data['title']="Liên hệ";    
          
         //$data['content']='lienhe/sendthanhcong';
        $this->load->view('lienhe/sendthanhcong',$data);
        
    }
    function guilienhe(){
      $data['title']="Gửi liên hệ";    
        $this->load->library('form_validation');
        $this->form_validation->set_rules('hoten', 'Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('tieude', 'Title', 'required');
        $this->form_validation->set_rules('noidung', 'Content', 'trim|required');
        $this->form_validation->set_rules('capcha', 'Mã xác nhận', 'trim|required');
        if($this->form_validation->run() == False) {

            $data['tieude']='Liên hệ';
            
			$this->render($this->load->view('lienhe/lienhe', $data, TRUE),'3col');
        }
        else{
            $maxacnhan=$this->input->post('capcha');
             if($maxacnhan==$this->session->userdata('security_code'))
                {
                $this->lienhe_model->lienhe();
                redirect('lienhe/sendthanhcong');
            }
            else
            {
             $data['tieude']='Liên hệ';
            $this->render($this->load->view('lienhe/lienhe', $data, TRUE),'3col');
            }
        }
        
        
        
    }
    
}