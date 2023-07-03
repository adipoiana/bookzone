<?php
$servername = "localhost";
$username   = "adipoiana";
$password   = "adipoiana";
$dbname     = "adipoiana";

// crearea conexiunii
$conn = mysqli_connect($servername, $username, $password, $dbname);

// verificarea conexiunii
if (!$conn)
{
    exit("Conexiunea a esuat:" . mysqli_connect_error());
}
// echo "Conexiune realizata cu succes";
?>