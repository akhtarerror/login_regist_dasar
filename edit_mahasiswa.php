<?php
include "koneksi.php";

if (!isset($_GET['nim'])) {
    echo "NIM is not set!";
    exit();
}

$nim = $_GET['nim'];
$result = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE NIM = '$nim'");

if (!$result || mysqli_num_rows($result) == 0) {
    echo "Data not found!";
    exit();
}

$row = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $nim_new = $_POST['nim'];
    $email = $_POST['email'];
    $jurusan = $_POST['jurusan'];

    $query = "UPDATE mahasiswa SET Nama = '$nama', NIM = '$nim_new', Email = '$email', Jurusan = '$jurusan' WHERE NIM = '$nim'";
    if (mysqli_query($koneksi, $query)) {
        header("Location: index.php");
    } else {
        echo "Error updating record: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa</title>
</head>

<body>
    <h1>Edit Mahasiswa</h1>
    <form action="" method="POST">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" id="nama" value="<?= $row['Nama']; ?>" required><br>
        <label for="nim">NIM:</label>
        <input type="text" name="nim" id="nim" value="<?= $row['NIM']; ?>" required><br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?= $row['Email']; ?>" required><br>
        <label for="jurusan">Jurusan:</label>
        <input type="text" name="jurusan" id="jurusan" value="<?= $row['Jurusan']; ?>" required><br>
        <button type="submit" name="submit">Update</button>
    </form>
    <a href="index.php">Kembali</a>
</body>

</html>