<!DOCTYPE html>
<html>
<head>
    <title>Notifikasi Pendaftaran Pengguna</title>
</head>
<body>
    <h2>Selamat Datang, {{ $data['name'] }}!</h2>
    <p>Email Anda: {{ $data['email'] }}</p>
    <p>Tanggal Pendaftaran: {{ $data['registration_date'] }}</p>
    <p>Terima kasih telah mendaftar di aplikasi kami.</p>
</body>
</html>
