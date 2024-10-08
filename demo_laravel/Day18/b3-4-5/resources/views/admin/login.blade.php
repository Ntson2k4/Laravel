<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
</head>
<body>
    <h1>Đăng Nhập</h1>

    @if (session('error'))
        <div style="color: red;">
            {{ session('error') }}
        </div>
    @endif

    @if (session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('login.post') }}" method="POST">
        @csrf
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div>
            <label for="password">Mật Khẩu:</label>
            <input type="password" name="password" id="password" required>
        </div>
        <button type="submit">Đăng Nhập</button>
    </form>
    <p>Chưa có tài khoản? <a href="{{ route('register') }}">Đăng ký ngay</a></p>
</body>
</html>
