<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Dashboard</h1>
    <p>Chào mừng bạn đến với trang Dashboard!</p>

    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
        @csrf
        <button type="submit">Đăng Xuất</button>
    </form>
</body>
</html>
