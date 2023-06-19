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
$comment_text = $_POST['comment'];
if(isset($_SESSION['id']))
{
    $user_id = $_SESSION['id'];
}
else
{
    $sql2 = "INSERT INTO users (username, pwd,email) VALUES ('Guest','','')";
    $result2 = $db->query($sql2);
    $sql3 = "SELECT * FROM users WHERE username = 'Guest' ORDER BY id ASC limit 1";
    $result3 = $db->query($sql3);
    $row3 = $result3->fetch_assoc();
    $user_id = $row3['id'];
}
$post_id = $_POST['post_comment_id'];
$sql = "INSERT INTO comments (comment_text, users_id, posts_id) VALUES ('$comment_text','$user_id','$post_id')";
$result = $db->query($sql);
if(isset($_SESSION['user_type']))
{
    $user_type = $_SESSION['user_type'];
}
else
{
    $user_type = 3;
}
if($user_type == 1) header("Location:admin_main.php");
else if($user_type == 2) header("Location:author_main.php");
else if($user_type == 3) header("Location:user_main.php");
$db->close();
