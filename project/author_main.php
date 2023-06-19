<head>
    <style>
        .left {
            text-align: left;
            flex: 1;
        }
        .center {
            text-align: center;
    </style>
</head>
<form action="blog_post_handle.php" method="post">
    <div class="left">
    <h3>WRITE A NEW BLOG POST</h3>
    <p>Post title:</p>
    <input type="text" name="title" />
    <br>
    <p>Post:</p>
    <textarea name="blog_post" rows="10" cols="50"></textarea>
    <br>
        <p>Dodaj sciezke do zdjecia</p>
        <input type="text" name="file_path" />
        <br>
        <p>Nazwa pliku:</p>
        <input type="text" name="file_name" />
        <br>
        <br>
    <input type="submit" value="Post">
    </div>
</form>
<form action="change_post.php" method="post">
    <h3>CHANGE POST</h3>
    <p>Title of the post you want to change:</p>
    <input type="text" name="post_to_change" />
    <br>
    <p>New title:</p>
    <input type="text" name="new_title" />
    <br>
    <p>Changed blog post:</p>
    <textarea name="changed_post_text" rows="10" cols="50"></textarea>
    <br>
    <br>
    <input type="submit" value="Change">
</form>
<form action="password_change.php" method="post">
    <h3>CHANGE PASSWORD</h3>
    <p>New password:</p>
    <input type="text" name="new_password" />
    <br>
    <br>
    <input type="submit" value="Change">
</form>
<form action="user_delete_comments.php" method="post">
    <h3>DELETE COMMENTS</h3>
    <input type="submit" value="Chose comments">
</form>
<form action="logout.php" method="post">
    <h3>LOGOUT</h3>
    <input type="submit" value="Logout">
</form>
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
$sql = "SELECT * FROM posts";                   //szukanie username ktory sie pojawil w bazie
$result = $db->query($sql);
if ($result->num_rows > 0)
{
    $counter = 0;
    foreach ($result as $row)
    {
        if($row['post_show'] == 1)
        {
            $_SESSION['post_id'] = $row['id'];
            $post_id = $row['id'];
            $filePath = $row['file_path'];
            $fileName = $row['file_name'];
            echo("<div class='center''>");
            echo("<h1>");
            echo $row['title'];
            echo("</h1>");
            echo $row['change_date'];
            echo "<br>";
            echo $row['post_text'];
            echo ("<br>");
            echo ("<br>");
            echo ("<h5>COMMENTS:</h5>");
            $sql2 = "SELECT * FROM comments WHERE posts_id = '$post_id'";
            $result2 = $db->query($sql2);
            if ($result2->num_rows > 0)
            {
                $counter2 = 0;
                foreach ($result2 as $row2)
                {
                    $comment = $row2['comment_text'];
                    $commenter_id = $row2['users_id'];
                    $sql3 = "SELECT * FROM users WHERE id ='$commenter_id' ";
                    $result3 = $db->query($sql3);
                    $row3 = $result3->fetch_assoc();
                    echo $row3['username'];
                    echo ("<br>");
                    echo $comment;
                    echo ("<br>");
                    echo ("<br>");

                }
            }
            echo("<br>");
            echo("<form action='comment_handle.php' method='post'>");
            echo("<p>Comment:</p>");
            echo("<input type='text' name='comment' />");
            echo("<input type='text' name='post_comment_id' value='$post_id'>");
            echo("<br>");
            echo("<br>");
            echo("<input type='submit' value='Sent'>");
            echo ("</form>");
            echo("</div>");
        }
    }
}
$db->close();
?>

