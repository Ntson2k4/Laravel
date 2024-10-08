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
    <div class="container mt-3">
        <a href="{{url('tasks/create')}}" class="btn btn-primary mb-3">Tạo nhiệm vụ</a>
        <table class="table table-bordered">
            <thread>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Description</th>
                </tr>
            </thread>
            <tbody>
                @foreach($tasks as $task)
                <tr>
                    <td>{{$task->id}}</td>
                    <td>{{$task->name}}</td>
                    <td>{{$task->description}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @if (session('success'))
            <script>
                alert("{{ session('success') }}");
            </script>
        @endif
    </div>
</body>
</html>
