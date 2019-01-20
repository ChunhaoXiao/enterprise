@extends('admin.header')

@section('content')
	<p>
		<a href="{{route('navigators.create')}}" class="btn btn-primary">
			添加
		</a>
	</p>
	<table class="table table-bordered">
		<thead>
			<th>名称</th>
			<th>链接</th>
			<th>排序</th>
			<th>状态</th>
			<th>操作</th>
		</thead>
		<tbody>
			@foreach($navigators as $nav)
				<tr>
					<td>{{ $nav->name }}</td>
					<td>{{ $nav->link }}</td>
					<td>{{ $nav->order_num }}</td>
					<td>{{ $nav->enabled? '已启用' : '未启用'}}</td>
					<td>
						<a href="{{route('navigators.edit', $nav)}}" class="far fa-edit mr-3 text-muted"></a> <a class="far fa-trash-alt text-muted" href="javascript:;" data-url="{{route('navigators.destroy', $nav)}}" ></a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection