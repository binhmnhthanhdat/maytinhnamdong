<div id="header">
    	<div class="div1">
        	<div class="div2"><img src="<?=base_url();?>admin_template/image/logo_admin.png" /></div>
            <div class="div3">
            	<img src="<?=base_url();?>admin_template/image/lock.png" />
                Bạn đăng nhập với tài khoản <span><?php echo $this->session->userdata('username');?> | <a href="<?=$this->index_url;?>admin/user/logout" style="color:#ffffff; text-decoration:none;">Thoát</a></span>
            </div>
        </div>
        <div id="menu">
        	<ul class="left">
            	<li id="dashboard"><a href="<?=$this->index_url;?>admin" class="top">Admin page</a></li>
                <li><a href="#" class="top">Hệ thống</a>
                	<ul>
                    	<li><a href="<?=$this->index_url;?>admin/setting">Cài đặt chung</a>
                        <li><a href="<?=$this->index_url;?>admin/menu">Menu</a>
                        <li><a href="#" class="parent">User</a>
                        	<ul>
                            	<li><a href="<?=$this->index_url;?>admin/user">Thành viên</a></li>
                                <li><a href="<?=$this->index_url;?>admin/user_group">Nhóm quyền</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="#" class="top">Sản phẩm</a>
                	<ul>
                    	<li><a href="<?=$this->index_url;?>admin/category">Danh mục</a></li>
                        <li><a href="<?=$this->index_url;?>admin/product">Sản phẩm</a></li>
                    </ul>
                </li>
                <li><a href="#" class="top">Dịch vụ</a>
                	<ul>
                    	<li><a href="<?=$this->index_url;?>admin/category_service">Danh mục</a></li>
                        <li><a href="<?=$this->index_url;?>admin/service">Dịch vụ</a></li>
                    </ul>
                </li>
                <li><a href="#" class="top">Tin tức</a>
                	<ul>
                    	<li><a href="<?=$this->index_url;?>admin/news">Tin tức</a></li>
                        
                    </ul>
                </li>
                <li><a href="#" class="top">Thông tin khác</a>
                	<ul>
                    	<li><a href="<?=$this->index_url;?>admin/slide">Quản lý Slide</a></li>
                        <li><a href="<?=$this->index_url;?>admin/parttent">Quản lý Đối tác</a></li>
                        <li><a href="<?=$this->index_url;?>admin/hotro">Quản lý Hỗ trợ</a></li>
                        <li><a href="<?=$this->index_url;?>admin/maillienhe">Quản lý Mail khách liên hệ</a></li>
                        <li><a href="<?=$this->index_url;?>admin/khachhang">Quản lý Khách hàng</a></li>
                        <li><a href="<?=$this->index_url;?>admin/groupmenufooter">Quản lý Danh mục Footer</a></li>
                        <li><a href="<?=$this->index_url;?>admin/menufooter">Quản lý tin Footer</a></li>
                    </ul>
                </li>
                
            </ul>
        </div><!--End menu-->
    </div><!--End header-->