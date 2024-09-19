{{-- <!DOCTYPE html>
<html>
    <head>
        <title>
            Data User
        </title>
    </head>
    <body>
        <h1>
            Data User
        </h1>
        <table border="1" cellpadding="2" cellspacing="0">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Nama</th>
                <th>ID Level Pengguna</th>
            </tr>
           
            <tr>
                <td>{{ $data->user_id}}</td>
                <td>{{ $data->username}}</td>
                <td>{{ $data->nama }}</td>
                <td>{{ $data->level_id }}</td>
                </tr>
            
            
        </table>
    </body>
</html> --}}

{{-- // Jobsheet 4 Praktikum 2.3
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data User</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 18px;
            text-align: left;
        }

        th,
        td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1>Jumlah Pengguna dengan Level 2</h1>
    <table>
        <thead>
            <tr>
                <th>Deskripsi</th>
                <th>Jumlah Pengguna</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Total Pengguna dengan Level 2</td>
                <td>{{ $userCount }}</td>
            </tr>
        </tbody>
    </table>
</body>

</html> --}}



{{-- jobsheet 4 praktikum 2.4 --}}
<!DOCTYPE html>
<html>

<head>
    <title>
        Data User
    </title>
</head>

<body>
    <h1>Data User</h1>
    <table border="1" cellpadding="2" cellspacing="0">
        <tr>
            <td>ID</td>
            <td>Username</td>
            <td>Nama</td>
            <td>ID Level Pengguna</td>
        </tr>
        <tr>
            <td>{{ $data->user_id }}</td>
            <td>{{ $data->username }}</td>
            <td>{{ $data->nama }}</td>
            <td>{{ $data->level_id }}</td>
        </tr>
    </table>
</body>

</html>
