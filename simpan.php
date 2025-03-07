<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "bukutamu");

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Ambil data dari form
$nama = $_POST['nama'];
$pesan = $_POST['pesan'];

// Simpan data ke database
$sql = "INSERT INTO buku_tamu (nama, pesan) VALUES ('$nama', '$pesan')";
if (mysqli_query($conn, $sql)) {
    echo "Data berhasil disimpan! <a href='tampil.php'>Lihat Buku Tamu</a>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
