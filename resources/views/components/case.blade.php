<ul class="list-unstyled list-inline">
	<li class="list-inline-item"><b>经典案例</b></li>
	<li class="list-inline-item float-right"><a class="nav-link text-muted" href="{{route('home.product.list')}}">更多>></a></li>
</ul>
<div class="row">
@foreach ($cases as $case)
	<div class="col-sm-3">
		<div class="card text-center">
			<a href="#"><img class="rounded mx-auto pt-2" width="150" height="150" src="{{asset('storage/'.$case->pictures[0])}}"></a>
			<div class="card-body">

				<a href="{{route('home.product.show', $case)}}" class="card-link text-dark">
					{{ $case->title }}
				</a>
			</div>
		</div>
	</div>
@endforeach
</div>