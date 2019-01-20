@extends('admin.header')

@section('content')
	<p><a class="btn btn-primary" href="{{ route('downloads.create') }}">添加</a></p>
	<table class="table table-bordered">
		<thead>
			<th>标题</th>
			<th>查看</th>
			<th>创建时间</th>
			<th></th>
		</thead>
		<tbody>
			@foreach($datas as $data)
				<tr>
					<td>{{ $data->title }}</td>
					<td><a href="{{route('file.download', $data)}}">查看</a></td>
					<td>{{ $data->created_at }}</td>
					<td>
						<a href="{{route('downloads.edit', $data)}}" class="far fa-edit text-muted mr-3"></a>
					    <a href="javascript:;" data-url="{{route('downloads.destroy', $data)}}" class="far fa-trash-alt text-muted"></a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection