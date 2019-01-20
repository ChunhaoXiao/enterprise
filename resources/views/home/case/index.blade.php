@extends('home.common')
@section('content')
	<div class="row">
		<div class="col-md-2">
			
		</div>
		<div class="col-md-10">
			@bread
				<li class="breadcrumb-item active">经典案例</li>
	        @endbread
	       		<ul class="list-group list-group-flush">
	        		@foreach($cases as $case)
	        			
        				<a class="list-group-item list-group-item-action list-group-item-light" href="{{route('home.cases.show', $case)}}">{{$case->title}}</a>
	        			
	        		@endforeach
	        	</ul>
	    </div>   	
	</div>    
@endsection