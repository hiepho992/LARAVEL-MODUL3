<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
</body>
</html>