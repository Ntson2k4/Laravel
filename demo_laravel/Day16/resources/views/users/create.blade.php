<form action="{{route('users.store')}}" method="POST">
    @csrf
    <label for="name">Name</label>
    <input type="text" name="name" id="name"><br>
    <label for="email">Email</label>
    <input type="email" name="email" id="email"><br>
    <label for="password">PassWord</label>
    <input type="password" name="password" id="password"><br>
    <button type="submit">Add</button>
</form>