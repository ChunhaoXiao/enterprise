<div class="col-sm-3">
	<div class="card text-center">
		<a href="{{ route('home.product.show', $product) }}"><img class="rounded mx-auto pt-2" width="150" height="150" src="{{asset('storage/'.$product->cover->path)}}"></a>
		<div class="card-body">

			<a href="{{route('home.product.show', $product)}}" class="card-link text-dark">
				{{ $product->name }}
			</a>
		</div>
	</div>
</div>