@extends('admin.header')
@section('content')
	<p><a class="btn btn-primary" href="{{route('users.create')}}">添加</a></p>
	<form method="get" action="{{route('users.index')}}">
		<div class="form-group row">
			<div class="col-3">
				<input type="text" name="name" class="form-control" placeholder="用户名" value="{{request()->name}}">
			</div>
			<div col-auto>
				<button class="btn btn-secondary">
					<i class="fa fa-search"></i>
				</button>	
			</div>
		</div>
	</form>
	<table class="table table-hover">
		<thead>
			<th>用户名</th>
			<th>类型</th>
			<th>注册时间</th>
			<th>操作</th>
		</thead>
		<tbody>
			@foreach($users as $user)
			<tr>
				<td>{{ $user->name }}</td>
				<td>{{ $user->role_type?? '普通用户'}}</td>
				<td> {{$user->created_at}} </td>
				<td>
					<a href="{{route('users.edit', $user)}}" class="far fa-edit mr-3 text-muted"></a> 
					<a href="javascript:;" data-url="{{ route('users.destroy', $user) }}" class="far fa-trash-alt text-muted"></a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
@endsection