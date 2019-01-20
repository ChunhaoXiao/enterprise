<!DOCTYPE html>
<html>
<head>
	<title>{{$title??''}}-{{config('name')}}</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>

    <style type="text/css">
      body, html{
        height:100%;
      }
    </style>
</head>
<body>
	

    @include('home.includes.navigator', ['menus' => $menus]);

 		<div class="container" style="min-height:80%">
  	    @yield('content')
  	</div>
     
     @include('home.includes.footer')

     <script type="text/javascript">
       $(function(){
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
       })
     </script>
</body>
</html>