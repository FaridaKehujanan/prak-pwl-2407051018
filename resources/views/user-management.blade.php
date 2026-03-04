<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="text-align: center ; align-items: center; justify-center: center; margin:0 auto">
    <h1>User Management</h1>
    <p>ini adalah halaman user management</p>

    <table border="1" cellpadding="10" style="margin: 0 auto;">
        <tr style="background-color: #0000ff;"> 
            <th>Nama</th>
            <th>NPM</th>
            <th>Jurusan</th>
            <th>Prodi</th>
        </tr>
    @foreach ($users as $user)
        <tr>
            <td>{{ $user['nama'] }}</td>
            <td>{{ $user['npm'] }}</td>
            <td>{{ $user['jurusan'] }}</td>
            <td>{{ $user['prodi'] }}</td>
        </tr>
    @endforeach
    </table>
</body>
</html>