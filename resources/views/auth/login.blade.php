<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>

    <h2>Login</h2>

    @if ($errors->any())
        <div class="error">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="/login" method="POST">
        @csrf

        <label>Email</label>
        <input type="email" name="email" placeholder="name@gmail.com" required>

        <label>Passwor</label>
        <input type="password" name="password" placeholder="password" required>

        <button type="submit">Login</button>
    </form>

    <a href="/">Login</a>
    <a href="/register">Register</a>
</body>
</html>
