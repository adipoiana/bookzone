<?php
include 'header_user.php';

//se verifica daca variabilele sunt goale si daca sunt setate

if (!empty($_POST['username']) && !empty($_POST['password_admin'])
    && isset($_POST['username']) && isset($_POST['password_admin']))
{
    $username        = $_POST['username'];
    $password        = $_POST['password_admin'];
    $password_hashed = password_hash($password, PASSWORD_DEFAULT);

    $sql    = "SELECT username FROM admins WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    $check  = mysqli_num_rows($result);
    if ($check > 0)
    {
        header('Location: signup-admin.php?info=exista');
        die();
    }
    else
    {
        $sql    = "INSERT INTO admins (username, password_admin) VALUES('$username', '$password_hashed')";
        $result = mysqli_query($conn, $sql);
        header("location:signup-admin.php?info=ok");
    }
}
else
{
    header("location:signup-admin.php?info=eroare");
}

?>