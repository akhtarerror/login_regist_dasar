<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa dan Dosen PNJ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <a href="add_mahasiswa.php" class="btn btn-primary mb-3">Tambah Mahasiswa</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Email</th>
                    <th>Jurusan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result_mahasiswa) : ?>
                    <?php $i = 1; ?>
                    <?php while ($row = mysqli_fetch_assoc($result_mahasiswa)) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $row["Nama"]; ?></td>
                            <td><?= $row["NIM"]; ?></td>
                            <td><?= $row["Email"]; ?></td>
                            <td><?= $row["Jurusan"]; ?></td>
                            <td>
                                <a href="edit_mahasiswa.php?nim=<?= $row['NIM']; ?>" class="btn btn-warning">Edit</a>
                                <a href="delete_mahasiswa.php?nim=<?= $row['NIM']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endwhile; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="6">Data mahasiswa tidak ditemukan.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <br>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>NRP</th>
                    <th>Nomor Telepon</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result_dosen) : ?>
                    <?php $j = 1; ?>
                    <?php while ($row = mysqli_fetch_assoc($result_dosen)) : ?>
                        <tr>
                            <td><?= $j; ?></td>
                            <td><?= $row["Nama"]; ?></td>
                            <td><?= $row["NRP"]; ?></td>
                            <td><?= $row["No_Telepon"]; ?></td>
                            <td><?= $row["Email"]; ?></td>
                        </tr>
                        <?php $j++; ?>
                    <?php endwhile; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="5">Data dosen tidak ditemukan.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <br><br>
        <a href="logout.php" class="btn btn-secondary">Logout</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>



</html>