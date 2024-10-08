<form action="{{route('users.update',$user->id)}}" method="POST">
    @csrf
    @method('PUT')
    <label for="name">Name</label>
    <input type="text" name="name" value="{{$user->name}}"><br>
    <label for="email">Email</label>
    <input type="email" name="email" value="{{$user->email}}"><br>
    <label for="password">PassWord</label>
    <input type="password" name="password" value="{{$user->password}}"><br>
    <button type="submit">Update</button>
</form>