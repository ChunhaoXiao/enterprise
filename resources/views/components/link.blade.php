<div class="mt-3 border p-2" style="width: 100%">
	<p class="mb-1">友情链接</p>
	@foreach($links as $link)
		<div class="d-inline p-1"><a class="card-link text-dark" href="http://{{$link->url}}">{{ $link->name }}</a></div>
	@endforeach
</div>
