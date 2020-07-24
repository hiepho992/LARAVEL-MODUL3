@extends('welcome')
@section('content')
<div>
    <form action="/services" method="post">
    @csrf
    <label for=""></label>
    <input type="text" name="name" id="">
    @error('name')
    <p style="color: red">{{$message}}</p>

    @enderror
    <input type="submit" value="Add Service">
    </form>
    @foreach ($service as $items)
    <p>
        {{$items->name}}
    </p>
    @endforeach
</div>
@endsection
