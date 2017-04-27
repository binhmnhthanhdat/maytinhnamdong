<?php

class Lib_auth {	
		
	function check_login() {
	
		$ci = & get_instance();
		$user = $ci->session->userdata('logined');
		if(!$user) redirect('/admin/user/login');
		
	}

}