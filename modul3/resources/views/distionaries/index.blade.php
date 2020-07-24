@extends('welcome')
@section('content')

    <h3>Từ điển</h3>
    <form action="index" method="post">
    @csrf
        <label for=""></label>
        <input type="text" name="text" id="" placeholder="Nhập từ muốn tìm">
        <select name="choose" id="">
            <option value="Việt-Anh">Việt-Anh</option>
            <option value="Anh-Việt">Anh-Việt</option>
        </select>
        <input type="submit" value="Dịch">
    </form>
    <p>{{$result??""}}</p>
@endsection
