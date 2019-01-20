<nav class="navbar navbar-expand-lg navbar-light bg-light mb-2 border">
	<div class="container">
    <a class="navbar-brand" href="#"><img src="{{asset('storage/'.config('logo'))}}" width="120" height="60"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item @if(request()->path() == '/') active @endif">
	        <a class="nav-link" href="/"> 首页 <span class="sr-only">(current)</span></a>
	      </li>
	      @foreach($menus as $menu)
	      		<li class="nav-item @if(request()->path() == $menu->link) active @endif">
	                <a class="nav-link" href="{{ url($menu->link) }}">{{$menu->name}}</a>
	            </li>
	      @endforeach
	      
	      <!-- <li class="nav-item">
	        <a class="nav-link" href="#">Link</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link disabled" href="#">Disabled</a>
	      </li> -->
	    </ul>
	    <!-- <form class="form-inline my-2 my-lg-0">
	      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
	      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
	    </form> -->
	  </div>

	</div>
</nav>