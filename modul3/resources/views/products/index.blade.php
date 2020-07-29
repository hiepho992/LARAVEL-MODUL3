@extends('welcome')
@section('content')

    <div class="product">
        @foreach($products as $product)
            <div class="product-image">
                <img src="/storage/images/{{ $product->image }}" alt="" srcset="">
                <p>{{ $product->name }}</p>
                <p> {{ number_format($product->price) }}</p>
                <p><a onclick="addCart({{ $product->id }})" href="javascript:">Thêm giỏ hàng</a>|<a
                        href="{{ route('product.show', $product->id) }}">Chi tiết</a></p>
            </div>

        @endforeach
    </div>
    <a href="{{ route('product.create') }}">Thêm</a>
    <a href="{{ route('carts.index') }}">gio hang</a>

    <script>
        function addCart(id) {
            $.ajax({
                    url: "http://127.0.0.1:8000/carts/cart/" + id ,
                    type: "GET",
                })
                .done(function(response) {
                    alertify.success('Thêm giỏ hàng thành công');
                });
        }

    </script>
@endsection
