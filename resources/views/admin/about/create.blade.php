@extends('admin.header')

@section('content')
	
	<form method="post" action="{{route('abouts.store')}}" enctype="multipart/form-data">
		<div class="form-group form-row">
			<label class="col-md-1 col-form-label">分类</label>
			<div class="col-md-4">
				<select class="form-control" name="category" id="category">
					@foreach(config('menu.about') as $k => $v)
						<option  value="{{$k}}">{{$v}}</option>
					@endforeach
				</select>
			</div>
		</div>
		
		<div id="about">
			<div class="form-group form-row" id="contents">
				<label class="col-md-1 col-form-label">内容</label>
				<div class="col-md-8">
					<textarea id="content" name="content"></textarea>
				</div>
			</div>
	    </div>

	    <div id="contact" style="display: none">
	    	@foreach(config('menu.contacts') as $k => $v)
	    	<div class="form-group form-row">
	    		<label class="col-md-1 col-form-label">{{$v['name']}}</label>
	    		<div class="col-md-8">
	    		    <input type="{{$v['type']}}" name="{{ $k }}" class="form-control">
	    	    </div>
	    	</div>
	    	@endforeach
	    </div>

		@csrf
		<div class="form-group form-row">
			<label class="col-md-1"></label>
			<div class="col-md-8">
				<button type="submit" class="btn btn-primary">确定</button>
			</div>
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
			$("#category").on('change', function(){
				let val = $(this).val();
				if(val == 'contact')
				{
					$("#about").hide();
					$("#contact").show();
					$("#title").hide();
				}

				else
				{
					$("#about").show();
					$("#contact").hide();
				}
			})

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