@extends('welcome')
@section('content')
@notifyCss
    <div class="customer">
        <h1>Danh sách khách hàng</h1>
        <table>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Họ và tên</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($manager as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->phone}}</td>
                    <td>{{$item->email}}</td>
                    <td>
                    <button><a href="/customers/{{ $item->id }}">Xem</a></button> | <button><a href="{{route('customers.edit',$item->id)}}">Sửa</a></button>|
                    <button onclick="return confirm('ban muon xoa')"><a href="{{route('customers.delete',$item->id)}}">Xóa</a></button>

                    </td>
                </tr>
                <tr>
                    <td colspan="5">
                        <a href="/customers/create"></a>
                    </td>
                </tr>
                @empty
                <p>Khong co nhan vien nao</p>
                @endforelse
                <tr>
                    <td colspan="5">
                        <button onclick="show()">Thêm</button>
                    </td>
                </tr>
            </tbody>
        </table>
        <table id="showtable">
            <form action="/customers/store" method="post">
                @csrf
                <tr>
                    <td>Họ và tên</td>
                    <td><input type="text" name="name" id=""></td>
                </tr>
                <tr>
                    <td>Số điện thoại:</td>
                    <td><input type="text" name="phone" id=""></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type="text" name="email" id=""></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" value="Thêm">
                    </td>
                </tr>
            </form>
        </table>
    </div>
    @include('notify::messages')
@notifyJs
@endsection
@if (session('status'))
<div class="alert alert-success">
    {!! session('status') !!}
</div>
@endif
<script>
function show(){
   document.getElementById('showtable').style.display = "block";
}
</script>

