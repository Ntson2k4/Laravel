@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<h2>Chỉnh sửa Dự án</h2>

<form action="{{ route('projects.update', $project->id) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="name" value="{{ $project->name }}" placeholder="Tên dự án"> <br><br>
    <textarea name="description" placeholder="Mô tả">{{ $project->description }}</textarea><br>
    
    <button type="submit">Cập nhật dự án</button>
</form>

<a href="{{ route('projects.index') }}">Quay lại danh sách dự án</a>
