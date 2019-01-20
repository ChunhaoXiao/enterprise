@extends('home.common')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-2">
				@category
				@endcategory
			</div>
			<div class="col-md-10">
				@component('components.breadcrumb')
					<li class="breadcrumb-item"><a href="#">产品中心</a></li>
					<li class="breadcrumb-item active">产品展示</li>
				@endcomponent
				<p>
				    <h5 class="text-center">{{ $product->name }}</h5>
			    </p>
			    <p class="text-center">发布时间：{{$product->created_at}}</p>
				<div class="card p-2">
					@foreach($product->pictures as $picture)
						<img class="card-img-top mb-3" src="{{asset('storage/'.$picture->path)}}">
					@endforeach
					<h5 class="card-title">
						产品描述
					</h5>
					<p class="card-text">
						{!! $product->description !!}
					</p>
					<h5 class="card-title">
						产品参数
					</h5>
					<table class="table table-bordered">
						<thead>
							
						</thead>
						<tbody>	
							@foreach($product->properties as $property)
								<tr>
									<td>{{$property->name}}</td>
									<td>{{$property->pivot->value}}</td>
								</tr>
							@endforeach
						</tbody>
					</table>

					@include('home.includes.related', ['products' => $product->getRelated()])
					
				</div>
				@include('home.includes.product_comment')
			</div>
		</div>
	</div>
	
@endsection