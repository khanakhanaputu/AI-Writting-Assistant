@isset($msg)
    {{ $msg }}
@endisset
<form action="" method="post">
    @csrf
    <input type="text" placeholder="name" name="name">
    <input type="text" placeholder="password" name="password">
    <input type="text" placeholder="password_confirm" name="confirm_password">
    <input type="text" placeholder="email" name="email">
    <button type="submit">Register</button>
</form>
