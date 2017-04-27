
<div id="myslidemenu" class="jqueryslidemenu">
	<ul>
    	<li><a href="#">Cấu hình chung</a>
            <ul>
                <li><a href="<?=$this->config->item('index_url');?>admin/setting">Setting</a></li>
                <li><a href="#">User</a>
                	<ul>
                    	<li><a href="<?=$this->config->item('index_url');?>admin/user">User</a></li>
                        <li><a href="<?=$this->config->item('index_url');?>admin/user_group">User Group</a></li>
                    </ul>
                
                <li><a href="<?=$this->config->item('index_url');?>admin/user/change_password">Đổi mật khẩu</a></li>
                <li><a href="<?=$this->config->item('index_url');?>admin/user/profile">Đổi thông tin</a></li>
                <li><a href="<?=$this->config->item('index_url');?>admin/user/logout">Thoát</a></li>
            </ul>
        	
        </li>
        <li><a href="#">Quản lý rao vặt</a>
        	<ul>
            		<li><a href="<?=$this->config->item('index_url');?>admin/province">Tỉnh thành</a></li>
                 	<li><a href="<?=$this->config->item('index_url');?>admin/article_type">Loại bài viết</a></li>
                    <li><a href="<?=$this->config->item('index_url');?>admin/category">Danh mục bài viết</a></li>
                    <li><a href="<?=$this->config->item('index_url');?>admin/product">Quản lý bài viết</a></li>
            </ul>
        </li>
        <li><a href="<?=$this->config->item('index_url');?>admin/member">Quản lý thành viên</a>
        	<ul>
            	<li><a href="<?=$this->config->item('index_url');?>admin/member_baned">Thành viên bị khóa</a></li>
            </ul>
        </li>
        <li><a href="#">Quản lý quảng cáo</a>
        	<ul>
            	<li><a href="<?=$this->config->item('index_url');?>admin/advertise/customer">Khách hàng</a></li>
               	<li><a href="<?=$this->config->item('index_url');?>admin/advertise">Hình ảnh quảng cáo</a></li>
                
            </ul>
        </li>
        
        <li><a href="#">Link tinh</a>
        	<ul>
            		<li><a href="<?=$this->config->item('index_url');?>admin/introduction">Giới thiệu</a></li>
                 	<li><a href="<?=$this->config->item('index_url');?>admin/terms">Điều khoản sử dụng</a></li>
                    <li><a href="<?=$this->config->item('index_url');?>admin/tutorial">Hướng dẫn sử dụng</a></li>
                    <li><a href="<?=$this->config->item('index_url');?>admin/support">Hổ trợ  - yahoo</a></li>
            </ul>
        </li>
        
    </ul>
</div>