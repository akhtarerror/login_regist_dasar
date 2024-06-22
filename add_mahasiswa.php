<?php
include "koneksi.php";

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $email = $_POST['email'];
    $jurusan = $_POST['jurusan'];

    // Pastikan NIM yang akan dimasukkan belum ada di database
    $check_query = "SELECT * FROM mahasiswa WHERE NIM = '$nim'";
    $check_result = mysqli_query($koneksi, $check_query);
    if (mysqli_num_rows($check_result) > 0) {
        echo "Error: NIM '$nim' already exists.";
    } else {
        // Insert data baru ke dalam tabel mahasiswa
        $query = "INSERT INTO mahasiswa (Nama, NIM, Email, Jurusan) VALUES ('$nama', '$nim', '$email', '$jurusan')";
        if (mysqli_query($koneksi, $query)) {
            header("Location: index.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($koneksi);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa</title>
</head>

<body>
    <h1>Tambah Mahasiswa</h1>
    <form action="" method="POST">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" id="nama" required><br>
        <label for="nim">NIM:</label>
        <input type="text" name="nim" id="nim" required><br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br>
        <label for="jurusan">Jurusan:</label>
        <input type="text" name="jurusan" id="jurusan" required><br>
        <button type="submit" name="submit">Tambah</button>
    </form>
    <a href="index.php">Kembali</a>
</body>

</html>