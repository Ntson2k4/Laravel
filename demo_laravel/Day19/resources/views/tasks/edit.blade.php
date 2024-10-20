@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<h1>Edit Task</h1>
<form action="{{ route('tasks.update', $task) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Task Name</label>
            <input type="text" name="name" id="name" value="{{ $task->name }}" required>
        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description">{{ $task->description }}</textarea>
        </div>
        <button type="submit">Update Task</button>
        <a href="{{ route('tasks.index') }}">Back</a>
    </form>

    

