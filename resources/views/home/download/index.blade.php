@extends('home.common')
@section('content')
	
	<div class="row">
		<div class="col-md-2">
			@category
			@endcategory
		</div>
		<div class="col-md-10">
			@component('components.breadcrumb')

	        @endcomponent
			<table class="table table-hover table-bordered">
				<thead class="table-primary">
					<th>名称</th>
					<th>创建时间</th>
					<th>下载次数</th>
					<th></th>
					<th></th>
				</thead>
				<tbody>
					@foreach($datas as $data)
						<tr>
							<td>{{ $data->title }}</td>
							<td>{{ $data->created_at }}</td>
							<td>{{ $data->times }}</td>
							<td><a class="card-link text-dark" href="{{route('download.show', ['id' =>$data->id, 'action' => 'open'])}}">打开</a> </td>
							<td><a class="card-link text-dark" href="{{route('download.show', ['id' => $data->id, 'action' => 'download'])}}">下载</a></td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	
@endsection