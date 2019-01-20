<!DOCTYPE html>
<html>
<head>
	<title>后台管理</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.js"></script>
    
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    	<a href="#" class="navbar-brand">管理中心</a>
    	<button class="navbar-toggler" data-toggle="collapse" data-target="#menu">
    		<span class="navbar-collapse-icon"></span>
    	</button>
    	<div class="navbar-collapse navbar-collapse" id="menu">
    		<ul class="navbar-nav ml-auto">
    			<!-- <li class="nav-item">
    				<a class="nav-link">nav-item1</a>
    			</li>
    			<li class="nav-item">
    				<a class="nav-link">nav-item1</a>
    			</li>
    			<li class="nav-item">
    				<a class="nav-link">nav-item1</a>
    			</li> -->
    			<li class="nav-item  dropdown">
    				<a href="#" class="nav-link dropdown-toggle" id="usermenu" data-toggle="dropdown">你好 admin</a>
    				<div class="dropdown-menu" aria-labelledby="usermenu">
                        <a href="{{route('passwordchange.show')}}" class="dropdown-item">修改密码</a>
                        <a href="javascript:;" id="logout" class="dropdown-item">退出</a>
                    </div>
    			</li>
    		</ul>
    	</div>
    </nav>
    <div class="container-fluid mt-1">
    	<div class="row">
    		<div class="col-md-2"><!--左侧菜单-->
    			@include('admin.menu', ['menus' => config('menu.menus')])
    		</div>
    		<div class="col-md-9">
                <h3 class="mb-4"></h3>
                
    			@yield('content')
    		</div>
    	</div>
    	<div class="row"><!--底部内容-->
    		
    	</div>
    </div>
    <script type="text/javascript">
        $(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('[data-toggle="popover"]').popover()

            $(".fa-trash-alt").on('click', 
                function()
                {
                    const url = $(this).data('url');
                   //bootbox.confirm();
                   bootbox.confirm({
                    title:'删除',
                    message:'要删除吗？',
                    buttons: {
                        cancel: {
                            label: '<i class="fa fa-times"></i> 取消'
                        },
                        confirm: {
                            label: '<i class="fa fa-check"></i> 确定'
                        }
                    },
                    callback:function(result)
                    {
                        if(result)
                        {
                            $.ajax({
                            url:url,
                            type:'delete',
                            success:function(res)
                            {
                                location.reload();
                            },
                            error:function(res)
                            {
                                console.log(res.responseJSON);
                                bootbox.alert(res.responseJSON);
                            }
                            });
                        }
                    }

                    });

                   
                })   
            //     function(){
            //     const url = $(this).data('url');
            //     $.ajax({
            //         url:url,
            //         type:'delete',
            //         success:function(res)
            //         {
                        
            //             location.reload();
            //         },

            //         error:function(res)
            //         {

            //         }
            //     });
            // });
                
          //)  

          $("#logout").on('click', function(){
                     
                       $.ajax({
                            url: "{{route('admin.logout')}}",
                            type:"DELETE",
                            success:function(res)
                            {
                                location.reload();
                            }
                       });
                   });
        });
    </script>

    @yield('script')
</body>
</html>