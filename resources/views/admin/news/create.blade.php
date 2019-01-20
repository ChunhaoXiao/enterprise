@extends('admin.header')

@section('content')
	<form method="post" @isset($news) action="{{ route('news.update', $news)}}" @else action="{{ route('news.store')}} @endisset">
		<div class="form-group">
			<label>
				标题
			</label>
			<input type="text" name="title" class="form-control" name="title" value="{{ $news->title ?? ''}}">
		</div>
		<div class="form-group">
			<label>
				分类
			</label>
			<select class="form-control" name="category">
				@foreach(config('menu.news') as $k => $v)
				    <option value="{{$k}}" @isset($news) {{ $news->category == $k? 'selected': '' }} @endisset>{{$v}}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<label>
				内容
			</label>
			<textarea id="content" name="content">{{$news->content?? ''}}</textarea>
		</div>
		@csrf
		@isset($news)
			@method('PUT')
		@endisset
		<div class="form-group">
			<label>
				
			</label>
			<button class="btn btn-primary" type="submit">确定</button>
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
		$(function(){
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

		    function uploadImage(image, editor) {
			    var data = new FormData();
			    data.append("image", image);
			    $.ajax({
			        url: "{{route('image.upload')}}",
			        cache: false,
			        contentType: false,
			        processData: false,
			        data: data,
			        type: "post",
			        success: function(url) {
			            console.log(url);
			            var image = $('<img>').attr('src', url);
                        $(editor).summernote("insertNode", image[0]);
			  
			        },
			        error: function(data) {
			            console.log(data);
			        }
			    });
			}
		});
      
    </script>
@endsection