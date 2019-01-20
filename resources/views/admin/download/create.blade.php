@extends('admin.header')

@section('content')
	@empty($data)
	<form action="{{route('downloads.store')}}" enctype="multipart/form-data" method="post">
		<div class="form-group col-md-6">
			<label>标题</label>
			<input type="text" name="title" class="form-control">
		</div>
		<div class="form-group col-md-6">
			<div class="custom-file">
              <input type="file" class="custom-file-input" name="file">
               <label class="custom-file-label" for="customFile">选择文件</label>
            </div>
		</div>
		@csrf
		<div class="form-group col-md-6">
			<label></label>
			<button class="btn btn-primary">确定</button>
		</div>
	</form>
	@else
		<form action="{{route('downloads.update', $data)}}" enctype="multipart/form-data" method="post">
		<div class="form-group col-md-6">
			<label>标题</label>
			<input type="text" name="title" class="form-control" value="{{ $data->title }}">
		</div>
		<div class="form-group col-md-6">
			<div class="custom-file">
              <input type="file" class="custom-file-input" name="file">
               <label class="custom-file-label" for="customFile">选择文件</label>
            </div>
		</div>
		@csrf
		@method('PUT')
		<div class="form-group col-md-6">
			<label></label>
			<button class="btn btn-primary">确定</button>
		</div>
	</form>
	@endempty
@endsection