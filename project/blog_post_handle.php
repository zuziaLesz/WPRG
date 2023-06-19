<?php
session_start();
$dbadress = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "blog";
$db = new mysqli($dbadress, $dbuser, $dbpassword, $dbname);
if (!$db) {
    die("Błąd: nie można się połączyć z bazą danych ");
}
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $title = $_POST['title'];
    $blog_post_entry = $_POST['blog_post'];
    $file_path = $_POST['file_path'];
    $file_name = $_POST['name'];
    if(isset($_SESSION['id'])) $creator_id = $_SESSION['id'];
}
$sql = "INSERT INTO posts (title, post_text, users_id, file_path, file_name) VALUES ('$title','$blog_post_entry','$creator_id','$file_path','$file_name')";
if ($db->query($sql) === TRUE) {
    echo "BLOG POST CREATED!";
}
else {
    echo "no";
}
header("Location:posts_show.php");
$db->close();
