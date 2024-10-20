@if (session('success'))
    <div style="color: green;">
        {{ session('success') }}
    </div>
@endif
<a href="{{route('users.create')}}">Create</a>
<table border="1">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->password}}</td>
            <td>
                <a href="{{route('users.edit',$user->id) }}">Edit</a>
                <form action="{{route('users.destroy',$user->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>