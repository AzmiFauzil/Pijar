<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>

<div class="container">
    <div class="card">
        <h1>LOGIN</h1>

        @if(session('success'))
            <div class="alert success">{{ session('success') }}</div>
        @endif

        <form action="/login" method="POST">
            @csrf

            <div class="input-group">
                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
                @error('email')
                    <small>{{ $message }}</small>
                @enderror
            </div>

            <div class="input-group">
                <input type="password" name="password" placeholder="Password">
                @error('password')
                    <small>{{ $message }}</small>
                @enderror
            </div>

            <p class="register-text">
                Don’t have an account?
                <a href="/register">Register</a>
            </p>

            <button type="submit" class="btn">LOGIN</button>
        </form>
    </div>
</div>

</body>
</html>