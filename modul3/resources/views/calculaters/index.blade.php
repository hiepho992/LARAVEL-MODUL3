@extends('welcome')
@section('content')
    <div class="login">
        <h3>Product Discount Calculator</h3>
        <form action="index" method="post">
            @csrf
            <label for="">Product Description</label>
            <input type="text" name="Description" id="">
            <label for="">List Price</label>
            <input type="number" name="Price" id="">
            <label for="">Discount Percent (%)</label>
            <input type="number" name="Percent" id="">
            <input type="submit" value="Calculator">
        </form>
    </div>
@endsection

