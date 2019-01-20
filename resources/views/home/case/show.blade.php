@extends('home.common')
@section('content')
	<div class="row">
		<div class="col-md-2">
			@category
			@endcategory
		</div>
		<div class="col-md-10">
			@bread 
			    <li class="breadcrumb-item active">经典案例</li>
			@endbread
			<p>
			    {{ $case->content }}
		    </p>
		    <p class="p-2">
		    	@foreach($case->pictures as $picture)
		    		<img src="{{asset('storage/'.$picture)}}">
		    	@endforeach
		    </p>
		</div>
		
	</div>

@endsection