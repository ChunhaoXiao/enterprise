<div class="card">
	<div class="card-header">
		产品分类
	</div>
	<ul class="list-group list-group-flush">
		@foreach($all_categories as $category)
			<li class="list-group-item d-flex justify-content-between align-items-center">
				<a class="card-link text-primary" href="{{route('home.product.list', ['category' => $category->id])}}">{{$category->name}}</a>
				<span class="badge badge-primary badge-pill">{{ $category->products_count }}</span>
			</li>
		@endforeach
	</ul>
</div>