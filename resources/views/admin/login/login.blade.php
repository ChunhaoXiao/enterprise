<!DOCTYPE html>
<html>
<head>
	<title>后台管理</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
    <style type="text/css">
    	html, body {
		  height:100%;
		}
		body {
		  display:flex;
		  align-items:center;
		}
    </style>
</head>
<body>
	<div class="container h-100">
		<div class="row align-items-center h-100">
			<div class="col">
				<h3 class="text-center mb-4">管理员登录</h3>
				<form method="post" action="{{route('admin.login')}}">
					<div class="form-group col-md-6 mx-auto">
						<input type="text" name="username" class="form-control" placeholder="用户名">
					</div>
					<div class="form-group col-md-6 mx-auto">
						<input type="password" name="password" class="form-control" placeholder="密码">
					</div>
					@csrf
					<div class="form-group col-md-6 mx-auto text-center">
						<label></label>
						<button class="btn btn-primary btn-block" type="submit">登录</button>
					</div>
				</form>

				@if ($errors->any())
				    <div class="alert alert-danger">
				        <ul>
				           <li>用户名或密码错误</li>
				        </ul>
				    </div>
			    @endif
			</div>
		</div>
	</div>
</body>