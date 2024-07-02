<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}

require_once "config.php";

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $group_name = $_POST['group_name'];
    $country_name = $_POST['country_name'];
    $wins = $_POST['wins'];
    $draws = $_POST['draws'];
    $losses = $_POST['losses'];
    $points = $_POST['points'];

    $sql = "UPDATE klasemen SET group_name=?, country_name=?, wins=?, draws=?, losses=?, points=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssiiiii", $group_name, $country_name, $wins, $draws, $losses, $points, $id);
    $stmt->execute();

    header('Location: laporan.php');
    exit;
} else {
    $sql = "SELECT * FROM klasemen WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ubah Data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Ubah Data</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?id=" . $id; ?>">
            Group: 
            <select name="group_name" required>
                <option value="A" <?php if ($row['group_name'] == 'A') echo 'selected'; ?>>Group A</option>
                <option value="B" <?php if ($row['group_name'] == 'B') echo 'selected'; ?>>Group B</option>
                <option value="C" <?php if ($row['group_name'] == 'C') echo 'selected'; ?>>Group C</option>
                <option value="D" <?php if ($row['group_name'] == 'D') echo 'selected'; ?>>Group D</option>
            </select><br>
            Negara: 
            <select name="country_name" required>
                <!-- Isi dengan data negara UEFA -->
            </select><br>
            Jumlah Menang: <input type="number" name="wins" value="<?php echo $row['wins']; ?>" required><br>
            Jumlah Seri: <input type="number" name="draws" value="<?php echo $row['draws']; ?>" required><br>
            Jumlah Kalah: <input type="number" name="losses" value="<?php echo $row['losses']; ?>" required><br>
            Jumlah Poin: <input type="number" name="points" value="<?php echo $row['points']; ?>" required><br>
            <input type="submit" value="Ubah">
        </form>
    </div>
</body>
</html>
