<?php
function counter() {
	
	$ci = &get_instance();
	
	$ip = $ci->input->ip_address();
	
	// Lay so record voi ip = $id
	$ipQuery = $ci->db->query("SELECT * FROM counter WHERE ipaddress = '" . $ip . "' LIMIT 1");
	
	//$ipQuery = mysql_query ("SELECT * FROM tbl_online WHERE ipaddress = '" . $_SERVER ['REMOTE_ADDR'] . "' LIMIT 1" );
	
	$countquery = $ci->db->query("SELECT * FROM counter WHERE ipaddress = 'counter_total'");
	
	//Tra ve Tong so luot truy cap
	if ($row = $countquery->row()) {
		$total = $row->lastactive;
	}
	
	// Neu da ton tai Ip nay thi update them gio 
	if ($ipQuery->num_rows() == 1) {
	
		//$ci->db->query( "UPDATE counter SET lastactive = " . time() . ", today=".date('Y-m-d')." WHERE ipaddress = '" . $ip . "' LIMIT 1" );
		$ci->db->where('ipaddress', $ip);
		$ci->db->set('lastactive', time());
		$ci->db->set('today', date('Y-m-d'));
		$ci->db->update('counter');
		
	} else {
	
		$ci->db->query("INSERT INTO `counter` VALUES ('" . $ip . "', " . time () . ", '".date('Y-m-d')."')");
		
		$ci->db->query("UPDATE counter SET lastactive = " . ($total + 1) . " WHERE ipaddress='counter_total'" );
	}
	
	// Xoa nhung record  sau 24 tieng
	$ci->db->query("DELETE FROM counter WHERE lastactive < " . (time () - 300) . " AND ipaddress  <> 'counter_total'");
	
	
	// Tinh tong so dang truy cap
	$allViewQuery 	= $ci->db->query("SELECT * FROM counter WHERE ipaddress  <> 'counter_total'");
	$onlineCount 	= $allViewQuery->num_rows();
	
	// Tinh luong truy cap trong ngay
	$today 	= $ci->db->query("SELECT * FROM counter WHERE ipaddress  <> 'counter_total' AND today='".date('Y-m-d')."'");
	$today = $today->num_rows();
	//$re = "<ul>";
	$re = "<li><b>Tr&#7921;c truy&#7871;n</b> : " . $onlineCount."</li>";
	$re .= "<li><b>T&#7893;ng s&#7889; </b> : " . $total . " l&#432;&#7907;t</li>";
	//$re .= "</ul>";
	
	return array('today' => $today, 'total_current' => $onlineCount, 'total' => $total);
}
?>