<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <form action="/login" method="post">
    @csrf
    <p>
        <label for="">Email: </label>
        <input type="text" name="email" id="">
    </p>
    <p>
        <label for="">Mật khẩu:</label>
        <input type="text" name="password" id="">
    </p>
    <p><input type="submit" value="Đăng nhập"></p>
    </form>
</body>
</html>