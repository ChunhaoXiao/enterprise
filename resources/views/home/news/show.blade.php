@extends('home.common')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-2">
				
			</div>
			<div class="col-md-9">
				<h3 class="text-center">{{$news->title}}</h3>
				<p class="text-center"><span>发布时间：{{ $news->created_at }} </span><span class="ml-2">所属分类：{{config('menu.news')[$news->category]}}</span></p>
				<p>{!! $news->content !!}</p>
			</div>
		</div>
	</div>
@endsection