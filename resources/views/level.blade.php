<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data level pengguna</title>
</head>
<body>
    <h1>Data level pengguna</h1>
    <table border="1" cellpadding="2" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Kode level</th>
            <th>Nama level</th>
        </tr>
        @foreach ($data as $d)
        <tr>
            <td> {{$d->level_id}} </td>
            <td> {{$d->level_kode}} </td>
            <td> {{$d->level_nama}} </td>
        </tr>
        @endforeach
    </table>
</body>
</html>