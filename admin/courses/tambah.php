<?php
include "../security.php";
include "../../koneksi.php";

if (isset($_POST['simpan'])) {
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $price = (int) $_POST['price'];

    if ($title == '' || $description == '' || $price <= 0) {
        $error = "Semua field wajib diisi dengan benar.";
    } else {
        $sql = "insert into courses (name, description, price) values('$title', '$description', '$price')";
        $query = mysqli_query($conn, $sql);

        if ($query) {
            header("Location: index.php");
            exit;
        } else {
            $error = "Data gagal disimpan.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Course</title>
</head>
<body>

<h1>Tambah Course</h1>

<a href="index.php">Kembali</a>

<br><br>

<?php if (isset($error)) : ?>
    <p style="color:red;"><?= $error; ?></p>
<?php endif; ?>

<form method="POST">
    <label>Judul Course</label><br>
    <input type="text" name="title">
    <br><br>

    <label>Deskripsi</label><br>
    <textarea name="description" rows="5" cols="40"></textarea>
    <br><br>

    <label>Harga</label><br>
    <input type="number" name="price">
    <br><br>

    <button type="submit" name="simpan">Simpan</button>
</form>

</body>
</html>