	<div id="header">
		<div class="header-top">
			<div class="container">
				<div class="pull-left auto-width-left">
					<ul class="top-menu menu-beta l-inline">
						<li><a href=""><i class="fa fa-home"></i> Yên Lâm- Yên Mô -Ninh Bình</a></li>
						<li><a href=""><i class="fa fa-phone"></i> 0929550594</a></li>
					</ul>
				</div>
				<div class="pull-right auto-width-right">
					<ul class="top-details menu-beta l-inline">
						@if(Auth::user())
						<li><a href="#"><i class="fa fa-user"></i>{{Auth::user()->full_name}}</a></li>
							<li><a href="dangxuat">Đăng Xuất</a></li>
						@else
							<li><a href="dangki">Đăng kí</a></li>
							<li><a href="dangnhap">Đăng nhập</a></li>
						@endif
					</ul>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-top -->
		<div class="header-body">
			<div class="container beta-relative">
				<div class="pull-left">
					<a href="index.html" id="logo"><img src="assets/dest/images/logo-cake.png" width="200px" alt=""></a>
				</div>
				<div class="pull-right beta-components space-left ov">
					<div class="space10">&nbsp;</div>
					<div class="beta-comp">
						<form role="search" method="get" id="searchform" action="timkiem">
					        <input type="text" value="" name="timkiem" id="s" placeholder="Nhập từ khóa..." />
					        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
						</form>
					</div>

					<div class="beta-comp">
						<div class="cart">
							<a class="add-to-cart pull-left" href="cartshop"><i class="fa fa-shopping-cart"></i></a>
						</div> <!-- .cart -->
					</div>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-body -->
		<div class="header-bottom" style="background-color: #0277b8;">
			<div class="container">
				<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
				<div class="visible-xs clearfix"></div>
				<nav class="main-menu">
					<ul class="l-inline ov">
						<li><a href="trangchu">Trang chủ</a></li>
						<li><a href="#">Sản phẩm</a>
							<ul class="sub-menu">
									@foreach($loaisanpham as$lsp)
									<li><a href="loaisanpham/{{$lsp->id}}">{{$lsp->name}}</a></li>
									@endforeach
								
							</ul>
						</li>
						<li><a href="gioithieu">Giới thiệu</a></li>
						<li><a href="lienhe">Liên hệ</a></li>
					</ul>
					<div class="clearfix"></div>
				</nav>
			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
	</div> <!-- #header -->