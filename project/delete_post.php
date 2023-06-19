<?php
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
    $post_title = $_POST['post_to_delete'];
    $sql = "SELECT * FROM posts WHERE title = '$post_title'";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        $sql = "UPDATE posts SET post_show = 0 WHERE title = '$post_title'";
        $result = $db->query($sql);
    }
    else
    {
        echo ("THIS BLOG POST DOES NOT EXIST");
    }
    header("Location:admin_main.php");
}