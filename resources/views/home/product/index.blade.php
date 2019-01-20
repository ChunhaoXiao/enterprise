@extends('home.common')
@section('content')
	
		<div class="row">
			<div class="col-md-2">
				@category
				@endcategory
			</div>
			<div class="col-md-9">
				@bread
					<li class="breadcrumb-item active">产品中心</li>
				@endbread
				<ul class="list-unstyled">
					@foreach($products as $product)
				  <li class="media mb-4">
				    <a href="{{route('home.product.show', $product)}}"><img class="mr-3 rounded" src="{{asset('storage/'.$product->cover->path)}}" alt="{{$product->name}}" width="200" height="200"></a>
				    <div class="media-body">
				      <h5 class="mt-0 mb-1"><a href="{{route('home.product.show', $product)}}">{{ $product->name }}</a>
				      </h5>
				      {{str_limit(strip_tags($product->description),150)}}
				    </div>
				  </li>
				  @endforeach
				</ul>  
			</div>
		</div>
	
@endsection