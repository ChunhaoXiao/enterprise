@extends('admin.header')

@section('content')
	<p><a href="{{route('categories.create')}}" class="btn btn-primary">添加分类</a></p>
	<table class="table table-bordered">
		<thead class="table bg-info">
			<th>名称</th>
			<th>产品数量</th>
			<th>创建时间</th>
			<th>操作</th>
		</thead>
		<tbody>
			@foreach($categories as $cate)
				<tr>
					<td>{{ $cate->name }}</td>
					<td>{{$cate->products_count }}</td>
					<td>{{ $cate->created_at }}</td>
					<td class="text-center"><a href="{{route('categories.edit', $cate)}}" class="far fa-edit mr-3 text-muted"></a> <a class="far fa-trash-alt text-muted" href="javascript:;" data-url="{{route('categories.destroy', $cate)}}" ></a></td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<script type="text/javascript">
		//bootbox.alert('asdasdsa');
	</script>
@endsection