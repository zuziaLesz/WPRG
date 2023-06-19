<?php

$dbadress = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "blog";
$db = new mysqli($dbadress, $dbuser, $dbpassword, $dbname);
if (!$db) {
    die("Błąd: nie można się połączyć z bazą danych ");
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $pwd = $_POST["password"];
    $email = $_POST["email"];

    $sql = "SELECT * FROM users WHERE username = '$username'";                   //szukanie username ktory sie pojawil w bazie

    $result = $db->query($sql);                                                   //odwolanie do bazy

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row['pwd'] == $pwd && $row['email'] == $email)
        {
            session_start();
            $_SESSION['user'] = $username;
            $_SESSION['pwd'] = $pwd;
            $_SESSION['email'] = $email;
            $_SESSION['id'] = $row['id'];
            $_SESSION['user_type'] = $row['user_types_id'];
            if($row['user_types_id'] == 1) header("Location:admin_main.php");
            else if($row['user_types_id'] == 2) header("Location:author_main.php");
            else if($row['user_types_id'] == 3) header("Location:user_main.php");
        }
        else
        {
            header("Location:a.php");
        }
    }
    else {
        $sql = "INSERT INTO users (username, pwd, email) VALUES ('$username','$pwd','$email')";
        if ($db->query($sql) === TRUE) {
            echo "Sign up successful!";
            header("Location:user_main.php");
        } else {
            echo "no";
        }
    }
    $db->close();
}