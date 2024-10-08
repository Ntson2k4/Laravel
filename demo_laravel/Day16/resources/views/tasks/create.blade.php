<h1>Create Task</h1>
<form action="{{ route('tasks.store') }}" method="POST">
    @csrf
    <label for="title">Task Title</label>
    <input type="text" name="title" id="title">
    <button type="submit">Create</button>
</form>
<a href="{{ route('tasks.index') }}">Back to Task List</a>
