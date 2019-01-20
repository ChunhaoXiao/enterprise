@extends('admin.header')

@section('content')
	<form method="post" enctype="multipart/form-data" @empty($case) action="{{route('cases.store')}}" @else action="{{route('cases.update', $case)}}" @endif>
		<div class="form-group col-md-8">
			<label>标题</label>
			<input type="text" name="title" class="form-control" value="{{$case->title ?? ''}}">
		</div>
		<div class="form-group col-md-8">
			<div class="custom-file">
              <input type="file" class="custom-file-input" name="pictures[]" multiple="multiple">
               <label class="custom-file-label" for="customFile">选择图片</label>
            </div>
            @isset($case->pictures)
            	<ul class="list-inline mt-3">
            		@foreach($case->pictures as $picture)
            		    <li class="list-inline-item">
            		    	<img src="{{asset('storage/'.$picture)}}" width="80" height="80" class="rounded">
            		    	<span class="d-block">
            		    		<button type="button" class="close" aria-label="Close">
								  <span aria-hidden="true">&times;</span>
								</button>
            		    	</span>
            		    	<input type="hidden" name="oldpictures[]" value="{{$picture}}">
            		    </li>
            		@endforeach
            	</ul>
            @endisset
		</div>
		<div class="form-group col-md-8">
			<label>内容</label>
			<textarea class="form-control" name="content">{{$case->content??''}}</textarea>
		</div>
		@csrf
		@isset($case)
			@method('PUT')
		@endisset
		<div class="form-group">
			<label></label>
			<button class="btn btn-primary" type="submit">提交</button>
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

@section('script')
	<script type="text/javascript">
		$(function(){
			$(".close").on('click', function(){
				$(this).parents("li").first().remove();
			});
		})
	</script>
@endsection