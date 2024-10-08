<!-- views/auth/register.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký</title>
</head>
<body>
    <h1>Đăng Ký</h1>

    <form action="{{ route('register.post') }}" method="POST">
        @csrf
        <div>
            <label for="name">Tên:</label>
            <input type="text" name="name" id="name" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div>
            <label for="password">Mật Khẩu:</label>
            <input type="password" name="password" id="password" required>
        </div>
        <div>
            <label for="password_confirmation">Xác nhận Mật Khẩu:</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required>
        </div>
        <div>
            <label for="role">Vai trò:</label>
            <select name="role" id="role" required>
                <option value="user">Người Dùng</option>
                <option value="admin">Quản Trị Viên</option>
            </select>
        </div>
        <button type="submit">Đăng Ký</button>
    </form>
</body>
</html>
