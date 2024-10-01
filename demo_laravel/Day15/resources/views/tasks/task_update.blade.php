<form action="{{url('tasks/update/'.$task->id)}}" method="POST">
    @method("PATCH")
    @csrf
    <input type="hidden" name="id" value="{{$task->id}}">
    <div>
        <label for="title">Title</label>
        <input type="text" name="title" value="{{$task->title}}" required>
    </div>
    <div>
        <label for="description">Description</label>
        <input type="text" name="description" value="{{$task->description}}" required>
    </div>
    <div>
        <label for="completed">Completed</label>
        <input type="radio" name="completed" value="1" {{ $task->completed == 1 ? 'checked' : '' }} required>Yes
        <input type="radio" name="completed" value="0" {{ $task->completed == 0 ? 'checked' : '' }}>No
    </div>
    <div>
        <button type="submit">Update</button>
    </div>
</form>