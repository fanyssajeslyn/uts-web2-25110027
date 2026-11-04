<?php
// 1. Data keranjang dalam array multidimensi
$keranjang = [
    [
        "nama" => "Kopi Susu",
        "harga" => 18000,
        "jumlah" => 2
    ],
    [
        "nama" => "Teh Manis",
        "harga" => 8000,
        "jumlah" => 3
    ],
    [
        "nama" => "Roti Bakar",
        "harga" => 15000,
        "jumlah" => 1
    ]
];

// 2. Fungsi menghitung subtotal
function hitungSubtotal(int $harga, int $jumlah): int {
    return $harga * $jumlah;
}

// Fungsi format rupiah
function formatRupiah(int $angka): string {
    return "Rp " . number_format($angka, 0, ',', '.');
}

// 3. Menghitung total belanja
$total = 0;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Struk Kasir Kedai Kopi</title>
    <link rel="stylesheet" href="style.css">


</head>

<body>

<div class="container">

    <h2>STRUK KASIR KEDAI KOPI</h2>
    <p>Tanggal: <?= date('d-m-Y'); ?></p>

    <table>
        <tr>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Subtotal</th>
        </tr>

        <?php foreach ($keranjang as $item): ?>

        <?php
            $subtotal = hitungSubtotal(
                $item['harga'],
                $item['jumlah']
            );

            $total += $subtotal;
        ?>

        <tr>
            <td><?= htmlspecialchars($item['nama']); ?></td>
            <td><?= formatRupiah($item['harga']); ?></td>
            <td><?= $item['jumlah']; ?></td>
            <td><?= formatRupiah($subtotal); ?></td>
        </tr>

        <?php endforeach; ?>

    </table>

    <?php
    // 4. Menghitung diskon
    $diskon = 0;

    if ($total >= 50000) {
        $diskon = $total * 0.10;
    }

    $totalBayar = $total - $diskon;
    ?>

    <div class="hasil">
        <p><b>Total Belanja:</b> <?= formatRupiah($total); ?></p>

        <p><b>Diskon 10%:</b> <?= formatRupiah($diskon); ?></p>

        <p><b>Total Bayar:</b> <?= formatRupiah($totalBayar); ?></p>
    </div>

</div>

</body>
</html>