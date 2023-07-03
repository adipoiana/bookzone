<?php if (isset($_POST['submit']))
{
    $sqli   = "INSERT produse SET nume_produs ='$_POST[nume_produs]', status ='$_POST[status]'";
    $result = mysqli_query($conn, $sqli);
} ?>

<?php
$sqlc    = "SELECT * FROM produse ORDER BY id_produs DESC";
$result4 = mysqli_query($conn, $sqlc);
$count   = mysqli_num_rows($result4);
if ($count > 0)
{ ?>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>ST.</th>
                <th>Name</th<th>Short Description</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>

        <?php $i = 0;
        while ($rowc = mysqli_fetch_array($result4))
        {
            $i++ ?>

            <tr>
                <td>
                    <?php echo $i; ?>
                </td>
                <td>
                    <?php echo $rowc['nume_produs']; ?>
                </td>
                <td><a href="tindex.php?id_produs=<?php echo $rowc['id_produs'] ?>">
                        <?php $st = ($rowc['status'] == 1) ? 'Active' : 'Inactive';
                        echo $st; ?>
                </td>
                <td><a href="tindex.php?delete_id=<?php echo $rowc['id_produs']; ?> ">Delete</a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
<?php } ?>
<?php
include 'footer.php';
?>