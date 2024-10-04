<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập Nhật Thông Tin</title>
</head>
<body>
    <h2>Cập nhật thông tin</h2>

    @if (session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <form action="{{ route('user.update') }}" method="POST">
        @csrf
        @method('PUT')
        
        <label for="name">Tên:</label>
        <input type="text" name="name" id="name" value="{{ old('name', Auth::user()->name) }}" required><br>
        @error('name')
            <div style="color: red;">{{ $message }}</div>
        @enderror
        
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ old('email', Auth::user()->email) }}" required><br>
        @error('email')
            <div style="color: red;">{{ $message }}</div>
        @enderror

        <label for="password">Mật Khẩu:</label>
        <input type="password" name="password" id="password"><br>
        @error('password')
            <div style="color: red;">{{ $message }}</div>
        @enderror

        <label for="password_confirmation">Xác thực mật khẩu:</label>
        <input type="password" name="password_confirmation" id="password_confirmation"><br>

        <label for="role">Vai trò:</label>
        <select name="role" id="role" required>
            <option value="user" {{ Auth::user()->role == 'user' ? 'selected' : '' }}>Người Dùng</option>
            <option value="admin" {{ Auth::user()->role == 'admin' ? 'selected' : '' }}>Quản Trị Viên</option>
        </select><br>
        @error('role')
            <div style="color: red;">{{ $message }}</div>
        @enderror

        <button type="submit">Cập Nhật</button>
    </form>
</body>
</html>
