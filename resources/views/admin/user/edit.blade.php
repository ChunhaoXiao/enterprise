@extends('admin.header')

@section('content')
	<form action="{{route('users.update', $user)}}" method="post">
		@csrf
		<div class="form-group col-6">
			<label>用户名</label>
			<input type="text" name="name" class="form-control" value="{{$user->name}}">
		</div>
		<div class="form-group col-6">
			<label>密码</label>
			<input type="passwo" name="password" class="form-control">
		</div>
		<div class="form-group col-6">
			<label>类型</label>
			<select class="form-control" name="role_type">
				<option value="">普通用户</option>
				<option @if($user->role_type == 'manager') selected @endif value="manager">客服人员</option>
			</select>
		</div>
		@method('PUT')
		<div class="form-group p-2">
			<button class="btn btn-primary">确定</button>
		</div>
	</form>
@endsection