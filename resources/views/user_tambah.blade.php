<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Form Tambah Data User</h1>
    <form method="post" action="{{ url ('/user/tambah_simpan')}}">

        {{ csrf_field() }}

        <label for = "username" >Username</label>
        <input type="text" name="username" placeholder="Masukan Username">
        <br>
        <label for="nama">Nama</label>
        <input type="text" name="nama" placeholder="Masukan Nama">
        <br>
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Masukan Password">
        <br>
        <label for="level_id">Level ID</label>
        <input type="number" name="level_id" placeholder="Masukan ID Level">
        <br><br>
        <input type="submit" class="btn btn-success" value="Simpan">
    </form>
</body>
</html>