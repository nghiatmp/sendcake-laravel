@extends('layout.master')

@section('content')
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<?php
					function doimau($str,$key){
						return str_replace($key, "<span style='color:red'>$key</span>", $str);
					}
				?>
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>Sản phẩm với từ khóa :  {{$key}}</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm Thấy: {{$sanpham->total()}} Sản Phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($sanpham as $sp)
								<div class="col-sm-3">
									<div class="single-item">
										@if($sp->promotion_price != 0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										
										@endif
										
										<div class="single-item-header">
											<a href="sanpham/{{$sp->id}}"><img width="300" height="200" src="source/image/product/{{$sp->image}}" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{!! doimau($sp->name,$key)!!}</p>
											<p class="single-item-price">
												@if($sp->promotion_price != 0)
												<span class="flash-del">{{"$".number_format($sp->unit_price)}}</span>
												<span class="flash-sale">{{"$".number_format($sp->promotion_price)}}</span>
												@else
												<span >{{"$".$sp->unit_price}}</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="muahang/{{$sp->id}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="sanpham/{{$sp->id}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
						</div> <!-- .beta-products-list -->
						<div style="text-align: center">	
							{{-- {{$sanpham->links()}} --}}
							{{$sanpham->appends(Request::all())->links()}}
						</div>

						<div class="space50">&nbsp;</div>
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection