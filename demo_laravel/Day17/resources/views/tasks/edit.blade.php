<form action="{{route('tasks.update',$task->id)}}" method="POST">
    @csrf
    @method('PUT')
    <input type="hidden" name="id">Id

    <label for="title" value="{{$task->id}}">Tiêu đề</label>
    <input type="text" name="title" value="{{$task->title}}"><br>

    <label for="description">Mô tả</label>
    <input type="text" name="description" value="{{$task->description}}"><br>

    <label for="completed">Completed</label>
    <input type="radio" name="completed" value="1" {{ $task->completed == 1 ? 'checked' : '' }} required>Yes
    <input type="radio" name="completed" value="0" {{ $task->completed == 0 ? 'checked' : '' }}>No <br>

    <label for="project_id">Id project</label>
    <input type="number" name="project_id" value="{{$task->project_id}}"><br>

    <button>Sửa</button>
</form>