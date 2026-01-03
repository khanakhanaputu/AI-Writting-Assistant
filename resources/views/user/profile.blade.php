<form action="{{ route('user.logout') }}" method="post">
    @csrf
    <button type="submit">Logout</button>
</form>
