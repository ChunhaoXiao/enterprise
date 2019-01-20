<div class="col-sm-3">
	<div class="card text-center">
		<a href="{{route('home.cases.show', $cases)}}"><img class="rounded mx-auto pt-2" width="150" height="150" src="{{asset('storage/'.$cases->pictures[0])}}"></a>
		<div class="card-body">

			<a href="{{route('home.cases.show', $cases)}}" class="card-link text-dark">
				{{$cases->title}}
			</a>
		</div>
	</div>
</div>