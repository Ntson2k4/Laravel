@if (session('success'))
    <p>{{ session('success') }}</p>
@endif

<form action="{{route('tasks.store')}}" method="POST">
    @csrf
    <label for="title">Title</label>
    <input type="text" name="title" id="title"><br>
    @error('title')
        <div>{{$message}}</div>
    @enderror
    <label for="description">Description</label>
    <input type="description" name="description" id="description"><br>
    @error('description')
        <div>{{$message}}</div>
    @enderror
    <label for="completed">Completed</label>
    <select name="completed" id="completed">
        <option value="0" {{ old('completed') == '0' ? 'selected' : '' }}>Chưa hoàn thành</option>
        <option value="1" {{ old('completed') == '1' ? 'selected' : '' }}>Đã hoàn thành</option>
    </select><br>
    @error('completed')
        <div>{{ $message }}</div>
    @enderror
    <button>Thêm</button>
</form>

<!-- Danh sách nhiệm vụ -->
<h2>Danh sách nhiệm vụ</h2>
    @if($tasks->isEmpty())
        <p>Chưa có nhiệm vụ nào.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Tiêu đề</th>
                    <th>Mô tả</th>
                    <th>Hoàn thành</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->description }}</td>
                        <td>{{ $task->completed ? 'Đã hoàn thành' : 'Chưa hoàn thành' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif