<h1>Create Task</h1>
@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('tasks.store') }}" method="POST">
    @csrf
    <label for="title">Task Title</label>
    <input type="text" name="title" id="title">
    <button type="submit">Create</button>
</form>
<a href="{{ route('tasks.index') }}">Back to Task List</a>
