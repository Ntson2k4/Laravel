<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Tạo Nhiệm Vụ Mới</h1>
        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Tên Nhiệm Vụ</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Mô Tả</label>
                <textarea name="description" id="description" class="form-control" rows="3" required></textarea>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Tạo</button>
            </div>
        </form>
    </div>  
</body>
</html>

