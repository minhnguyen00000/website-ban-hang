
<header class="main_header_area">
			<div class="top_header_area row m0">
				<div class="container">
					<div class="float-left">
						<a href="tell:+18004567890"><i class="fa fa-phone" aria-hidden="true"></i> + (1800) 456 7890</a>
						<a href="mainto:info@cakebakery.com"><i class="fa fa-envelope-o" aria-hidden="true"></i> info@cakebakery.com</a>
							<?php
								if(isset($_SESSION['user'])){
										$user = $_SESSION['user'];									
									echo("
									<a href=''><i class='fa fa-user' ></i>".$user['ten_kh']." |</a>
									<a href='/logout'>Đăng xuất</a>				
									");
								}
								else{
							?>	
						<a href="/login"><i class="fa fa-sign-in" ></i>Đăng nhập</a>
								<?php } ?>
					</div>
					<div class="float-right">
						<ul class="h_social list_style">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
						</ul>
						<ul class="h_search list_style">
							<li class=""><a href="cart"><i class="lnr lnr-cart"></i></a></li>
							<li><a class="popup-with-zoom-anim" href="#test-search"><i class="fa fa-search"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="main_menu_two">
				<div class="container">
					<nav class="navbar navbar-expand-lg navbar-light bg-light">
						<a class="navbar-brand" href="index.php"> <strong style="font-family: cursive;color: pink;">Toan Nhat cake</strong><!-- <img src="img/logo-2.png" alt=""> --></a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="my_toggle_menu">
                            	<span></span>
                            	<span></span>
                            	<span></span>
                            </span>
						</button>
						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<ul class="navbar-nav justify-content-end">
								<li class="dropdown submenu">
									<a  href="index.php" role="button" aria-haspopup="true" aria-expanded="false">Trang chủ</a>
								</li>
								<li><a href="cake.php">Menu</a></li>
								
								<li class="dropdown submenu">
									<a  href="about-us.php" role="button" aria-haspopup="true" aria-expanded="false">Giới thiệu</a>
								</li>
								
								
								<li class="dropdown submenu">
									<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Tin tức</a>
									
								</li>
								<li><a href="contact.php">Liên hệ </a></li>
							</ul>
						</div>
					</nav>
				</div>
			</div>
		</header>