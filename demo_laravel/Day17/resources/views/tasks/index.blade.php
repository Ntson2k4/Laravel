<div class="container">
    <h1>Danh Sách Nhiệm Vụ</h1>
    <!-- Form lọc -->
    <form action="{{ route('tasks.index') }}" method="GET">
        <div>
            <label for="title">Tiêu Đề:</label>
            <input type="text" name="title" id="title" value="{{ request('title') }}">
        </div>
        <div>
            <label for="completed">Trạng Thái:</label>
            <select name="completed" id="completed">
                <option value="">-- Tất cả --</option>
                <option value="1" {{ request('completed') == '1' ? 'selected' : '' }}>Hoàn Thành</option>
                <option value="0" {{ request('completed') == '0' ? 'selected' : '' }}>Chưa Hoàn Thành</option>
            </select>
        </div>
        <button type="submit">Lọc</button>
    </form>
    <a href="{{ route('tasks.create') }}" class="btn btn-primary">Tạo Nhiệm Vụ Mới</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tiêu Đề</th>
                <th>Mô Tả</th>
                <th>Hoàn Thành</th>
                <th>Dự Án</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->completed ? 'Có' : 'Không' }}</td>
                    <td>
                        <select disabled>
                            @foreach ($projects as $project)
                                <option value="{{ $project->id }}" {{ $project->id == $task->project_id ? 'selected' : '' }}>
                                    {{ $project->name }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-warning">Chỉnh Sửa</a>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('projects.index') }}">Xem dự án</a>
</div>
