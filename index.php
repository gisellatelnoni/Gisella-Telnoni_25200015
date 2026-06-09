<?php
session_start();
include "koneksi.php";

$kelasList = [
    "Basic Brewing" => 150000,
    "Latte Art Pemula" => 250000,
    "Bisnis Kopi Rumahan" => 350000
];

$errors = $_SESSION['errors'] ?? [];
$success = $_SESSION['success'] ?? false;

unset($_SESSION['errors']);
unset($_SESSION['success']);

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Kelas Kopi Online Sabda Setia</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <header>
        <h1>Kelas Kopi Online Sabda Setia</h1>
        <p>Belajar menyeduh kopi dan membangun bisnis kopi rumahan</p>
    </header>

    <section>
        <h2>Tentang Program</h2>
        <p>
            Kelas Kopi Online adalah program pelatihan sederhana untuk pemula yang ingin
            belajar teknik dasar menyeduh kopi, membuat latte art, dan memahami peluang
            bisnis kopi rumahan.
        </p>
    </section>

    <section>
        <h2>Pilihan Kelas</h2>
        <div class="cards">
            <?php
            $sql = "select * from courses";
            $query = mysqli_query($conn, $sql);
            while ($result = mysqli_fetch_array($query)) {
            ?>
                <div class="card">
                    <h3><?= $result['name'] ?></h3>
                    <p>
                        <?= $result['description'] ?>
                    </p>
                    <strong>Rp <?= number_format($result['price'], 0, ',', '.') ?> </strong>
                </div>
            <?php
            }
            ?>
        </div>
    </section>

    <section>
        <h2>Form Pendaftaran</h2>

        <?php if (!empty($errors)): ?>
            <?php foreach ($errors as $error): ?>
                <div class="error"><?= htmlspecialchars($error) ?></div>
            <?php endforeach; ?>
        <?php endif; ?>

        <?php if ($success): ?>
            <div class="success">Pendaftaran berhasil diproses dan disimpan ke session.</div>
        <?php endif; ?>

        <?php include "frm_pendaftaran.php"; ?>
    </section>
</body>

</html>