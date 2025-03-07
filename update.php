<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "bukutamu");

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Ambil data dari form POST
$id = isset($_POST['id']) ? intval($_POST['id']) : 0;
$nama = isset($_POST['nama']) ? mysqli_real_escape_string($conn, $_POST['nama']) : '';
$pesan = isset($_POST['pesan']) ? mysqli_real_escape_string($conn, $_POST['pesan']) : '';

// Query untuk update data
$sql = "UPDATE buku_tamu SET nama='$nama', pesan='$pesan' WHERE id=$id";

if (mysqli_query($conn, $sql)) {
    echo "Data berhasil diupdate! <a href='tampil.php'>Kembali</a>";
} else {
    echo "Error: " . mysqli_error($conn);
}

// Tutup koneksi
mysqli_close($conn);
?>
