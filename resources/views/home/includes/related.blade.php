@if($products)
<h5 class="mb-2 mt-4">相关产品</h5>
<ul class="list-inline">
	@foreach($products as $product)
		<li class="list-inline-item mr-4">
			<a href="{{ route('home.product.show', $product) }}"><img src="{{asset('storage/'.$product->cover->path)}}" width="80" height="80" class="rounded"></a>
			<p class="text-center">{{$product->name}}</p>
		</li>
	@endforeach
</ul>	
@endif