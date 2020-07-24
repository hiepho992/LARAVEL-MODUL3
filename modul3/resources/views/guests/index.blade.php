@extends('home-guest')
@section('title', 'Danh sách khách hàng')
@section('content')
@notifyCss
     <div class="col-12">
           <div class="row">
               <div class="col-12"><h1>Danh Sách Khách Hàng</h1></div>
               <div class="col-12">
                   @if (Session::has('success'))
                      <p class="text-success">
                         <i class="fa fa-check" aria-hidden="true"></i>{{ Session::get('success') }}
                      </p>
                   @endif
               </div>
          <table class="table table-striped">
          <thead>
          <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên khách hàng</th>
                <th scope="col">Email</th>
                <th scope="col">Thay đổi</th>
                <th></th>
          </tr>
          </thead>
          <tbody>
          @if(count($guests) == 0)
          <tr><td colspan="4">Không có dữ liệu</td></tr>
          @else
                @foreach($guests as $key => $guest)
                <tr>
                      <th scope="row">{{ ++$key }}</th>
                      <td>{{ $guest->name }}</td>
                      <td>{{ $guest->email }}</td>
                      <td><a href="{{ route('guests.edit', $guest->id) }}">sửa</a>|
                        <a href="{{ route('guests.destroy', $guest->id) }}" class="text-danger" onclick="return confirm('Bạn chắc chắn muốn xóa?')">xóa</a>
                    </td>
                </tr>
                @endforeach
          @endif
          </tbody>
          </table>
          <a class="btn btn-primary" href="{{ route('guests.create') }}">Thêm mới</a>
          </div>
      </div>
@include('notify::messages')
@notifyJs
@endsection

