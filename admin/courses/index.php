<?php
include "../security.php";
include "../../koneksi.php";

$sql = "select * from courses";
$query = mysqli_query($conn, $sql);
?>
<a href="../dashboard.php">Kembali ke Dashboard</a> |
<a href="tambah.php">Tambah Course</a>

<br><br>
<table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Kelas</th>
            <th>Deskripsi</th>
            <th>Harga</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
            $no = 1;
        while($result = mysqli_fetch_array($query)){
            $name = $result['name'];
            $description = $result['description'];
            $price = $result['price'];
            $id = $result['id'];
        ?>
        <tr>
            <td><?= $no ?></td>
            <td><?= $name ?></td>
            <td><?= $description ?></td>
            <td><?= $price ?></td>
            <td>
                <a href="edit.php?id=<?= $id; ?>">Edit</a> |
                <a href="hapus.php?id=<?= $id; ?>" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
            </td>
        </tr>
        <?php
            $no++;
        }
        ?>
    </tbody>
</table>