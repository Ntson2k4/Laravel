<form action="{{ route('tasks.store') }}" method="POST">
    @csrf
    <div>
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="{{ old('title') }}">
        @error('title')<div class="error">{{ $message }}</div>@enderror
    </div>
    
    <div>
        <label for="description">Description:</label>
        <textarea name="description" id="description" required>{{ old('description') }}</textarea>
        @error('description')<div class="error">{{ $message }}</div>@enderror
    </div>

    <div>
        <label for="project_id">Project:</label>
        <select name="project_id" id="project_id">
            <option value="">Select a project</option>
            @foreach($projects as $project)
                <option value="{{ $project->id }}" {{ old('project_id') == $project->id ? 'selected' : '' }}>{{ $project->name }}</option>
            @endforeach
        </select>
        @error('project_id')<div class="error">{{ $message }}</div>@enderror
    </div>

    <div>
        <button type="submit">Create Task</button>
    </div>
</form>
