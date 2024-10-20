<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data user</title>
</head>
<body>
    <h1>Data user</h1>
    <a href="{{url('/user/tambah')}}">+ Tambah User</a>
    <table border="1" cellpadding="2" cellspacing="0">
        <tr>
            <td>ID</td>
            <td>Username</td>
            <td>Nama</td>
            <td>ID Level pengguna</td>
            <td>Kode Level</td>
            <td>Nama Level</td>
            <td>Aksi</td>
        </tr>
        @foreach ($data as $d)
        <tr>
            <td> {{$d->user_id}} </td>
            <td> {{$d->username}} </td>
            <td> {{$d->nama}} </td>
            <td> {{$d->level_id}} </td>
            <td> {{$d->level->level_kode}} </td>
            <td> {{$d->level->level_nama}} </td>
            {{-- <td><a href="/user/ubah/{{ $d->user_id }}">Ubah</a> | <a href="/user/hapus/ {{ $d->user_id }}">Hapus</a></td> --}}
            <td><a href="{{ url('/user/ubah/' . $d->user_id) }}">Ubah</a> | <a href="{{ url('/user/hapus/' . $d->user_id) }}">Hapus</a>
        </tr>
        @endforeach
    </table>
</body></html>