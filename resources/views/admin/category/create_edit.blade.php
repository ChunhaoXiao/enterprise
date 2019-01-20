@extends('admin.header')

@section('content')
	@if(Route::currentRouteName() == 'categories.create')
	<form method="post" action="{{route('categories.store')}}">
		<div class="form-group col-md-6">
			<label>分类名称</label>
			<input type="text" name="name" class="form-control">
		</div>
		@csrf
		<div class="form-group">
			<label></label>
			<button class="btn btn-primary">
				提交
			</button>
		</div>
	</form>
	@else
		<form method="post" action="{{route('categories.update', $category)}}">
		<div class="form-group col-md-6">
			<label>分类名称</label>
			<input type="text" name="name" class="form-control" value="{{ $category->name }}">
		</div>
		@csrf
		@method('put')
		<div class="form-group">
			<label></label>
			<button class="btn btn-primary">
				提交
			</button>
		</div>
	</form>

	@endif

	@if ($errors->any())
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
    @endif

@endsection