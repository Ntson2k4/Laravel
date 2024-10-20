@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('tasks.update', $task->id) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="hidden" name="id" value="{{ $task->id }}">

    <div>
        <label for="title">Tiêu đề</label>
        <input type="text" name="title" id="title" value="{{ old('title', $task->title) }}" required>
        @error('title')
            <div class="error">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="description">Mô tả</label>
        <input type="text" name="description" id="description" value="{{ old('description', $task->description) }}" required>
        @error('description')
            <div class="error">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label>Hoàn thành</label><br>
        <input type="radio" name="completed" value="1" {{ $task->completed == 1 ? 'checked' : '' }} required> Có
        <input type="radio" name="completed" value="0" {{ $task->completed == 0 ? 'checked' : '' }}> Không
    </div>

    <div>
        <label for="project_id">Dự án</label>
        <select name="project_id" id="project_id" required>
            @foreach ($projects as $project)
                <option value="{{ $project->id }}" {{ $project->id == $task->project_id ? 'selected' : '' }}>
                    {{ $project->name }}
                </option>
            @endforeach
        </select>
        @error('project_id')
            <div class="error">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <button type="submit">Sửa</button>
    </div>
</form>
