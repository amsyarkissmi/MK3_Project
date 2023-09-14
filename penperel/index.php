<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pengurusan Warden</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
<h1 class="login-heading">Sistem Pengurusan Peralatan Elektrik Pelajar</h1>
<h3 class="login-subheading">Log Masuk</h3>
<form action="login.php" method="post" class="login-form">
    <label for="idpengguna">ID Pengguna</label>
    <input type="text" name="idpengguna" id="idpengguna" required><br>
    <label for="kata">Kata Laluan</label>
    <input type="password" name="kata" id="kata" required><br>
    <button type="submit">MASUK</button>
</form>
</body>
</html>
