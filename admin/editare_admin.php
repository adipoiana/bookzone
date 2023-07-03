<?php
require 'header_admin.php';

// Verificare daca formularul a fost trimis
if (isset($_POST['submit']))
{

    // Obtinerea datelor din formular
    $id       = $_POST['id_admin'];
    $username = $_POST['username_admin'];
    $password = $_POST['password_admin'];
    $email    = $_POST['email_admin'];

    // Actualizarea bazei de date cu datele noi
    $sql = "UPDATE admins SET username_admin='$username', password_admin='$password', email_admin='$email' WHERE id_admin=$id";

    if (mysqli_query($conn, $sql))
    {
        echo "Inregistrare actualizata cu succes!";
    }
    else
    {
        echo "Eroare: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Afisarea formularului de editare utilizator
if (isset($_GET['id_admin']))
{
    $id     = $_GET['id_admin'];
    $sql    = "SELECT * FROM admins WHERE id_admin=$id";
    $result = mysqli_query($conn, $sql);
    $row    = mysqli_fetch_assoc($result);
    ?>
    <form method="post" action="editare_admin.php">
        <input type="text" class="form-control" name="username_admin" value="<?php echo $row['username_admin']; ?>"><br>
        <input type="password" class="form-control" name="password_admin" value="<?php echo $row['password_admin']; ?>"><br>
        <input type="text" class="form-control" name="email_admin" value="<?php echo $row['email_admin']; ?>"><br>
        <input type="submit" name="submit" value="Actualizare">
    </form>

    <?php
}
else
{
    // Afisarea listei de utilizatori
    $sql    = "SELECT * FROM admins";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0)
    {
        while ($row = mysqli_fetch_assoc($result))
        {
            echo
                "
            ID: " . $row['id_admin'] . " 
            Username: " . $row['username_admin'] . " 
            Password: " . $row['password_admin'] . " 
            Email: " . $row['email_admin'] . " 
            <a href='?edit=" . $row['id_admin'] . "'>Edit</a><br>
            ";
        }
    }
    else
    {
        echo "Nu exista utilizatori.";
    }
}

// Inchiderea conexiunii la baza de date
mysqli_close($conn);

?>