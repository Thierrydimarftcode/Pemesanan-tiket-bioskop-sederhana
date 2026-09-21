<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_bioskop");

if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

$nama    = $_POST['Nama_Pemesan'] ?? '';
$film    = $_POST['Judul_Film'] ?? '';
$jumlah  = $_POST['Jumlah_Tiket'] ?? 0;
$tanggal = $_POST['Tanggal_Nonton'] ?? '';
$sesi    = $_POST['Sesi_Tayang_Film'] ?? '';

$harga_per_tiket = 50000;
$total_harga     = $jumlah * $harga_per_tiket;

$query = "INSERT INTO tiket_bioskop (nama_pemesan, judul_film, jumlah_tiket, tanggal_nonton, sesi_tayang, total_harga) 
          VALUES ('$nama', '$film', '$jumlah', '$tanggal', '$sesi', '$total_harga')";

$berhasil = mysqli_query($koneksi, $query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pemesanan Tiket - Cinema XXI</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h2>CINEMA XXI</h2>

    <form style="pointer-events: auto;">
        <?php if ($berhasil) : ?>
            <h3 style="text-align: center; color: #d4af37; margin-bottom: 20px;">PEMESANAN BERHASIL</h3>
            
            <table>
                <tr>
                    <td>Nama Pemesan</td>
                    <td>:</td>
                    <td><?= htmlspecialchars($nama); ?></td>
                </tr>
                <tr>
                    <td>Judul Film</td>
                    <td>:</td>
                    <td><?= htmlspecialchars($film); ?></td>
                </tr>
                <tr>
                    <td>Jumlah Tiket</td>
                    <td>:</td>
                    <td><?= htmlspecialchars($jumlah); ?> Lembar</td>
                </tr>
                <tr>
                    <td>Jadwal Tayang</td>
                    <td>:</td>
                    <td><?= htmlspecialchars($tanggal); ?> | <?= htmlspecialchars($sesi); ?> WIB</td>
                </tr>
                <tr>
                    <td>Total Bayar</td>
                    <td>:</td>
                    <td style="color: #d4af37; font-weight: bold;">Rp <?= number_format($total_harga, 0, ',', '.'); ?></td>
                </tr>
            </table>

            <div style="text-align: center; margin-top: 25px;">
                <a href="index.html" style="text-decoration: none;">
                    <button type="button">Pesan Tiket Lagi</button>
                </a>
            </div>

        <?php else : ?>
            <h3 style="text-align: center; color: #e11d48; margin-bottom: 15px;">GAGAL MENYIMPAN DATA</h3>
            <p style="text-align: center; color: #cccccc; margin-bottom: 20px;">Error: <?= htmlspecialchars(mysqli_error($koneksi)); ?></p>
            
            <div style="text-align: center;">
                <a href="index.html" style="text-decoration: none;">
                    <button type="button" style="background-color: #333; color: #fff;">Kembali ke Form</button>
                </a>
            </div>
        <?php endif; ?>
    </form>

</body>
</html>
<?php
mysqli_close($koneksi);
?>
