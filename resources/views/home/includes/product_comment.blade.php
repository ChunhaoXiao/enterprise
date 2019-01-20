<div class="mt-4 w-75">
<h6>评论或提问</h6>
<form action="{{route('comment.store', ['id' => $product->id])}}" method="POST" id="add_comment">
	@csrf
	<div class="form-group">
		
		<textarea class="form-control" name="content" placeholder="输入内容" rows="5"></textarea>
	</div>
	<div class="form-group">
		<label>
			
		</label>
		<span id="info"></span>
		<span><button class="btn btn-primary float-right" id="comment_submit">提交</button></span>
	</div>
</form>
</div>
<div>

@foreach($product->getComments(Auth::id()) as $c)

	<div class="row">
		<div class="col-md-2">
			{{$c->user->name}}
		</div>
		<div class="col-md-8">
			<p>{{$c->content}}</p>
			<p class="text-muted">{{$c->created_at}} 
				@can('create', App\Models\CommentReply::class)
					@empty($c->reply)
					<a class="text-muted ml-3" data-toggle="collapse" href="#comment_{{ $c->id }}">回复</a>
					@endempty
					<a href="javascript:;" data-url="{{route('comment.destroy', $c)}}" class="far fa-trash-alt text-muted ml-3"></a>
				@endcan
			</p>

			@if($c->reply)
				<dl>
					<dt>企业回复:</dt>
					<dd class="text-primary">
						{{ $c->reply->content }}
					</dd>
				</dl>
				<ul class="list-inline">
					<li class="list-inline-item mr-3">
						<a href="javascript:;" class="far fa-thumbs-up @if($c->myup) text-primary @else text-dark @endif" data-type="up" data-reply_id="{{ $c->reply->id }}">{{ $c->upthumbs_count }}</a>
					</li>
					<li class="list-inline-item">
						
						<a href="javascript:;" class="far fa-thumbs-down @if($c->mydown) text-primary @else text-dark  @endif" data-type="down" data-reply_id="{{ $c->reply->id }}">{{ $c->downthumbs_count }}</a>
					</li>
				</ul>
				<p class="text-muted">{{$c->reply->created_at}}</p>
			@endif

			<div class="collapse mb-3" id="comment_{{$c->id}}">
		  
		   	    <textarea class="form-control" rows="3"></textarea>
		   	    <input type="hidden" name="comment_id" value="{{$c->id}}">
		   	    <p class="mt-2 text-right">
		   	    	<div class="alert alert-success" style="display: none">回复成功</div>
		   	    	<button class="btn btn-success" data-url="{{ route('comment.reply', ['id' => $c->id]) }}">确定</button>
		   	    </p>
		  
		    </div>
		</div>

		
		
	</div>
	@endforeach
</div>

<script type="text/javascript">
	$(".collapse button").on('click', function(event){
		var content = $(this).parents('.collapse').first().find('textarea').val();
		var comment_id = $(this).parents('.collapse').first().find('input[name=comment_id]').val();
		var obj = $(this).parent();

		$.ajax({
			url:"{{ route('comment.reply') }}",
			type:'post',
			data:{content:content, comment_id:comment_id},
			success:function(res)
			{
				obj.find(".alert").show();
				obj.find("button").remove();
				setTimeout(function(){location.reload();},1000);
			}
		});
	});

	$("#add_comment").on('submit', function(event){
		event.preventDefault();
		var url = $(this).attr('action');
		var content = $("textarea[name=content]").val();
		$.ajax({
			url:url,
			data:{content:content},
			type:'post',
			success:function(res){
				$("#info").addClass('alert alert-success').text('评论添加成功');
				$("#comment_submit").hide();
				setTimeout(function(){location.reload();}, 1000);
			},
			error:function(xhr, res)
			{
				if(xhr.status == 401)
				{
					location.href="{{ route('login') }}";
				}
				console.log(xhr.responseJSON.content);
				//console.log(res.message);
				let info = xhr.responseJSON.content;
				errors = info.join(';');
				$("#info").addClass('alert alert-danger w-75').text(errors);
			}
		});
	});

	$(".fa-trash-alt").on('click', function(){
		const url = $(this).data('url');
		bootbox.confirm({ 
		    size: "small",
		    message: "确定删除?", 
		    buttons: {
		        confirm: {
		            label: '确定',
		        },
		        cancel: {
		            label: '取消',
		        }
            },
		    callback: function(result)
		    { 
				if(result)
				{
					$.ajax({
						url:url,
						type:'delete',
						success:function(res)
						{
							location.reload();
						}
					});
				}
		    }
		})
		
	});

	$(".fa-thumbs-up, .fa-thumbs-down").on('click', function(){
		const type = $(this).data('type');
		const reply_id = $(this).data('reply_id');
		var obj = $(this);
		$.ajax({
			url:"{{route('thumbs.store')}}",
			type:'post',
			data:{
				type:type,
				reply_id:reply_id
			},
			success:function(res)
			{
				//console.log(res);
				let value = $(obj).text();
				if(res == '1')
				{
					
					$(obj).text(parseInt(value) + 1);
					$(obj).removeClass('text-dark');
					$(obj).addClass('text-primary');
				}
				else
				{
					$(obj).text(parseInt(value) - 1);
					$(obj).removeClass('text-primary');
					$(obj).addClass('text-dark');
				}
			},
			error:function(xhr)
			{
				if(xhr.status==401)
				{
					location.href="{{ route('login') }}";
				}
			},
			completed:function(e)
			{
				console.log(e.status);
			}
		})
	});
</script>