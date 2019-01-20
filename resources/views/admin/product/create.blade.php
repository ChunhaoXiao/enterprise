@extends('admin.header')

@section('content')
	
	<form method="post" action="{{route('products.store')}}" enctype="multipart/form-data">
		<div class="form-group col-md-6">
			<label>产品名称</label>
			<input type="text" name="name" class="form-control">
		</div>
		<div class="form-group col-md-6">
			<label>分类</label>
			 <select class="form-control" name="category_id">
			 	<option value="">请选择</option>
			 	@foreach($all_categories as $cate)
			 		<option value="{{$cate->id}}">{{$cate->name}}</option>
			 	@endforeach
			 </select>
		</div>
		@foreach($all_properties as $property)
			<div class="form-group col-md-5">
				<label>{{$property->name}}</label>
			    <input type="text" name="property[{{$property->id}}]" class="form-control">
			</div>
		@endforeach
		<div class="form-group col-md-8">
			<label>描述</label>
			<textarea class="form-control" name="description"  id="summernote"></textarea>
		</div>

		<div class="form-group col-md-5">
			<div class="custom-file">
              <input type="file" class="custom-file-input" name="pictures[]" multiple="multiple">
               <label class="custom-file-label" for="customFile">选择图片</label>
            </div>
	    </div>

		@csrf
		<div class="form-group">
			<label></label>
			<button class="btn btn-primary ml-2">
				提交
			</button>
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

    <script>
      $('#summernote').summernote({
        placeholder: 'Hello bootstrap 4',
        tabsize: 2,
        height: 300
      });
    </script>
@endsection