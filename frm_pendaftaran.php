<?php include "koneksi.php"; ?>
<section>
    <form method="POST" action="sv_pendaftaran.php">
        <label>Nama Lengkap</label>
        <input type="text" name="full_name" placeholder="Masukkan nama lengkap">
        <label>Email</label>
        <input type="email" name="email" placeholder="contoh@email.com">
        <label>Nomor WhatsApp</label>
        <input type="text" name="phone_number" placeholder="08123456789">
        <label>Pilih Kelas</label>
        <select name="course_id">
            <option value="">-- Pilih Kelas --</option>
            <?php
            $sql = "select * from courses";
            $query = mysqli_query($conn, $sql);
            while ($result = mysqli_fetch_array($query)) {
                $id = $result['id'];
                $course_name = $result['name'];
                $course_price = $result['price'];
            ?>
                <option value="<?= $id ?>">
                    <?= $course_name ?> - Rp<?= number_format($course_price, 0, ',', '.') ?>
                </option>
            <?php
            }
            ?>
        </select>
        <label>Jumlah Peserta</label>
        <input type="number" name="participant_count" min="1" value="1">
        <button type="submit" name="daftar">Daftar Sekarang</button>
    </form>
</section>