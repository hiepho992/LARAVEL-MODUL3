@extends('welcome')
@section('content')
    <form action="/login" method="post">
    @csrf
    <p>
        <label for="">Email: </label>
        <input type="text" name="email" id="">
    </p>
    <p>
        <label for="">Mật khẩu:</label>
        <input type="text" name="password" id="">
    </p>
    <p><input type="submit" value="Đăng nhập"></p>
    </form>
    @endsection
