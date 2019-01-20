@extends('admin.header')

@section('content')
	<table class="table table-borderless table-hover">
		<thead>
			<th>id</th>
			<th>名字</th>
			<th>手机</th>
			<th>邮件</th>
			<th>ip地址</th>
			<th>留言内容</th>
			<th></th>
		</thead>
		<tbody>
			
			@foreach($messages as $message)
			<tr>
				<td> {{ $message->id }}@unless($message->is_read) <i class="fas fa-envelope"></i> @endunless</td>
				<td>{{ $message->name }}</td>
				<td>{{ $message->mobile }}</td>
				<td>{{ $message->email }}</td>
				<td>{{ $message->ip?? '' }}</td>
				<td><a data-toggle="popover" data-placement="bottom" data-container="body" data-content="{{ $message->message }}">{{ str_limit($message->message, 30) }}</a></td>
				<td><a href="javascript:;"  data-url="{{route('messages.show', $message)}}" data-toggle="modal" data-target="#message_show">查看</a></td>
			</tr>	
			@endforeach
		    
		</tbody>
	</table>
	<p class="paginate">{{ $messages->links() }}</p>

	<!--modal-->
	<div class="modal fade" id="message_show" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">留言内容</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form>
	          <div class="form-group row">
	            <label class="col-md-2">姓名</label>
	            <div class="col-md-6" id="name">
	            
	            </div>
	         
	          </div>

	          <div class="form-group row">
	            <label class="col-md-2">电话</label>
	            <div class="col-md-6" id="mobile">
	            	
	            </div>
	          </div>
	          <div class="form-group row">
	            <label class="col-md-2">email</label>
	            <div class="col-md-6" id="email">
	            	
	            </div>
	          </div>

	          <div class="form-group row">
	            <label class="col-md-2">内容</label>
	            <div class="col-md-10" id="message_content">
	            	
	            </div>
	          </div>
	        </form>

	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
	        <!-- <button type="button" class="btn btn-primary">Send message</button> -->
	      </div>
	    </div>
	  </div>
    </div>
<!--/modal-->
<script type="text/javascript">
	$(function(){
		$("#message_show").on('show.bs.modal', function(event){
			//console.log(event.relatedTarget);
			var url = $(event.relatedTarget).data('url');
			$.ajax({
				url:url,
				type:'get',
				success:function(res){
					$("#name").text(res.name);
					$("#email").text(res.email);
					$("#mobile").text(res.mobile);
					$("#message_content").text(res.message);
				}
			});
		});
	});
</script>
@endsection