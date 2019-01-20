@extends('admin.header')

@section('content')
	@if(session()->has('success'))
		<h3 class="text-success">修改成功，<a href="{{route('config.create')}}">返回</a></h3>
	@else
	<form method="post" action="{{ route('config.store') }}" enctype="multipart/form-data">
		@foreach(config('menu.configs') as $key => $v)
			<div class="form-group col-md-6">
				<label>{{$v['label']}}</label>
				@switch($v['type'])
					@case('text')
						<input type="text" name="{{$v['name']}}" class="form-control" value="{{ !empty($configs[$v['name']])? $configs[$v['name']]:'' }}">
					@break
					@case('textarea')
						<textarea class="form-control" name="{{$v['name']}}">{{!empty($configs[$v['name']])? $configs[$v['name']]: ''}}</textarea>
					@break
					@case('radio')
						@foreach($v['options'] as $k => $value)
							<div class="form-check form-check-inline">
								<input class="form-check-input" name="{{ $v['name'] }}" type="radio" value="{{ $value['option_value'] }}">
								<label class="form-check-label">{{ $value['option_label'] }}</label>
							</div>	
						@endforeach
					@break
					@case('file')
						<div class="custom-file">
							<input type="file" class="custom-file-input" id="customFile" name="{{$v['name']}}">
							<label class="custom-file-label" for="customFile">选择文件</label>
						</div>
						@isset($configs[$v['name']])
							<img class="rounded mt-3" src="{{asset('storage/'.$configs[$v['name']])}}" width="100" height="100">
						@endisset
					@break
				@endswitch
		    </div>
		@endforeach
		@csrf
		<div class="form-group">
			<label></label>
			<button type="submit" class="btn btn-primary">确定</button>
		</div>
	</form>
	@endif
@endsection