@extends('admin.header')

@section('content')
	<form method="post" action="{{route('abouts.update', $about)}}" enctype="multipart/form-data">
		<div class="form-group form-row">
			<label class="col-md-1 col-form-label">分类</label>
			<div class="col-md-4">
				<select class="form-control" name="category" id="category">
					@foreach(config('menu.about') as $k => $v)
						@if($k == $about->category)
							<option value="{{$k}}">{{$v}}</option>
						@endif
					@endforeach
				</select>
			</div>
		</div>
		
		@if($about->category == 'contact')
			@foreach(config('menu.contacts') as $k => $v)
			<div class="form-group form-row">
	    		<label class="col-md-1 col-form-label">{{$v['name']}}</label>
	    		@if($v['type'] == 'text')
	    		<div class="col-md-8">
	    		    <input type="text" name="{{$k}}" class="form-control" value="{{$about->content[$k]}}">
	    	    </div>
	    	    @elseif($v['type'] == 'file')
		    	    <div class="col-md-8">
		    		    <input type="file" name="{{$k}}" class="form-control">
		    	    </div>
		    	    @if($about->content[$k])
		    	    	<div class="col-md-10 offset-md-1 mt-2">
		    	    		<img src="{{ asset('storage/'.$about->content[$k]) }}" width="50" height="50">
		    	    	</div>
		    	    @endif
	    	    @endif
	    	</div>
	    	@endforeach
		@else
			<div id="about">
				<div class="form-group form-row" id="contents">
					<label class="col-md-1 col-form-label">内容</label>
					<div class="col-md-8">
						<textarea id="content" name="content">{{ $about->content}}</textarea>
					</div>
				</div>
	        </div>

		@endif
		@csrf
		@method('PUT')
		<div class="form-group form-row">
			<label class="col-md-1"></label>
			<div class="col-md-8">
				<button type="submit" class="btn btn-primary">确定</button>
			</div>
		</div>
	</form>	

	<script>	
	$('#content').summernote({
	    placeholder: '内容',
	    tabsize: 2,
	    height: 300,
			callbacks: {
			onImageUpload: function(image) {
				editor = $(this);
				uploadImage(image[0], editor);
			}
		}
	});
	</script>
@endsection