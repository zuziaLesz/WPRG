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
<form action="sign_up.php" method="post">
        <div class="left">
    <h1>SIGN UP</h1>
    <p>USERNAME:</p>
    <input type="text" name="username" />
    <br>
    <p>PASSWORD:</p>
    <input type="text" name = "password" />
    <br>
    <p>EMAIL:</p>
    <input type="text" name="email">
    <br>
    <br>
    <input type="submit" value="Sign Up">
        </div>
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
            echo("<div class='center''>");
            echo("<h1>");
            echo $row['title'];
            echo("</h1>");
            echo $row['change_date'];
            echo "<br>";
            echo $row['post_text'];
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
