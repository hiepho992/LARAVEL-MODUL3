<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>discount</title>
    <style>
        form{
            display: flex;
            flex-direction: column;
        }
        form>input{
            width: 300px;
            height: 25px;
           
        }
        form>input, form>label, h3{
            margin: 5px;
        }
    </style>
</head>
<body>
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
</body>
</html>