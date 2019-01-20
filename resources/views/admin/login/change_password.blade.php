@extends('admin.header')

@section('content')
	<form method="post" action="{{ route('password.update') }}">
		<div class="form-group col-md-6">
			<label>原密码</label>
			<input type="password" name="oldpassword" class="form-control">
		</div>
		<div class="form-group col-md-6">
			<label>新密码</label>
			<input type="password" name="password" class="form-control">
		</div>
		<div class="form-group col-md-6">
			<label>确认密码</label>
			<input type="password" name="password_confirmation" class="form-control">
		</div>
		@csrf
		@method('PUT')
		<div class="form-group">
			<label></label>
			<button class="btn btn-primary ml-2" type="submit">确定</button>
		</div>
	</form>
	@if ($errors->any())
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
    @endif
@endsection