@extends('welcome')
@section('content')
<div class="container-show">
    <div class="row1">
        <img src="/storage/images/{{ $products->image }}" alt="" srcset="">
    </div>
    <div  class="row1">
        <p>{{ $products->info }}</p>
    </div>
</div>

@endsection



