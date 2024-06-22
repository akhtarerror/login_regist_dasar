<?php
include "koneksi.php";

$nim = $_GET['nim'];
mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE nim = $nim");

header("Location: index.php");
