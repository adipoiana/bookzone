<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/bookzone/view/conectare-bd.php';

if (!empty($_POST['username']) && !empty($_POST['password'])
    && isset($_POST['username']) && isset($_POST['password']))
{

    $username = strtolower($_POST['username']);
    $password = $_POST['password'];

    $sql    = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    $row    = $result->fetch_assoc();
    $hash   = $row['password'];
    $check  = password_verify($password, $hash);

    if ($check == 0)
    {
        header("Location: login.php?info=gresit");
        die();
    }
    else
    {
        $sql    = "SELECT * FROM users WHERE username = '$username' AND password = '$hash'";
        $result = mysqli_query($conn, $sql);
        if (!$row = $result->fetch_assoc())
        {
            echo 'Parola sau username-ul nu se potrivesc';
        }
        else
        {
            $_SESSION['id']       = $row['id'];
            $_SESSION['nume']     = $row['nume'];
            $_SESSION['prenume']  = $row['prenume'];
            $_SESSION['username'] = $row['username'];
        }
        header('location: homepage.php?info=logat');
    }

}
?>