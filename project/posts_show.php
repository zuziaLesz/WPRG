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
$sql = "SELECT * FROM posts";                   //szukanie username ktory sie pojawil w bazie
$result = $db->query($sql);
if ($result->num_rows > 0)
{
    $counter = 0;
    foreach ($result as $row)
    {
        $_SESSION['id'][$counter] = $row['id'];
        $_SESSION['title'][$counter] = $row['title'];
        $_SESSION['change_date'][$counter] = $row['change_date'];
        $_SESSION['post_text'][$counter] = $row['post_text'];
        $_SESSION['user_id'][$counter] = $row['users_id'];
        $_SESSION['post_show'][$counter] = $row['post_show'];
        $_SESSION['file_path'][$counter] = $row['file_path'];
        $_SESSION['file_name'][$counter] = $row['file_name'];
        $counter++;
    }
}
header("Location:author_main.php");
$db->close();
