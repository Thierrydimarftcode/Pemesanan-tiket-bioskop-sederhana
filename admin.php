<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_bioskop");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$result = mysqli_query($koneksi, "SELECT * FROM tiket_bioskop ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Pemesanan Tiket Bioskop</title>
</head>
<body>

    <h2 align="center">Daftar Pemesanan Tiket Bioskop</h2>
    
    <table border="1" cellpadding="8" cellspacing="0" align="center" width="80%">
        <tr bgcolor="#cccccc">
            <th>No</th>
            <th>Nama Pemesan</th>
            <th>Judul Film</th>
            <th>Jumlah</th>
            <th>Tanggal Nonton</th>
            <th>Sesi Tayang</th>
            <th>Total Harga</th>
            <th>Waktu Pesan</th>
        </tr>

        <?php 
        $no = 1;
        while ($row = mysqli_fetch_assoc($result)) : 
        ?>
        <tr align="center">
            <td><?= $no++; ?></td>
            <td><?= htmlspecialchars($row['nama_pemesan']); ?></td>
            <td><?= htmlspecialchars($row['judul_film']); ?></td>
            <td><?= $row['jumlah_tiket']; ?></td>
            <td><?= $row['tanggal_nonton']; ?></td>
            <td><?= $row['sesi_tayang']; ?></td>
            <td>Rp <?= number_format($row['total_harga'], 0, ',', '.'); ?></td>
            <td><?= $row['waktu_pemesanan']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>

    <br>
    <div align="center">
        <a href="index.html">← Kembali ke Form Pemesanan</a>
    </div>

</body>
</html>