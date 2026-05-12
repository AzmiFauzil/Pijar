<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>

    <form action="/register" method="POST">
        @csrf

        <input type="text" name="nama_user" placeholder="Nama" required><br><br>

        <input type="text" name="NIS" placeholder="NIS" required><br><br>

        <input type="text" name="kelas" placeholder="Kelas" required><br><br>

        <input type="text" name="no_telepon" placeholder="No Telepon" required><br><br>

        <input type="email" name="email" placeholder="Email" required><br><br>

        <input type="password" name="password" placeholder="Password" required><br><br>

        <button type="submit">Register</button>
    </form>

</body>
</html>