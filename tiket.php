<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_bioskop");

if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

$nama    = $_POST['Nama_Pemesan'];
$film    = $_POST['Judul_Film'];
$jumlah  = $_POST['Jumlah_Tiket'];
$tanggal = $_POST['Tanggal_Nonton'];
$sesi    = $_POST['Sesi_Tayang_Film'];

$harga_per_tiket = 50000;
$total_harga     = $jumlah * $harga_per_tiket;

$query = "INSERT INTO tiket_bioskop (nama_pemesan, judul_film, jumlah_tiket, tanggal_nonton, sesi_tayang, total_harga) 
          VALUES ('$nama', '$film', '$jumlah', '$tanggal', '$sesi', '$total_harga')";

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil Pemesanan Tiket</title>
</head>
<body>

    <div align="center">
        <?php if (mysqli_query($koneksi, $query)) : ?>
            <h2>🎉 Pemesanan Tiket Berhasil!</h2>
            <hr width="50%">
            <table border="0" cellpadding="5">
                <tr>
                    <td><strong>Nama Pemesan</strong></td>
                    <td>:</td>
                    <td><?= htmlspecialchars($nama); ?></td>
                </tr>
                <tr>
                    <td><strong>Judul Film</strong></td>
                    <td>:</td>
                    <td><?= htmlspecialchars($film); ?></td>
                </tr>
                <tr>
                    <td><strong>Jumlah Tiket</strong></td>
                    <td>:</td>
                    <td><?= $jumlah; ?> Lembar</td>
                </tr>
                <tr>
                    <td><strong>Jadwal Tayang</strong></td>
                    <td>:</td>
                    <td><?= $tanggal; ?> | Jam <?= $sesi; ?> WIB</td>
                </tr>
                <tr>
                    <td><strong>Total Pembayaran</strong></td>
                    <td>:</td>
                    <td><strong>Rp <?= number_format($total_harga, 0, ',', '.'); ?></strong></td>
                </tr>
            </table>
            <br>
            <a href="index.html">← Pesan Tiket Lagi</a>
        <?php else : ?>
            <h2 style="color: red;">❌ Gagal Menyimpan Data!</h2>
            <p>Error: <?= mysqli_error($koneksi); ?></p>
            <a href="index.html">← Kembali ke Form</a>
        <?php endif; ?>
    </div>

</body>
</html>

<?php
mysqli_close($koneksi);
?>