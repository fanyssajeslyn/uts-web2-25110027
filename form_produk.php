<?php
// Menyiapkan variabel
$nama = "";
$harga = "";

$errorNama = "";
$errorHarga = "";
$pesan = "";

// Memeriksa apakah form dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nama = trim($_POST["nama"] ?? "");
    $harga = trim($_POST["harga"] ?? "");

    // Validasi nama produk
    if ($nama == "") {
        $errorNama = "Nama produk wajib diisi!";
    }

    // Validasi harga
    if ($harga == "") {
        $errorHarga = "Harga wajib diisi!";
    } elseif (!is_numeric($harga) || $harga <= 0) {
        $errorHarga = "Harga harus berupa angka lebih dari 0!";
    }

    // Jika semua validasi benar
    if ($errorNama == "" && $errorHarga == "") {

        $pesan = "Produk " . $nama . " berhasil ditambahkan";

        // Kosongkan input setelah berhasil
        $nama = "";
        $harga = "";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Tambah Produk</title>
    <link rel="stylesheet" href="style.css">

    
</head>

<body>

<div class="container">

    <h2>FORM TAMBAH PRODUK</h2>

    <form method="POST" action="">

        <label>Nama Produk:</label>

        <input
            type="text"
            name="nama"
            value="<?= htmlspecialchars($nama, ENT_QUOTES, 'UTF-8'); ?>"
        >

        <div class="error">
            <?= htmlspecialchars($errorNama); ?>
        </div>

        <label>Harga Produk:</label>

        <input
            type="number"
            name="harga"
            value="<?= htmlspecialchars($harga, ENT_QUOTES, 'UTF-8'); ?>"
            step="any"
        >

        <div class="error">
            <?= htmlspecialchars($errorHarga); ?>
        </div>

        <button type="submit">Simpan</button>

    </form>

    <?php if ($pesan != ""): ?>

        <div class="success">
            <?= htmlspecialchars($pesan, ENT_QUOTES, 'UTF-8'); ?>
        </div>

    <?php endif; ?>

</div>

</body>
</html>