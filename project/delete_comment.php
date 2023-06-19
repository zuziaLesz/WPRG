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
$comment_id = $_POST['comment_to_delete'];
$sql = "DELETE FROM comments WHERE id = '$comment_id'";
if($result = $db->query($sql)) echo ("komentarz usuniety");
$user_type = $_SESSION['user_type'];
if($user_type == 1) header("Location:admin_main.php");
else if($user_type == 2) header("Location:author_main.php");
else if($user_type == 3) header("Location:user_main.php");
$db->close();
