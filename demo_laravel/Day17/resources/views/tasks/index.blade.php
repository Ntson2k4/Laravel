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
        
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tiêu Đề</th>
                    <th>Mô Tả</th>
                    <th>Hoàn Thành</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $task->id }}</td>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->description }}</td>
                        <td>{{ $task->completed ? 'Có' : 'Không' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
