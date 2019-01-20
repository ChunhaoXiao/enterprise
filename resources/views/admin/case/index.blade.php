@extends('admin.header')

@section('content')
	<p><a class="btn btn-primary" href="{{route('cases.create')}}">添加</a></p>
	<table class="table table-bordered">
		<thead>
			<th>标题</th>
			<th>查看</th>
			<th>操作</th>
		</thead>
		<tbody>
			@foreach($datas as $data)
				<tr>
					<td>{{$data['title']}}</td>
					<td></td>
					<td>
						<a href="{{route('cases.edit', $data)}}" class="far fa-edit text-muted mr-3"></a>
						<a href="javascript:;" data-url="{{route('cases.destroy', $data)}}" class="far fa-trash-alt text-muted"></a>
					</td>
				</tr>
			@endforeach
		</tbody>
		
	</table>
@endsection