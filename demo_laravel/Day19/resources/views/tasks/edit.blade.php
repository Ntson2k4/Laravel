@section('content')
    <h1>Edit Task</h1>
    @if (session('error'))
        <div style="color: red;">
            {{ session('error') }}
        </div>
    @endif
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
@endsection

    

