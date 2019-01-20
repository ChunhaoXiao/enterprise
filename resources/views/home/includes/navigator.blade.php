<nav class="navbar navbar-expand-lg navbar-light bg-light mb-2 border">
	<div class="container">
    <a class="navbar-brand" href="/"><img src="{{asset('storage/'.config('logo'))}}" width="120" height="60"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item @if(request()->path() == '/') active @endif">
	        <a class="nav-link" href="/"> 首页 <span class="sr-only">(current)</span></a>
	      </li>
	      @foreach($menus as $menu)
	      		<li class="nav-item @if(request()->is(substr($menu->link ,0 ,-1).'*')) active @endif">
	                <a class="nav-link" href="{{ url($menu->link) }}">{{$menu->name}}</a>
	            </li>
	      @endforeach
	    </ul>
			
	    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">登录</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">注册</a>
                                @endif
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        注销登录
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>


                            </li>
                            @if(Auth::user()->notifications()->exists())
                            <li>
                                <a href="{{route('notifications.index')}}" class="badge badge-pill @if(Auth::user()->unreadNotifications()->exists()) badge-danger @else badge-secondary @endif">提醒</a>
                            </li>
                            @endif
                        @endguest
                    </ul>
	  </div>

	</div>
</nav>