@extends('home.common')
@section('content')
	@carousel
		@slot('indicator')
			@for($i = 0; $i < count($carousels); $i++)
		        <li data-target="#carouselExampleIndicators" data-slide-to="0" @if($i == 0) class="active" @endif>
		        	
		        </li>
		    @endfor
		@endslot
		@foreach($carousels as $carousel)
			<div class="carousel-item @if($loop->first) active @endif">
			    <a href="http://{{$carousel->link}}">
			    	<img class="d-block w-100" style="height:300px" src="{{ asset('storage/'.$carousel->path) }}" alt="">
			    </a>
			</div>
		@endforeach
	@endcarousel

	
	<div class="row mt-4">
		<div class="col-md-9">
			<div class="mb-3">
			@indexhot
				@slot('type')
					推荐产品
				@endslot
				@slot('link')
					{{route('home.product.list')}}
				@endslot
				@each('home.includes.hotproducts', $products, 'product')
			@endindexhot
		    </div>
		    <div class="mt-4">
		    	@indexhot
		    		@slot('type')
		    			经典案例
		    		@endslot
		    		@slot('link')
		    			{{route('home.cases.index')}}
		    		@endslot
		    		@each('home.includes.indexcases', $cases, 'cases')
		    	@endindexhot
		    </div>
		</div>
		<div class="col-md-3 mt-4">
			@card(['news' => $news])
				@slot('title')
					<span>新闻动态</span><a href="{{route('home.news.index')}}" class="float-right text-dark card-link">更多>></a>
				@endslot
				@slot('more')
					更多
				@endslot
				@foreach($news as $item)
					<p class="card-text"><a class="card-link text-dark" href="{{route('home.news.show', $item)}}">{{$item->title}}</a></p>
				@endforeach
			@endcard
		
			@card
				@slot('title')
					联系我们
				@endslot
				@if($contacts)
					@foreach($contacts as $k => $v)
						<p class="card-text">
							@if(config('menu.contacts')[$k]['type'] == 'text')
							{{config('menu.contacts')[$k]['name']}}: {{$v}}
							@else
							{{config('menu.contacts')[$k]['name']}}: 
							<img src="{{asset('storage/'.$v)}}" width="40" height="40">
							@endif
						</p>
				    @endforeach
				@endif
			@endcard
		
	</div>
	@include('home.includes.link', ['links' => $links])	
</div>
@endsection