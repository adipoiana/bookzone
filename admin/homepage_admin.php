<?php
require 'header_admin.php';

$queryProducts  = "SELECT COUNT(*) as total_products FROM produse";
$resultProducts = mysqli_query($conn, $queryProducts);
$rowProducts    = mysqli_fetch_assoc($resultProducts);
$totalProducts  = $rowProducts['total_products'];


$queryCategories  = "SELECT COUNT(*)as total_categories FROM categorii";
$resultCategories = mysqli_query($conn, $queryCategories);
$rowCategories    = mysqli_fetch_assoc($resultCategories);
$totalCategories  = $rowCategories['total_categories'];

$querySubscribers  = "SELECT COUNT(*) as total_subscribers FROM subscribers";
$resultSubscribers = mysqli_query($conn, $querySubscribers);
$rowSubscribers    = mysqli_fetch_assoc($resultSubscribers);
$totalSubscribers  = $rowSubscribers['total_subscribers'];

$queryUsers  = "SELECT COUNT(*) as total_users FROM users";
$resultUsers = mysqli_query($conn, $queryUsers);
$rowUsers    = mysqli_fetch_assoc($resultUsers);
$totalUsers  = $rowUsers['total_users'];

?>

<div class="container administration-page">
    <div class="text-center" style="margin-top:20px; margin-bottom:100px;">
        <h1>Panou de administrare</h1>
    </div>
    <div class="row">
        <div class="col-md-3 col-sm-6">
            <div class="counter">
                <div class="counter-content">
                    <div class="counter-icon">
                        <i class="fa-solid fa-user-lock"></i>
                    </div>
                    <h3> <a>Utilizatori</a></h3>
                    <span class="counter-value">
                        <?php echo $totalUsers; ?>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="counter purple">
                <div class="counter-content">
                    <div class="counter-icon">
                        <i class="fa-solid fa-list"></i>
                    </div>
                    <h3><a href="listare_categorii.php">Categorii</a></h3>
                    <span class="counter-value">
                        <?php echo $totalCategories; ?>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="counter blue">
                <div class="counter-content">
                    <div class="counter-icon">
                        <i class="fa-brands fa-product-hunt"></i>
                    </div>
                    <h3><a href="listare_produse.php">Produse</a></h3>
                    <span class="counter-value">
                        <?php echo $totalProducts; ?>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="counter green">
                <div class="counter-content">
                    <div class="counter-icon">
                        <i class="fa-solid fa-person"></i>
                    </div>
                    <h3><a href="lista_abonati.php">Abonati</a></h3>
                    <span class="counter-value">
                        <?php echo $totalSubscribers; ?>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Fereastra modală -->
<div id="userModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Alegeți tipul de utilizatori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Alegeți una dintre opțiunile de mai jos:</p>
                <ul>
                    <li><a href="utilizatori_clienti.php">Clienți</a></li>
                    <li><a href="utilizatori_admin.php"> Administratori</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php
require 'footer.php';
?>