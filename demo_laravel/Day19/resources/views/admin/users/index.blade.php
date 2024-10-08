<h1>Danh sách người dùng</h1>

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

<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Email</th>
            <th>Vai trò</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
