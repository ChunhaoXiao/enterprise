@extends('admin.header')

@section('content')
	<dl class="row">
		<dt class="col-md-2">
			姓名
		</dt>
		<dd class="col-md-10">
			{{ $message->name }}
		</dd>


		<dt class="col-md-2">
			电话
		</dt>
		<dd class="col-md-10">
			{{ $message->mobile }}
		</dd>


		<dt class="col-md-2">
			邮箱
		</dt>
		<dd class="col-md-10">
			{{ $message->email }}
		</dd>

		<dt class="col-md-2">
			留言内容
		</dt>
		<dd>
			{{ $message->message }}
		</dd>

	</dl>
@endsection