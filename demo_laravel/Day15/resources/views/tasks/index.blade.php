<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="{{url('tasks/create')}}">Create</a>
    <table border="1">
        <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Description</th>
                <th>completed</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($getAll as $task)
            <tr>
                <td>{{$task->id}}</td>
                <td>{{$task->title}}</td>
                <td>{{$task->description}}</td>
                <td>{{$task->completed ? 'yes':'no' }}</td>
                <td>
                    <a href="{{url('tasks/edit/'.$task->id)}}">Update</a>
                    <form action="{{url('tasks/delete/ '.$task->id)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>


</body>

</html>