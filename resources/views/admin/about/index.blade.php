@extends('admin.header')

@section('content')
	<p><a href="{{ route("abouts.create") }}" class="btn btn-primary">添加</a></p>
	<table class="table table-hover">
		<thead>
			<th>分类</th>
			<th>发布日期</th>
			<th>操作</th>
		</thead>
		<tbody>
			@foreach($datas as $data)
				<tr>
					<td>{{config('menu.about')[$data->category]}}</td>
					<td>{{ $data->updated_at }}</td>
					<td><a href="{{route('abouts.edit', $data)}}" class="far fa-edit mr-3 text-muted"></a> <a class="far fa-trash-alt text-muted" href="javascript:;" data-url="{{route('abouts.destroy', $data)}}" ></a></td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection