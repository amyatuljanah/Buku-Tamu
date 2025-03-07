<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "bukutamu");

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Query untuk mengambil data dengan urutan ID ASC (Ascending)
$sql = "SELECT * FROM buku_tamu ORDER BY id ASC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku Tamu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Daftar Buku Tamu</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Pesan</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>
        <?php
        if (mysqli_num_rows($result) > 0) {
            $id = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $id++ ;
                echo "<td>" . $row['nama'] . "</td>";
                echo "<td>" . $row['pesan'] . "</td>";
                echo "<td>" . $row['tanggal'] . "</td>";
                echo "<td><a href='edit.php?id=" . $row['id'] . "'>Edit</a> | <a href='hapus.php?id=" . $row['id'] . "'>Hapus</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Tidak ada data</td></tr>";
        }
        ?>
    </table>
    <a href="index.php">Tambah Data</a>
</body>
</html>

<?php
mysqli_query($conn, "ALTER TABLE buku_tamu AUTO_INCREMENT = 1");
// Tutup koneksi
mysqli_close($conn);
?>
