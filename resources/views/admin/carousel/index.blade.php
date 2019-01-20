@extends('admin.header')

@section('content')
	<p><a href="{{route('carousels.create')}}" class="btn btn-primary">添加图片</a></p>
	<table class="table table-bordered text-center">
		<thead>
			<th>图片</th>
			<th>链接</th>
			<th>排序</th>

			<th></th>
		</thead>
		@foreach($pictures as $picture)
			<tr>
				<td>
					<img src="{{asset('storage/'.$picture->path)}}" width="50" height="50">
				</td>
				<td>{{ $picture->link }}</td>
				<td>{{ $picture->order }}</td>
				<td>
					<a href="{{route('carousels.edit', $picture)}}" class="far fa-edit mr-3 text-muted"></a> 
					<a href="javascript:;" data-url="{{ route('carousels.destroy', $picture) }}" class="far fa-trash-alt text-muted"></a>
				</td>
			</tr>
		@endforeach
	</table>
@endsection