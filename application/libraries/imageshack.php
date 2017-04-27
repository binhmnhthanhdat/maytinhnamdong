<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
		
/**
 * This LIB file is making image upload to imageshack.us more easy.
 * Note: This is my first public release to CI community
 *
 * more info: http://www.sourcer.cz/ci-lib/imageshack
 *
 * Copyright (c) 2010 Daniel Máslo (http://www.sourcer.cz)
 *
 * This source file is subject to the GPL license.
 */
 /**
 * Example use:
 * 
 	$this->load->library('imageshack');
	$this->imageshack->upload('http://www.sourcer.cz/ci-lib/imageshack/flame.jpg');
	echo $this->imageshack->getInfo('image_link');
 */
 
class Imageshack {
			
	/** API URL */
	var $api = 'http://www.imageshack.us/upload_api.php';
	
	/** XML response */
	var $xml;
	
	/** 
	 * empty contructor 
	 */
	function Imageshack() {
	}
			 
	/**
	 * upload the file (image) 
	 * You can use any path, from your server or from another one.
	 *
	 * @param string filename (full path)
	 * @return xml response
	 */
	function upload($file) {
	    $this->_checkCurl();
	    
	    
	    $post['fileupload'] = @$file;
		$post['key'] = '19BDMRSVb22453e3d8c5ef9c8cf61eab7cdcfddd';
		$post['xml'] = 'yes';
		
		
	    $ch = curl_init($this->api);
	    
	    curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 240);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect: '));
		//curl_setopt($ch, CURLOPT_URL, $url);
	    
	    
	    $this->xml = curl_exec($ch);
	    
	    curl_close($ch);
	    
	    return($this->xml);
	}	
		    
	/**
	 * parsing XML response for info about uploaded file
	 *
	 * useable tags keys) :
	 *      image_link  - URL address of uploaded image on imageshack server
	 *      thumb_link  - URL address of thumbnail of uploaded image on imageshack server
	 *      yfrog_link  - URL address of uploaded image on yfrog server
	 *      yfrog_thumb - URL address of thumbnail of uploaded image on yfrog server  
	 *      ad_link     - URL address of imgaeshack page with uploaded image
	 *      done_page   - URL address of thumbnail of uploaded image on imageshack server
	 *      width       - width of uploaded image [px]
	 *      height      - height of uploaded image [px]
	 *
	 * @param string XML tag name (see documentation)
	 * @return string text value of param tag
	 */
	function getInfo($xml, $key) {
	   
	  return(strip_tags($value[0]));
	   
	}
	
	/**
	 * private function - checking CURL module
	 */ 
	function _checkCurl() {
	    function_exists('curl_init') or die("curl library is still not installed yet on your machine!");
	}
       
}

?>
