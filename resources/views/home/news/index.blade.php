@extends('home.common')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-2">
				@category
				@endcategory
			</div>
			<div class="col-md-9">
				@component('components.breadcrumb')
					<li class="breadcrumb-item active">新闻动态</li>
				@endcomponent
				<table class="table table-borderless">
					<thead>
						<th>标题</th>
						<th>分类</th>
						<th>发布时间</th>
					</thead>
					<tbody>
						@foreach($newslist as $news)
				  		<tr>
				  			<td><a class="text-dark" href="{{ route('home.news.show', $news) }}"> {{ $news->title }}</a> </td>
				  			<td>{{ config('menu.news')[$news->category]}}</td>
				  			<td>{{ $news->created_at }}</td>
				  		</tr>
				        @endforeach
					</tbody>
					
				</table> 
			</div>
		</div>
	</div>
@endsection