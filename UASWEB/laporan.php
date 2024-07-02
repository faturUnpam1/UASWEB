<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}

require_once "config.php";

$sql = "SELECT * FROM klasemen";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laporan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Laporan Klasemen UEFA 2024</h2>
        <table>
            <tr>
                <th>Group</th>
                <th>Negara</th>
                <th>Menang</th>
                <th>Seri</th>
                <th>Kalah</th>
                <th>Poin</th>
                <th>Ubah</th>
                <th>Hapus</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['group_name'] . "</td>";
                    echo "<td>" . $row['country_name'] . "</td>";
                    echo "<td>" . $row['wins'] . "</td>";
                    echo "<td>" . $row['draws'] . "</td>";
                    echo "<td>" . $row['losses'] . "</td>";
                    echo "<td>" . $row['points'] . "</td>";
                    echo "<td><a href='ubah_data.php?id=" . $row['id'] . "'>Ubah</a></td>";
                    echo "<td><a href='hapus_data.php?id=" . $row['id'] . "'>Hapus</a></td>";
                    echo "</tr>";
                }
            }
            ?>
        </table>
        <a href="cetak_pdf.php">Cetak PDF</a>
    </div>
</body>
</html>
