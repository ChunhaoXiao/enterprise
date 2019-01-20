@extends('admin.header')
@section('content')
    <form class="" @isset($link) action="{{route('links.update', $link)}}"" @else action="{{route('links.store')}}" @endisset method="post">
        <div class="form-group">
            <label>链接文字</label>
            <input type="text" name="name" value="{{ $link->name?? ''}}" class="form-control">
        </div>
        <div class="form-group">
            <label>链接地址</label>
            <input type="text" name="url" value="{{ $link->url?? ''}}" class="form-control">
        </div>
        <div class="form-group">
            <label>排序</label>
            <input type="text" name="order" value="{{ $link->order??0 }}" class="form-control">
        </div>
        <div class="form-group">
          <label>是否启用</label>
          <div>
          <div class="form-check form-check-inline">
              <input type="radio" name="isshow" value="1" class="form-check-input" @isset($link) {{ $link->is_show? 'checked' : '' }} @else checked @endisset>
              <label for="" class="form-check-label">是</label>
          </div>
          <div class="form-check form-check-inline">
              <input type="radio" name="isshow" value="0" class="form-check-input" @isset($link) {{$link->is_show == 0? 'checked' : ''}} @endisset>
              <label for="" class="form-check-label">否</label>
          </div>
        </div>
          @csrf
          @isset($link)
              @method('PUT')
          @endisset
          <div class="form-group mt-2">
            <label for=""></label>
            <button type="submit" class="btn btn-primary">确定</button>
          </div>
        </div>
      </div>
    </form>
@endsection
