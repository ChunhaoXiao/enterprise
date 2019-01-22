@extends('home.common')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-2">
				
			</div>

			<div class="col-md-9">
				@component('components.breadcrumb')
					@if(strpos(request()->path(), 'overview'))
						<li class="breadcrumb-item active">关于我们</li>
					@elseif(strpos(request()->path(), 'contact'))
						<li class="breadcrumb-item active">联系我们</li>
					@elseif(strpos(request()->path(), 'sales'))	
						<li class="breadcrumb-item active">销售网络</li>
					@endif
				@endcomponent

				@if(request()->route()->type == 'contact')
					<dl class="row">
					@if(!empty($data->content))
					@foreach($data->content as $key => $value)
						@isset(config('menu.contacts')[$key])
						<dt class="col-md-3">{{config('menu.contacts')[$key]['name'] }}</dt>
						@if(config('menu.contacts')[$key]['type'] == 'file')
							<img src="{{asset('storage/'.$value)}}" width="80" height="80">
						@else
						<dd class="col-md-8">{{$value}}</dd>
						@endif
						@endisset
						
					@endforeach
					@endif
				    </dl>
				@else
					<p>{!! $data->content?? '' !!}</p>
				@endif
			</div>
		</div>
	</div>
@endsection