<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="{{route('tasks.store')}}" method="POST">
        @csrf
        <label for="title">Tiêu đề</label>
        <input type="text" name="title"><br>
        <label for="description">Mô tả</label>
        <input type="text" name="description"><br>
        <label for="project_id">Id project</label>
        <input type="number" name="project_id"><br>
        <button>Thêm</button>
    </form>
</body>
</html>