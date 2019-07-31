@extends('layout.master')

@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Đăng nhập</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="trangchu">Home</a> / <span>Đăng nhập</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			
			<form action="dangnhap" method="POST" class="beta-form-checkout">
				<div class="row">
					@if(count($errors) > 0)
                        <div class="alert alert-danger" style="text-align: center">
                            @foreach($errors->all() as $err)
                                   {{$err}}<br>
                            @endforeach
                        </div>
                    @endif
                    @if(session('thongbao1'))
                    	<div class="alert alert-danger" style="text-align: center">
                    		{{session('thongbao1')}}
                    		
                    	</div>
                    		}
                    @endif
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<h4>Đăng nhập</h4>
						<div class="space20">&nbsp;</div>

						
						<div class="form-block">
							<label for="email">Email address*</label>
							<input type="email" id="email" name="email">
						</div>
						<div class="form-block">
							<label for="phone">Password*</label>
							<input type="password" id="phone" name="pass">
						</div>
						<div class="form-block">
							<button type="submit" class="btn btn-primary">Login</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
				{{ csrf_field() }}
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->

@endsection