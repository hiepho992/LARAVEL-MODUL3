@extends('welcome')
@section('content')
    @notifyCss
    <div class="container" style="margin-top : 30px">
        <div class="content">
            <div class="title m-b-md">
                Add new product
            </div>
            <form class="text-left" action="{{ route('product.store') }}" method="POST" enctype=multipart/form-data>
                @csrf

                <div class="form-group">
                    <label for="inputTitle">Product name</label>
                    <input type="text" class="form-control" id="inputTitle" name="name" required>
                </div>
                <div class="form-group">
                    <label for="inputTitle">Product price</label>
                    <input type="number" class="form-control" id="inputTitle" name="price" required>
                </div>
                <div class="form-group">
                    <label for="inputContent">Product information</label>
                    <textarea class="form-control" id="inputContent" name="information" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="inputFileName">File Name</label>
                    <input type="text" class="form-control" id="inputFileName" name="inputFileName"
                        placeholder="input filename">
                    <input type="file" class="form-control-file" id="inputFile" name="inputFile">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <hr>
            <a href="">
                < Back</a>
        </div>
    </div>
    <!-- Bootstrap JS -->
    @include('notify::messages')
    @notifyJs
@endsection
