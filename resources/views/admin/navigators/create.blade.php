@extends('admin.header')

@section('content')
	<form method="post"  @isset($navigator) action="{{route('navigators.update', $navigator)}}" @else action="{{route('navigators.store')}}"  @endisset>
		<div class="form-group col-md-6">
			<label>名称</label>
			<input type="text" name="name" class="form-control" value="{{ $navigator->name?? '' }}">
		</div>
		<div class="form-group col-md-6">
			<label>连接地址</label>
			<input type="text" name="link" class="form-control" value="{{ $navigator->link?? '' }}">
		</div>
		<div class="form-group col-md-6">
			<label>顺序</label>
			<input type="text" name="order_num" class="form-control" value="{{ $navigator->order_num?? 0}}">
		</div>
		<div class="form-group col-md-6">
			<label>是否启用:</label>
			<div>
				<div class="form-check form-check-inline">

					<input class="form-check-input" type="radio" name="enabled"  value="1" @isset($navigator) {{ $navigator->enabled == 1? 'checked' : ''}} @else checked @endisset>
					<label class="form-check-label">启用</label>
				</div>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="enabled" value="0" @isset($navigator) {{ $navigator->enabled == 0? 'checked' : ''}} @endisset>
					<label class="form-check-label">禁用</label>
				</div>
		    </div>
		</div>
		@isset($navigator)
			@method('PUT')
		@endisset
		@csrf
		<div class="form-group">
			<label></label>
			<button class="btn btn-primary">确定</button>
		</div>
	</form>
	

	@if($errors->any())
		<div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
	@endif
@endsection