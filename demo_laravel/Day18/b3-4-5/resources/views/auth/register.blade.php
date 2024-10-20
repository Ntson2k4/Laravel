<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký</title>
</head>
<body>
    <h1>Đăng Ký</h1>

    @if (session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register.post') }}" method="POST">
        @csrf
        <div>
            <label for="name">Tên:</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required>
            @error('name')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required>
            @error('email')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="password">Mật Khẩu:</label>
            <input type="password" name="password" id="password" required>
            @error('password')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="password_confirmation">Xác nhận Mật Khẩu:</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required>
        </div>
        <div>
            <label for="role">Vai trò:</label>
            <select name="role" id="role" required>
                <option value="user">user</option>
                <option value="admin">admin</option>
            </select>
        </div>
        <button type="submit">Đăng Ký</button>
    </form>
</body>
</html>
