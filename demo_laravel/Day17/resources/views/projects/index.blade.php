<a href="{{route('projects.create')}}">Thêm dự án</a><br>
<a href="{{route('tasks.index')}}">Thêm nhiệm vụ vào dự án</a>
@foreach ($projects as $project)
    <h2>{{ $project->name }}</h2>
    <p>{{ $project->description }}</p>
    <ul>
        @foreach ($project->tasks as $task)
            <li>{{ $task->title }} - {{ $task->completed ? 'Hoàn thành' : 'Chưa hoàn thành' }}</li>
        @endforeach
    </ul>
    <a href="{{ route('projects.edit', $project->id) }}">Chỉnh sửa dự án</a>
    <form action="{{ route('projects.destroy', $project->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Xóa dự án</button>
    </form>
@endforeach
