<h2>Register</h2>

<form action="/register" method="POST">
    @csrf

    <input type="text" name="name" placeholder="Nama"><br><br>

    <input type="text" name="NIS" placeholder="NIS"><br><br>

    <input type="text" name="kelas" placeholder="Kelas"><br><br>

    <input type="text" name="no_telepon" placeholder="No Telepon"><br><br>

    <input type="email" name="email" placeholder="Email"><br><br>

    <input type="password" name="password" placeholder="Password"><br><br>

    <button type="submit">Register</button>
</form>