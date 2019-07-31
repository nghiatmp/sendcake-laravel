<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<base href="{{asset('')}}">
	<link rel="stylesheet" href="source/assets/dest/css/admin.css">
	<link rel="stylesheet" type="text/css" href="source/assets/dest/css/bootstrap.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
	<!-- link table -->
	<!-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css"> -->
	<!-- link table -->
</head>


</head>
<body>
	<div class="row">
		<div class="col-sm-12" style="">
			<div class="col-sm-2">
				
			</div>
			<div class="col-sm-8" style="margin-left: 300px">
				<h2 class="page-header"> Đăng Nhập Admin
					
				</h2>
				 <div class="col-sm-12">
				 	@if(count($errors) > 0 )
				 		<div class="alert alert-danger">
				 			@foreach($errors->all() as $err)
				 				{{$err}}<br>
				 			@endforeach
				 		</div>
				 	@endif
				 	@if(session('thongbao'))
				 		<div class="alert alert-danger">
				 			{{session('thongbao')}}
				 		</div>
				 	@endif
				 	<form action="admin/dangnhap" method="post">
						  <div class="form-group">
						    <label for="exampleInputEmail1">Email address</label>
						    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
						    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
						  </div>
						  <div class="form-group">
						    <label for="exampleInputPassword1">Password</label>
						    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="pass">
						  </div>
						  <div class="form-group form-check">
						    <input type="checkbox" class="form-check-input" id="exampleCheck1">
						    <label class="form-check-label" for="exampleCheck1">Check me out</label>
						  </div>
						  <button type="submit" class="btn btn-primary">Submit</button>
						  {{ csrf_field() }}
						</form>
				 </div>
				 
			</div>
			<div class="col-sm-2">
				
			</div>
		</div>
			
	</div>

	<footer>
		<p>Break Crepe</p>
	</footer>

	

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	 <script type="text/javascript" language="javascript" src="source/assets/dest/ckeditor/ckeditor.js" ></script>

	 @yield('script')

	<!-- TABLE -->
<!-- 	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"  type="text/javascript"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(document).ready(function() {
    $('#example').DataTable();
		} );
	</script> -->
	
</body>
</html>
	
