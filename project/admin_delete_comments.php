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
$sql = "SELECT * FROM comments";
$result = $db->query($sql);
echo ("<h2>Select comment you want to delete</h2>");
foreach ($result as $row)
{
    $comment = $row['comment_text'];
    $comment_id = $row['id'];
    echo $comment;
    echo("<form action='delete_comment.php' method='post'>");
    echo("<input type='text' name='comment_to_delete' value='$comment_id'>");
    echo("<input type='submit' value='Delete'>");
    echo("<br>");
    echo("<br>");
    echo ("</form>");
}
$db->close();

