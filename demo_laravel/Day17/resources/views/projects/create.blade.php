<form action="{{ route('projects.store') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Tên dự án"><br>
    <textarea name="description" placeholder="Mô tả"></textarea><br>
    <button type="submit">Tạo dự án</button>
</form>
