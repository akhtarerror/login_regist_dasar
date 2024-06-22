<?php
$koneksi = mysqli_connect("localhost", "root", "", "pnj");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

$result_mahasiswa = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
if (!$result_mahasiswa) {
    echo "Error executing query for mahasiswa: " . mysqli_error($koneksi);
    exit();
}

$result_dosen = mysqli_query($koneksi, "SELECT * FROM dosen");
if (!$result_dosen) {
    echo "Error executing query for dosen: " . mysqli_error($koneksi);
    exit();
}
