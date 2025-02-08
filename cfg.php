<!-- ŠEIT RAKSTĪS PHP KODU/SKRIPTU! -->
<?php
session_start();
$login = $_POST['pkods'];
include("db.php");
$sql = "SELECT * FROM visikopa WHERE code = '$login'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $_SESSION["OK"] = TRUE;
    while($row = $result->fetch_assoc()) {
        $_SESSION["user"] = $row['id'];
        }
    header("Location: Search_Page.php");
    }
else {
    header("Location: index.php");
}
    $conn->close();
?>