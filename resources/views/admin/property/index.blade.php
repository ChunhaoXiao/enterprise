@extends('admin.header')

@section('content')
	<p><a href="{{route('properties.create')}}" class="btn btn-primary">添加属性</a></p>
	<table class="table table-bordered">
		<thead>
			<th>名称</th>
			<th>添加时间</th>
			<th>排序</th>
			<th></th>
		</thead>
		<tbody>
			@foreach($properties as $property)
				<tr>
					<td>{{ $property->name }}</td>
					<td>{{ $property->created_at }}</td>
					<td>{{ $property->order}}</td>
					<td>
						<a href="{{route('properties.edit', $property)}}" class="far fa-edit mr-3 text-muted">
						</a> 
						<a class="far fa-trash-alt text-muted" href="javascript:;" data-url="{{route('properties.destroy', $property)}}" ></a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection	