@extends('welcome');
@section('content')
    <div class="main-content">
        <h3>Ứng dụng xem giờ hiện tại của các thành phố trên thế giới</h3>
        <form action="index" method="post">
            @csrf
            <label for="select-city"></label>
            <select name="select-city" id="select-city">
                <option value="America/Chihuahua">Chihuahua, Mexico</option>
                <option value="America/Costa_Rica">Costa Rica</option>
                <option value="America/Havana">La Habana, Cuba</option>
                <option value="Asia/Hong_Kong">Hồng Kông</option>
                <option value="Asia/Ho_Chi_Minh">Hồ Chí Minh, Việt Nam</option>
            </select>
            <input type="submit">
        </form>
        <p>{{$result?? ''}}</p>
    </div>
@endsection



