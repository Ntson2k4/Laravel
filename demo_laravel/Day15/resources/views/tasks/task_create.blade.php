<form method="post" action="{{url('/tasks')}}">
    @csrf
    <div>
        <label for="title">Title</label>
        <input type="text" name="title" id="title" required>
    </div>
    <div>
        <label for="description">Description</label>
        <input type="text" name="description" id="description" required>
    </div>
    <div>
        <label for="completed">Completed</label>
        <input type="radio" name="completed" value="1" required>Yes
        <input type="radio" name="completed" value="0">No
    </div>
    <div>
        <button type="submit">Add</button>
    </div>
</form>