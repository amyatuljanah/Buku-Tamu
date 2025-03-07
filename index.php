<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Tamu</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <h1>Buku Tamu</h1>
    <form action="simpan.php" method="POST">
    <label for="nama">Nama:</label><br>
    <input type="text" id="nama" name="nama" required><br><br>

    <label for="pesan">Pesan:</label><br>
    <textarea id="pesan" name="pesan" required></textarea><br><br>
    <button type="submit">Simpan</button>
    </form>
    <br>
    <a href="tampil.php">Lihat Buku Tamu</a>
</body>
</html>
