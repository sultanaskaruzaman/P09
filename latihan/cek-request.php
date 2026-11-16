<?php
declare(strict_types=1);

// =====================================================================
// cek-request.php - HO-2: "membuka amplop" request
// Menampilkan isi $_SERVER, $_GET, dan $_POST
// =====================================================================

function e(string $teks): string
{
    return htmlspecialchars($teks, ENT_QUOTES, 'UTF-8');
}

// Beberapa informasi penting dari $_SERVER
$infoServer = [
    "REQUEST_METHOD" => $_SERVER["REQUEST_METHOD"] ?? "-",
    "REQUEST_URI" => $_SERVER["REQUEST_URI"] ?? "-",
    "QUERY_STRING" => $_SERVER["QUERY_STRING"] ?? "-",
    "SCRIPT_NAME" => $_SERVER["SCRIPT_NAME"] ?? "-",
    "REMOTE_ADDR" => $_SERVER["REMOTE_ADDR"] ?? "-",
    "HTTP_USER_AGENT" => $_SERVER["HTTP_USER_AGENT"] ?? "-",
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cek Request</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 760px; margin: 20px auto; padding: 0 16px; }
        table { border-collapse: collapse; width: 100%; }
        td, th { border: 1px solid #ccc; padding: 6px 10px; text-align: left; vertical-align: top; }
        pre { background: #f4f4f9; padding: 10px; }
        form { margin-bottom: 12px; padding: 12px; border: 1px solid #ccc; }
    </style>
</head>
<body>
    <h1>Cek Request</h1>

    <form action="cek-request.php" method="get">
        <strong>Form A · GET</strong><br>
        <input type="text" name="produk" value="Kopi">
        <input type="number" name="jumlah" value="2">
        <button type="submit">Kirim GET</button>
    </form>

    <form action="cek-request.php?sumber=katalog" method="post">
        <strong>Form B · POST</strong> (action juga membawa ?sumber=katalog)<br>
        <input type="text" name="produk" value="Batik">
        <input type="number" name="jumlah" value="1">
        <button type="submit">Kirim POST</button>
    </form>

    <h2>$_SERVER (amplop: info pengiriman)</h2>
    <table>
        <?php foreach ($infoServer as $kunci => $nilai): ?>
            <tr>
                <th><?= e($kunci) ?></th>
                <td><?= e((string) $nilai) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h2>$_GET (isi yang tertulis di alamat/URL)</h2>
    <pre><?= e(print_r($_GET, true)) ?></pre>

    <h2>$_POST (isi di dalam amplop)</h2>
    <pre><?= e(print_r($_POST, true)) ?></pre>
</body>
</html>