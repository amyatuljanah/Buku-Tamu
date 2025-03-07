<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "bukutamu");

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Mengambil ID dari URL dan memvalidasinya
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Menggunakan prepared statement untuk menghindari SQL injection
$sql = "SELECT * FROM buku_tamu WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Mengambil data
$row = mysqli_fetch_assoc($result);

// Cek apakah data ditemukan
if (!$row) {
    die("Data tidak ditemukan.");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku Tamu</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <h1>Edit Buku Tamu</h1>
    <form action="update.php" method="POST">
        <!-- ID disembunyikan untuk keperluan update -->
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
        
        <!-- Input nama -->
        Nama: <input type="text" name="nama" value="<?php echo htmlspecialchars($row['nama']); ?>"><br><br>
        
        <!-- Input pesan -->
        Pesan: <textarea name="pesan" required><?php echo htmlspecialchars($row['pesan']); ?></textarea>
        <br><br>
        
        <!-- Tombol submit -->
        <button type="submit">Update</button>
    </form>
</body>
</html>