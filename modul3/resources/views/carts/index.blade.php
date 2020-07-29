@extends('welcome')
@section('content')


    {{-- @php
    Session::forget('cart');
    @endphp --}}
    @if(!empty(Session::get('cart')))
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Thành tiền</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($carts as $key => $value)
                        <tr>
                            <td>{{ $key += 1 }}</td>
                            <td>{{ $value['name'] }}</td>
                            <td><img src="/storage/images/{{ $value['image'] }}" alt="image" style="height: 100px; width:100px"></td>
                            <td>{{ number_format($value['price']) }} </td>

                            <form action="">
                                @csrf
                                <td><input type="number" name="qty" id="" value="{{ $value['qty'] }}"></td>
                            </form>

                            <td>{{ number_format($value['price'] * $value['qty']) }}</td>
                            <td>
                                <a href="{{ route('carts.deleteCart', $value['id']) }}" onclick="return alertify.confirm(...)">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                        <path fill-rule="evenodd"
                                            d="M5.72 5.72a.75.75 0 011.06 0L12 10.94l5.22-5.22a.75.75 0 111.06 1.06L13.06 12l5.22 5.22a.75.75 0 11-1.06 1.06L12 13.06l-5.22 5.22a.75.75 0 01-1.06-1.06L10.94 12 5.72 6.78a.75.75 0 010-1.06z">
                                        </path>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td>
                            <button onclick="window.history.go(-1)">Quay lại</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    @else
        <div>
            <p class="text-center">Chưa có giỏ hàng</p>
            <button onclick="window.history.go(-1)">Quay lại</button>
        </div>
    @endif
@endsection

