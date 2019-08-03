<div class="col-sm-2 col-md-2">
			<img width="250" src="source/assets/dest/images/logo-cake.png" alt="">
			<div class="">
				<ul class="mother">
				<li class="limother " >
			  		<a href="" title="">Loại Bánh</a>
			  		<ul class="second">
						<li><a href="admin/loaibanh/list" title="">Danh sách</a></li>
						<li><a href="admin/loaibanh/add" title="">Thêm Loại Bánh</a></li>
					</ul>
				</li>
				<li class="limother " >
			  		<a href="" title="">Sản Phẩm</a>
			  		<ul class="second">
						<li><a href="admin/sanpham/list" title="">Danh sách</a></li>
						<li><a href="admin/sanpham/add" title="">Thêm Bánh</a></li>
					</ul>
				</li>
					
				<li class="limother ">
			  		<a href="" title="">Slide</a>
			  		<ul class="second">
						<li><a href="admin/slide/list" title="">Danh sách</a></li>
						<li><a href="admin/slide/add" title="">Thêm Slide</a></li>
					</ul>
				</li>
				<li class="limother " >
			  		<a href="" title="">Người Dùng</a>
			  		<ul class="second">
						<li><a href="admin/user/list" title="">Danh sách</a></li>
						@if(Auth::user()->quyen == 2)
						<li><a href="admin/user/add" title="">Thêm Nguoi</a></li>
						@endif
					</ul>
				</li>
				<li class="limother " >
			  		<a href="admin/hoadon/hoadonlist" title="">Hóa Đơn</a>
			  		{{-- <ul class="second">
						<li><a href="" title="">Danh sách</a></li>
					</ul> --}}
				</li>
				<li class="limother " >
			  		<a href="admin/thongke/thongke" title="">Thống Kê</a>
			  		<ul class="second">
						<li><a href="admin/thongke/thongke" title="">Hóa Đơn Năm</a></li>
						<li><a href="admin/thongke/thongkesp" title="">Sản Phẩm Năm</a></li>
						<li><a href="admin/thongke/thongkeloaibanh" title="">Loại Bánh</a></li>
						<li><a href="admin/thongke/thongketienthang" title="">Tổng Tiền</a></li>
					</ul>
				</li>
				{{-- <li class="limother">
			  		<a href="" title="">Khách Hàng</a>
			  		<ul class="second">
						<li><a href="" title="">Thông Tin</a></li>
					</ul>
				</li> --}}
			</ul>
			</div>
		</div>