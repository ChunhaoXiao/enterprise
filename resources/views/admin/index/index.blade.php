@extends('admin.header')

@section('content')
	<div>
		<div class="alert alert-primary">
			你好，{{Auth::guard('admin')->user()->username}}. 你上次登录 ip 是：{{ Auth::guard('admin')->user()->last_login_ip }}, 登录时间是: {{Auth::guard('admin')->user()->last_login_time }}
		</div>
	</div>
	@component('components.list')
		@slot('title')
			 系统信息
		@endslot
		<div class="row mb-3">
			<div class="col-md-4">操作系统</div>
			<div class="col-md-6">{{  PHP_OS }}</div>
		</div>
		<div class="row mb-3">
			<div class="col-md-4">laravel版本</div>
			<div class="col-md-6">{{ app()->version() }}</div>
		</div>
		<div class="row mb-3">
			<div class="col-md-4">php 版本</div>
			<div class="col-md-6">{{ phpversion() }}</div>
		</div>
		<div class="row mb-3">
			<div class="col-md-4">数据库</div>
			<div class="col-md-6">{{env('DB_CONNECTION')}}</div>
		</div>
	@endcomponent

	@component('components.list',['summary'=>$summary])
		@slot('title')
			数据统计
		@endslot
		<div class="row mb-3">
			<div class="col-md-4">分类数量</div>
			<div class="col-md-6">{{$summary['category_count']}}</div>
		</div>
		<div class="row mb-3">
			<div class="col-md-4">产品数量</div>
			<div class="col-md-6">{{ $summary['product_count'] }}</div>
		</div>
		<div class="row mb-3">
			<div class="col-md-4">留言数量</div>
			<div class="col-md-6">{{  $summary['message_count'] }}</div>
		</div>

	@endcomponent

@endsection