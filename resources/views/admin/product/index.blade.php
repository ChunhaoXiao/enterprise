@extends('admin.header')

@section('content')
	<div>
		<a href="{{route('products.create')}}" class="btn btn-primary float-left">添加产品</a>
		<form action="{{route('products.index')}}">
			<div class="form-group row justify-content-end">
				<div class="col-md-3">
					<select class="form-control" name="category">
						<option value="">选择分类</option>
						@foreach($all_categories as $cate)
							<option @if(request()->category == $cate->id) selected @endif value="{{$cate->id}}">{{ $cate->name }}</option>
						@endforeach
					</select>
				</div>
				<div class="col-md-3">
					<input type="text" name="name" class="form-control" placeholder="产品名称" value="{{request()->name}}">
				</div>
				<div class="col-md-auto">
					<button class="btn btn-secondary">搜索</button>
				</div>
			</div>
		</form>
	</div>
<table class="table table-bordered">
	<thead>
		<th>产品名称</th>
		<th>所属分类</th>
		<th>图片</th>
		<th>操作</th>

	</thead>
	<tbody>
		@foreach($products as $product)
			<tr>
				<td>{{ $product->name }}</td>
				<td>{{ $product->category->name }}</td>
				<td>
					<img src="{{ asset('storage/'.$product->cover->path) }}" class="rounded" width="60" height="50" data-toggle="modal" data-target="#product_pictures" data-url="{{route('productpictures.index', $product)}}">
				</td>
				<td text-center>
					<a href="{{route('products.edit', $product)}}" class="far fa-edit text-muted mr-3"></a>
					<a href="javascript:;" data-url="{{route('products.destroy', $product)}}" class="far fa-trash-alt text-muted"></a>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>


<div class="modal fade" id="product_pictures">
  <div class="modal-dialog modal-dialog-centered">

    <div class="modal-content">
    	<ul class="list-inline text-center">


	     
        </ul>
    </div>
  </div>
</div>

<script>
	$(function(){
		$('#product_pictures').on('shown.bs.modal', function(e){
		   var obj = e.relatedTarget;
		   const url = $(obj).data('url');
		   $.ajax({
		   	  url:url,
		   	  type:'get',
		   	  success:function(res)
		   	  {
		   	  	
		   	  	let str = '';
		   	  	$.each(res.data, function(k, v){
		   	  		
		   	  	 	str += '<li class="list-inline-item pt-2"><img src='+v.path+' width=80 height=80><a href="javascript:;" data-url='+v.url+' class="nav-link">设为封面</a></li>';
		   	  	});
		   	  	$(".list-inline").append(str);
		   	  }
		   });

		})

		$('#product_pictures').on('hide.bs.modal', function(){
			$(".modal .list-inline").empty();
		})

		$(document).on('click', ".modal a", function(e){
			const url = $(this).data('url');
			console.log(url);
			$.ajax({
				url:url,
				type:'put',
				success:function(res){
					console.log(res);
					$('#product_pictures').modal('hide');
				}
			});
		});
	});
</script>    
@endsection