@extends('layout.master')

@section('content')
		<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Đăng kí</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="index.html">Home</a> / <span>Đăng kí</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			
			<form action="dangki" method="POST" class="beta-form-checkout">
				<div class="row">
					@if(count($errors) > 0)
                        <div class="alert alert-danger" style="text-align: center">
                            @foreach($errors->all() as $err)
                                   {{$err}}<br>
                            @endforeach
                        </div>
                    @endif
                    @if(session('thongbao'))
                    	<div class="alert alert-success" style="text-align: center">
                    		{{session('thongbao')}}
                    		
                    	</div>
                    		}
                    @endif
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<h4>Đăng kí</h4>
						<div class="space20">&nbsp;</div>

						
						<div class="form-block">
							<label for="email">Email address*</label>
							<input type="email" id="email" name="email" >
						</div>

						<div class="form-block">
							<label for="your_last_name">Fullname*</label>
							<input type="text" id="your_last_name" name="name">
						</div>

						<div class="form-block">
							<label for="adress">Address*</label>
							<input type="text" id="adress" value="" name="address">
						</div>


						<div class="form-block">
							<label for="phone">Phone*</label>
							<input type="text" id="phone" name="phone">
						</div>
						<div class="form-block">
							<label for="phone">Password*</label>
							<input type="password" id="pass" name="pass">
						</div>
						<div class="form-block">
							<label for="phone">Re password*</label>
							<input type="password" id="phone" name="passAgain">
						</div>
						<div class="form-block">
							<button type="submit" class="btn btn-primary">Register</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
				{{ csrf_field() }}
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->

@endsection