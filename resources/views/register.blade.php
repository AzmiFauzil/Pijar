<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>

<div class="container">
    <div class="card">
        <h1>Registrasi</h1>

        <form action="/register" method="POST">
            @csrf

            <div class="input-group">
                <input type="text" name="nama_user" placeholder="Nama" value="{{ old('nama_user') }}">
                @error('nama_user') <small>{{ $message }}</small> @enderror
            </div>

            <div class="input-group">
                <input type="text" name="NIS" placeholder="NIS" value="{{ old('NIS') }}">
                @error('NIS') <small>{{ $message }}</small> @enderror
            </div>

            <div class="input-group">
                <input type="text" name="kelas" placeholder="Kelas" value="{{ old('kelas') }}">
                @error('kelas') <small>{{ $message }}</small> @enderror
            </div>

            <div class="input-group">
                <input type="text" name="no_telepon" placeholder="Nomor Handphone" value="{{ old('no_telepon') }}">
                @error('no_telepon') <small>{{ $message }}</small> @enderror
            </div>

            <div class="input-group">
                        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
                        @error('email') <small>{{ $message }}</small> @enderror
            </div>

            <div class="input-group">
                <input type="password" name="password" placeholder="Password">
                @error('password') <small>{{ $message }}</small> @enderror
            </div>

            

            <button type="submit" class="btn">REGISTRASI</button>
        </form>
    </div>
</div>

</body>
</html>