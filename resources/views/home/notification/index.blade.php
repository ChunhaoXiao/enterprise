@extends('home.common')
@section('content')
	<div class="row">
			<div class="col-md-2">
				@category
				@endcategory
			</div>
			<div class="col-md-9">
				@bread
					<li class="breadcrumb-item active">我的提醒</li>
				@endbread
				<ul class="list-group row">
					@foreach($notifications as $notification)

				  		<li class="list-group-item media">
				  			<div class="media-heading">
				  				@if(!$notification->read_at)
				  				<span class="badge badge-secondary">New</span>
				  				@endif
				  				<span> {{ $notification->data['user'] }} 评论了 <a class="alert-link" href="{{route('home.product.show', ['id' => $notification->data['product_id']])}}">{{$notification->data['product_name']}}</a> </span>

				  			</div>
				  		</li>

				    @endforeach
				    {{ $notifications->markAsRead() }}
				</ul>  
			</div>
		</div>
@endsection