<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
	@foreach($menus as $key => $menu)
		@if(!empty($menu['sub']))
			<a class="nav-link" data-toggle="collapse" href="#{{$menu['top']}}">
				<strong>{{$menu['top']}}</strong>
			</a>
			<div @if(!request()->is('admin/'.$menu['prefix'].'/*')) class="collapse" @endif id="{{$menu['top']}}">
				<nav class="nav flex-column">
					@foreach($menu['sub'] as $submenu)
						<a class="nav-link" href="{{$submenu['url']}}">
							{{$submenu['name']}}
						</a>
					@endforeach
				</nav>
			</div>
		@endif
	@endforeach

</div>