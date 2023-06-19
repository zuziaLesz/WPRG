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
    $post_title = $_POST['post_to_change'];
    $sql = "SELECT * FROM posts WHERE title = '$post_title'";
    $result = $db->query($sql);
    $new_title = $_POST['new_title'];
    $new_post = $_POST['changed_post_text'];
    if ($result->num_rows > 0) {
        $sql = "UPDATE posts SET title = '$new_title',post_text = '$new_post', change_date = CURRENT_TIMESTAMP WHERE title = '$post_title'";
        $result = $db->query($sql);
        $user_type = $_SESSION['user_type'];
        echo ("POST CHANGED");
        if($user_type == 1) header("Location:admin_main.php");
        else if($user_type == 2) header("Location:author_main.php");
    }
    }
