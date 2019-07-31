@extends('layout.master')

@section('content')
		<div class="container"> 
		  <div id="myCarousel" class="carousel slide" data-ride="carousel">
		    <!-- Indicators -->
		    <ol class="carousel-indicators">
		    	<?php $i=0;?>
		    	@foreach($slide as $sl)
		      		<li data-target="#myCarousel" data-slide-to="{{$i}}" class=" 
		      		 @if($i==0)
		      			{{'active'}}
		      		@endif "
		      		></li>
					<?php $i++;?>
		      	@endforeach

		    </ol>

		    <!-- Wrapper for slides -->
		    <div class="carousel-inner">
		    	<?php $i=0;?>
		    	@foreach($slide as $sl)
			      <div class="
			     	@if($sl->id == 4)
						{{'item active'}}
					@else
						{{'item'}}	
			     	@endif ">
			        <img src='{{asset('source/image/slide/'.$sl->image)}}' alt="" style="width:100%; height:350px" >
			      </div>
		      @endforeach

		    </div>

		    <!-- Left and right controls -->
		    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
		      <span class="glyphicon glyphicon-chevron-left"></span>
		      <span class="sr-only">Previous</span>
		    </a>
		    <a class="right carousel-control" href="#myCarousel" data-slide="next">
		      <span class="glyphicon glyphicon-chevron-right"></span>
		      <span class="sr-only">Next</span>
		    </a>
		  </div>
		</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>Sản phẩm mới</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{$sanphamnew->total()}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row" style="margin-bottom: 10px;">
								@foreach($sanphamnew as $spn)
								
								<div class="col-sm-3">
									<div class="single-item">
										@if($spn->promotion_price != 0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										
										@endif
										
										<div class="single-item-header">
											<a href="sanpham/{{$spn->id}}"><img width="300" height="200" src="source/image/product/{{$spn->image}}" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$spn->name}}</p>
											<p class="single-item-price">
												@if($spn->promotion_price != 0)
												<span class="flash-del">{{"$".number_format($spn->unit_price)}}</span>
												<span class="flash-sale">{{"$".number_format($spn->promotion_price)}}</span>
												@else
												<span >{{"$".$spn->unit_price}}</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="muahang/{{$spn->id}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="sanpham/{{$spn->id}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
						</div>
						<div style="text-align: center">
							{{$sanphamnew->links()}}
						</div>
						 <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Sản Phẩm khuyến mại</h4>
							<div class="beta-products-details">
								<p class="pull-left">Có {{$sanphamkhuyenmai->total()}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@foreach($sanphamkhuyenmai as $spkn)
								<div class="col-sm-3">
									<div class="single-item">
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>

										<div class="single-item-header">
											<a href="sanpham/{{$spkn->id}}"><img width="300" height="200" src="source/image/product/{{$spkn->image}}" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$spkn->name}}</p>
											<p class="single-item-price">
												<span class="flash-del">{{"$".number_format($spkn->unit_price)}}</span>
												<span class="flash-sale">{{"$".number_format($spkn->promotion_price)}}</span>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="muahang/{{$spkn->id}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="sanpham/{{$spkn->id}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
								
							</div>
							<div style="text-align: center">
								{{$sanphamkhuyenmai->links()}}
							</div>
							
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection