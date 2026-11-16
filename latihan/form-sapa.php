<?php
declare(strict_types=1);

// =====================================================================
// form-sapa.php - HO-1: anatomi form dan method GET
// Form ini mengirim data ke DIRINYA SENDIRI (action="form-sapa.php")
// =====================================================================

// 1. Tangkap data dari URL. Jika belum ada, pakai string kosong.
$nama = trim($_GET["nama"] ?? "");
$kota = trim($_GET["kota"] ?? "");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Sapa</title>
</head>
<body>
    <h1>Form Sapa</h1>

    <!-- 2. action = ke mana data dikirim, method = cara mengirim -->
    <form action="form-sapa.php" method="post">
        <label for="nama">Nama</label>
        <input type="text" id="nama" name="nama">

        <label for="kota">Kota</label>
        <input type="text" id="kota" name="kota">

        <button type="submit">Kirim</button>
    </form>

    <!-- 3. Tampilkan sapaan hanya jika nama sudah diisi -->
    <?php if ($nama !== ""): ?>
        <p>Halo, <?= htmlspecialchars($nama) ?> dari <?= htmlspecialchars($kota) ?>!</p>
    <?php endif; ?>
</body>
</html>