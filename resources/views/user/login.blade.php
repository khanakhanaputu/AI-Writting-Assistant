<form action="{{ route('user.login') }}" method="post">
    @csrf
    <input type="text" name="name" placeholder="username">
    <input type="text" name="password" placeholder="password">
    <button type="submit">Login</button>
</form>

<br>

<a href="/auth/google" class="btn btn-danger">
    Login dengan Google
</a>
