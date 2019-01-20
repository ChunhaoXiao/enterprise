@extends('admin.header')
@section('content')
    <p><a class="btn btn-primary" href="{{route('links.create')}}">添加</a></p>
    <table class="table table-bordered">
        <thead>
           <th>链接文字</th>
           <th>链接地址</th>
           <th>排序</th>
           <th>是否启用</th>
           <th>操作</th>
        </thead>
        <tbody>
          @foreach($links as $link)
            <tr>
              <td>{{$link->name}}</td>
              <td>{{ $link->url }}</td>
              <td>{{ $link->order }}</td>
              <td>
                {{$link->is_show ? '显示' :'不显示'}}
              </td>
              <td>
                <a href="{{route('links.edit', $link)}}" class="far fa-edit mr-3 text-muted"></a> <a class="far fa-trash-alt text-muted" href="javascript:;" data-url="{{route('links.destroy', $link)}}" ></a>
              </td>
            </tr>
          @endforeach
        </tbody>
    </table>
@endsection
