<?php
$dbadress = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "blog";
$db = new mysqli($dbadress, $dbuser, $dbpassword, $dbname);
if (!$db) {
    die("Błąd: nie można się połączyć z bazą danych ");
}
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_password = $_POST['new_password'];
    $user_id = $_SESSION['id'];
    $sql = "UPDATE users SET pwd = '$new_password' WHERE id ='$user_id' ";
    $result = $db->query($sql);
    $user_type = $_SESSION['user_type'];
    echo $user_type;
    if($user_type == 1) header("Location:admin_main.php");
    else if($user_type == 2) header("Location:author_main.php");
    else if($user_type == 3) header("Location:user_main.php");
    $db->close();
}