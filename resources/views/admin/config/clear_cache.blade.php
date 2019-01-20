@extends('admin.header')

@section('content')
	@if(session()->has('cleared'))
		<div class="alert alert-success">缓存清除成功！</div>
	@else
	<form method="post" action="{{route('cache.flush')}}">
		@csrf
		<div class="alert alert-warning" role="alert">
		  确定清除缓存？ <button type="submit" class="alert-link">确定</button>
		</div>
	</form>
	@endif
@endsection