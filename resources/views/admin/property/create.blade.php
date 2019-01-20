@extends('admin.header')

@section('content')
	
	<form method="post" @empty($property) action="{{route('properties.store')}}" @else action="{{route('properties.update', $property)}}" @endempty>
		@empty($property)
		<div class="form-group row">
			<div class="col-md-4">
				<input type="text" name="name[]" class="form-control" placeholder="属性名称">
			</div>
			<div class="col-md-2">
				<input type="text" name="order[]" class="form-control"   placeholder="排序">
			</div>
		</div>

		<div class="form-group row">
			<div class="col-md-4">
				<input type="text" name="name[]" class="form-control" placeholder="属性名称">
			</div>
			<div class="col-md-2">
				<input type="text" name="order[]" class="form-control"  placeholder="排序">
			</div>
		</div>

		<div class="form-group row">
			<div class="col-md-4">
				<input type="text" name="name[]" class="form-control" placeholder="属性名称">
			</div>
			<div class="col-md-2">
				<input type="text" name="order[]" class="form-control"   placeholder="排序">
			</div>
		</div>

		<div class="form-group row">
			<div class="col-md-4">
				<input type="text" name="name[]" class="form-control" placeholder="属性名称">
			</div>
			<div class="col-md-2">
				<input type="text" name="order[]" class="form-control"   placeholder="排序">
			</div>
		</div>

		<div class="form-group row">
			<div class="col-md-4">
				<input type="text" name="name[]" class="form-control" placeholder="属性名称">
			</div>
			<div class="col-md-2">
				<input type="text" name="order[]" class="form-control"  placeholder="排序">
			</div>
		</div>
		@else
			<div class="form-group row">
			<div class="col-md-4">
				<input type="text" name="name" class="form-control" value="{{$property->name}}">
			</div>
			<div class="col-md-2">
				<input type="text" name="order" class="form-control" value="{{ $property->order }}">
			</div>
		</div>
		@method('PUT')
		@endempty
		@csrf
		<div class="form-group">
			<label></label>
			<button class="btn btn-primary ml-2">确定</button>
		</div>
	</form>

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