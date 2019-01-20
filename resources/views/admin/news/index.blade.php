@extends('admin.header')

@section('content')
	<p><a href="{{route('news.create')}}" class="btn btn-primary">添加</a></p>
	<table class="table table-borderless">
		<thead>
			<th>标题</th>
			<th>分类</th>
			<th>发布时间</th>
			<th>操作</th>
		</thead>
		<tbody>
			@foreach($datas as $data)
				<tr>
					<td>{{ $data->title }}</td>
					<td>{{ $data->category }}</td>
					<td>{{ $data->created_at }}</td>
					<td>
						<a href="{{route('news.edit', $data)}}" class="far fa-edit mr-3 text-muted"></a>
						<a class="far fa-trash-alt text-muted" href="javascript:;" data-url="{{route('news.destroy', $data)}}" ></a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection

