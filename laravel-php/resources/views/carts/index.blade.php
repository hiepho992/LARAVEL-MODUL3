@extends('welcome')
@section('content')


    {{-- @php
            Session::forget('cart');
            @endphp --}}
    @if(!empty(Session::get('cart')))
        <div class="container" id="cart-div">
            <table class="table" id="tableLoad">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Số lượng</th>
                        {{-- <th scope="col">Sua</th> --}}
                        <th scope="col">Thành tiền</th>
                        <th scope="col">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($carts as $key => $value)
                        <tr id="tr-{{ $value['id'] }}">

                            <td>{{ $key += 1 }}</td>

                            <td>{{ $value['name'] }}</td>

                            <td>
                                <img src="/storage/images/{{ $value['image'] }}" alt="image" style="height: 100px; width:100px">
                            </td>

                            <td>{{ number_format($value['price']) }} </td>

                            <td>
                                <input type="number" name="qty" id="qty-{{ $value['id'] }}" value="{{ $qty[] = $value['qty'] }}" class="input" onchange="editQty({{ $value['id'] }})">
                            </td>

                            <td id="amount-{{ $value['id'] }}">{{ number_format($sum[] = $value['price'] * $value['qty']) }}</td>

                            <td class="delete-btn">
                                <button data-id="{{ $value['id'] }}" class="btn btn-danger">
                                    <i class="fas fa-times"></i>
                                </button>
                            </td>

                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="4">
                            <p>Tổng</p>
                        </td>
                        <td>
                            <p id="totalQty">{{ number_format(array_sum($qty)) }}</p>
                        </td>
                        <td>
                            <p id="sum">{{ number_format(array_sum($sum)) }}</p>
                        </td>

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
    <script>
        $('#cart-div').on("click", ".delete-btn button", function() {
            let id = $(this).data('id');
            $.ajax({
                    url: "http://127.0.0.1:8000/carts/deleteCart/" + id,
                    type: "GET",
                })
                .done(function(data) {
                    alertify.success('Xóa thành công');
                    $("#tableLoad").load(" #tableLoad");

                });
        });

        function editQty(id) {
            let qty = $("#qty-" + id).val();
            $.ajax({
                url: "http://127.0.0.1:8000/carts/edit/" + id + "/"+ qty,
                type: "GET",
                dataType: 'json',

            }).done(function(data) {
                $('#qty-' + id).text(data[0]);
                $('#amount-'+id).text(Number(data[1]).toLocaleString('en'));
                $('#totalQty').text(Number(data[3]).toLocaleString('en'));
                $('#sum').text(Number(data[2]).toLocaleString('en'));
                alertify.success('Sửa thành công');
            });

        }

    </script>
@endsection
