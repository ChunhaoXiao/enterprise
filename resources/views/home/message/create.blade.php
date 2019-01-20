@extends('home.common')
@section('content')
	<div class="container">
		<div class="row p-2">
			<div class="col-md-2">
			
		    </div>
		    <div class="col-md-7">
		    	@bread <li class="breadcrumb-item active">用户留言</li> @endbread
		    	@if(session()->has('posted'))
		    		<h4 class="align-items-center mt-5">留言成功， 返回<a href="/">首页</a></h4>
		    	@else

		    	<form method="post" action="{{ route('message.store') }}">
		    		<div class="form-group row">
		    			<label class="col-md-2 col-form-label">
		    				姓名
		    			</label>
		    			<div class="col-md-8">
		    				<input type="text" name="name" class="form-control">
		    			</div>
		    			
		    		</div>
		    		<div class="form-group row">
		    			<label class="col-md-2 col-form-label">
		    				手机
		    			</label>
		    			<div class="col-md-8">
		    				<input type="text" name="mobile" class="form-control">
		    			</div>
		    			
		    		</div>

		    		<div class="form-group row">
		    			<label class="col-md-2 col-form-label">
		    				邮箱
		    			</label>
		    			<div class="col-md-8">
		    				<input type="text" name="email" class="form-control">
		    			</div>
		    			
		    		</div>
		    		<div class="form-group row">
		    			<label class="col-md-2 col-form-label">
		    				内容
		    			</label>
		    			<div class="col-md-8">
		    				<textarea name="message" rows="8" class="form-control"></textarea>
		    			</div>
		    			
		    		</div>
		    		@csrf
		    		<div class="form-group row">
		    			<label class="col-md-2"></label>
		    			<div class="col-md-8">
		    				<button class="btn btn-primary">提交</button>
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
			    @endif	
		    </div>
		</div>
		
	</div>
@endsection