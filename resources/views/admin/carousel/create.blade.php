@extends('admin.header')

@section('content')
	@isset($carousel)
	<form method="post" enctype="multipart/form-data" action="{{route('carousels.update', $carousel)}}">
		<div class="form-group col-md-5">
			<label>上传图片</label>
			<div class="custom-file">
			  <input type="file" class="custom-file-input" lang="zh"  name="picture">
			  <label class="custom-file-label" for="customFileLang">选择图片</label>
			</div>
			<div>
				<img src="{{asset('storage/'.$carousel->path)}}" width="50" height="50" class="mt-2">
			</div>
		</div>

		<div class="form-group col-md-5">
			<label>链接</label>
			<input type="text" name="link" class="form-control" value="{{$carousel->link}}">
		</div>
		<div class="form-group col-md-5">
			<label>排序</label>
			<input type="text" name="order" class="form-control" value="{{$carousel->order}}">
		</div>
		@csrf
		@method('PUT')
		<div class="form-group">
			<label></label>
			<button class="btn btn-primary">确定</button>
		</div>
	</form>
	@else
		<form method="post" enctype="multipart/form-data" action="{{route('carousels.store')}}">
		<div class="form-group col-md-5">
			<label>上传图片</label>
			<div class="custom-file">
			  <input type="file" class="custom-file-input" lang="zh"  name="picture">
			  <label class="custom-file-label" for="customFileLang">选择图片</label>
			</div>
		</div>
		<div class="form-group col-md-5">
			<label>链接</label>
			<input type="text" name="link" class="form-control">
		</div>
		<div class="form-group col-md-5">
			<label>排序</label>
			<input type="text" name="order" class="form-control">
		</div>
		@csrf
		<div class="form-group">
			<label></label>
			<button class="btn btn-primary">确定</button>
		</div>
	</form>
	@endif
@endsection
