<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Task</title>
</head>
<body>
    <h1>Create Task</h1>
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Task Name</label>
            <input type="text" name="name" id="name" required>
        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description"></textarea>
        </div>

         <input type="hidden" name="user_id" value="{{ Auth::id() }}">
        <button type="submit">Create Task</button>
        <a href="{{ route('tasks.index') }}">Back</a>
    </form>
</body>
</html>
