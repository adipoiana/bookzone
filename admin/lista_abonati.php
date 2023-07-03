<?php
include 'header_admin.php';
$subscribers = $_POST['id_subscribe'];
$sql         = "SELECT * FROM subscribers WHERE id_subscribe='$subscribers'";
$result      = mysqli_query($conn, $sql);
if ($result)
{
    echo '
     <div class = "container">
     </div>
    ';
    while ($row = mysqli_fetch_assoc($result))
    {
        echo '
        <td> ' . $row["id_subcribe"] . '</td>
        ';
    }
}
?>