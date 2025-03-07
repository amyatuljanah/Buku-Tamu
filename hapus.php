<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "bukutamu");

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Ambil ID dari parameter URL dan validasi
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Pastikan ID tidak kosong atau nol
if ($id > 0) {
    // Query untuk menghapus data
    $sql = "DELETE FROM buku_tamu WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        echo "Data berhasil dihapus! <a href='tampil.php'>Kembali</a>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "ID tidak valid!";
}

// Tutup koneksi
mysqli_close($conn);
?>
