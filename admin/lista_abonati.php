<?php
include 'header_admin.php';
$sql    = "SELECT * FROM subscribers";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0)
{
    echo '
    <div class ="container">
    <div class="row">
    <div class="col-lg-8">
    <form action="trimite_noutati.php" method="POST">
    <table>
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Sterge</th>
            <th>Editeaza noutati</th>
        </tr>
    ';

    while ($row = mysqli_fetch_assoc($result))
    {
        echo '
        <tr>
            <td>' . $row['id'] . '</td> 
            <td>' . $row['email'] . '</td>
            <td>
            <a class= "btn btn-sm btn-danger" href="delete_subscribers.php?id=' . $row["id"] . '" onclick="return confirm(\'Sunteti sigur ca vreti sa stergeti acest abonat?\')"><i class="fa-solid fa-trash-can"></i></a>
            </td>
            <td>
            <a class="btn btn-sm btn-success" href="editeaza_noutati.php?id=' . $row["id"] . '"><i class="fa-regular fa-envelope"></i></a>
            </td>
        </tr>
        ';
    }
    echo '
    <tr>
        <td colspan="4">
            <input type="submit" name="submit" value="Trimite Noutati" class="btn btn-sm btn-primary" onclick="return confirm(\'Sunteti sigur ca vreti sa trimiteti noutatile?\')">
        </td>
    </tr>';
    echo '</table> </form>';
    echo '</div>
    </div>
    </div>
    ';
}
else
{
    echo 'Nu s-au gasit abonati.';
}
?>