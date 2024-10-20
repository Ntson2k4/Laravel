<h1>Edit Task</h1>
@if ($errors->any())
    <div style="color: red;">
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
    <label for="title">Task Title</label>
    <input type="text" name="title" value="{{ $task->title }}">
    <button type="submit">Update</button>
</form>
<a href="{{ route('tasks.index') }}">Back to Task List</a>
