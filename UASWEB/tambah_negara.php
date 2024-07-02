<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}

require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $group_name = $_POST['group_name'];
    $country_name = $_POST['country_name'];
    $wins = $_POST['wins'];
    $draws = $_POST['draws'];
    $losses = $_POST['losses'];
    $points = $_POST['points'];

    $sql = "INSERT INTO klasemen (group_name, country_name, wins, draws, losses, points) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssiiii", $group_name, $country_name, $wins, $draws, $losses, $points);
    $stmt->execute();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Negara</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Tambah Negara</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            Group: 
            <select name="group_name" required>
                <option value="A">Group A</option>
                <option value="B">Group B</option>
                <option value="C">Group C</option>
                <option value="D">Group D</option>
            </select><br>
            Negara: 
            <select name="country_name" required>
                 <option value="A">Spanyol</option>
                <option value="B">Italia</option>
                <option value="C">albania</option>
                <option value="D">kroasia</option>
            </select><br>
            Jumlah Menang: <input type="number" name="wins" required><br>
            Jumlah Seri: <input type="number" name="draws" required><br>
            Jumlah Kalah: <input type="number" name="losses" required><br>
            Jumlah Poin: <input type="number" name="points" required><br>
            <input type="submit" value="Simpan">
        </form>
    </div>
</body>
</html>
