<ul class="list-unstyled list-inline">
	<li class="list-inline-item"><b>推荐产品</b></li>
	<li class="list-inline-item float-right"><a class="nav-link text-muted" href="{{route('home.product.list')}}">更多>></a></li>
</ul>
<div class="row">
@foreach ($hotproducts as $product)
	<div class="col-sm-3">
		<div class="card text-center">
			<a href="{{route('home.product.show', $product)}}"><img class="rounded mx-auto pt-2" width="150" height="150" src="{{asset('storage/'.$product->cover->path)}}"></a>
			<div class="card-body">

				<a href="{{route('home.product.show', $product)}}" class="card-link text-dark">
					{{ $product->name }}
				</a>
			</div>
		</div>
	</div>
@endforeach
</div>