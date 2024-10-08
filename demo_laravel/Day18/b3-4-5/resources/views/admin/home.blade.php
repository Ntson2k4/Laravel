<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Quản Trị</title>
</head>
<body>
    <h1>Chào mừng đến với trang quản trị</h1>
    <p><a href="{{ route('user.edit') }}">Cập nhật thông tin người dùng</a></p>
    @if (Auth::check() && Auth::user()->role === 'admin')
        <h2>Chào mừng Admin!</h2>
        <p>Bạn có quyền quản trị.</p>
        <p>Bạn có thể quản lý hệ thống ở đây.</p>
    @else
        <h2>Chào mừng User!</h2>
        <p>Bạn không có quyền quản trị.</p>
    @endif

    <form action="{{ route('admin.logout') }}" method="POST">
        @csrf
        <button type="submit">Đăng Xuất</button>
    </form>
</body>
</html>
