<?php
include 'header_user.php';
// unset($_SESSION['cart']);
?>

<div class="container text-center">
    <div class="row">
        <div class="col empty_cart">
            <img src="/bookzone/image/empty_cart.png">
        </div>
        <?php
        // Verifică dacă coșul are produse
        if (!empty($_SESSION['cart']))
        {
            $num_items = count($_SESSION['cart']);
            $total     = 0;
            ?>

        <section class="pt-5 pb-5">
            <div class="container">
                <div class="row w-100">
                    <div class="col-lg-12 col-md-12 col-12">
                        <h3 class="display-5 mb-2 text-center">Lista cumparaturi</h3>
                        <p class="mb-5 text-center">
                            <i class="text-info font-weight-bold">
                                <?php echo $num_items; ?>
                            </i> produse in cosul tau
                        </p>

                        <table id="shoppingCart" class="table table-condensed table-responsive">
                            <thead>
                                <tr>
                                    <th style="width:15%">Imagini</th>
                                    <th style="width:35%">Nume Produse</th>
                                    <th style="width:12%">Pret</th>
                                    <th style="width:10%">Cantitate</th>
                                    <th style="width:10%">Total</th>
                                    <th style="width:16%">Stergere</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                    foreach ($_SESSION['cart'] as $product): ?>
                                <?php

                                        $id_produs = $product['id_produs'];
                                        // Verifică dacă ID-ul produsului este setat și există în baza de date
                                        if (isset($id_produs))
                                        {
                                            $sql    = "SELECT * FROM produse p LEFT JOIN images i ON p.id_produs = i.id_produs WHERE p.id_produs = $id_produs";
                                            $result = mysqli_query($conn, $sql);
                                            $row    = mysqli_fetch_assoc($result);

                                            $nume_produs      = $row['nume_produs'];
                                            $pret_initial     = $row['pret'];
                                            $procent_reducere = $row['pret_redus'];
                                            $image_path       = '/bookzone/admin/uploads/' . $row['image'];
                                            $afisare_imagine  = '<img src="' . $image_path . '">';

                                            $pret_redus = $pret_initial - ($pret_initial * $procent_reducere / 100);
                                            $total += $pret_redus * $product['cantitate'];

                                            $total_price = $pret_redus * $product['cantitate'];
                                            ?>
                                <tr>
                                    <td data-th="Image image_cart">
                                        <div class="col-md-3 text-left">
                                            <img src="<?php echo $image_path; ?>" alt=""
                                                class="img-fluid d-none d-md-block rounded mb-2 shadow">
                                        </div>
                                    </td>
                                    <td data-th="Product">
                                        <div class="row">
                                            <div class="col-md-9 text-left mt-sm-2">
                                                <h4>
                                                    <?php echo $nume_produs; ?>
                                                </h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-th="Price">
                                        <?php echo $pret_redus; ?>
                                    </td>
                                    <td data-th="Quantity">
                                        <input type="number"
                                            class="form-control form-control-lg text-center quantity-input"
                                            value="<?php echo $product['cantitate']; ?>"
                                            onchange="updateCartItem(<?php echo $id_produs; ?>, this.value)">


                                    </td>

                                    <td data-th="total_price">
                                        <span id="total_price_<?php echo $id_produs; ?>"> <?php echo $total_price; ?>
                                        </span>
                                    </td>
                                    <td class="actions" data-th="">
                                        <div class="text-right">
                                            <a href="updateCart.php"
                                                class="btn btn-white border-secondary bg-white btn-md mb-2">
                                                <i class="fas fa-sync"></i>
                                            </a>
                                            <a href="delete_items.php?id_produs=<?php echo $id_produs; ?>">
                                                <button class="btn btn-white border-secondary bg-white btn-md mb-2">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php }endforeach; ?>
                            </tbody>
                        </table>
                        <div class="float-right text-right">
                            <h4>Subtotal: <span>
                                    <?php echo $total; ?>
                                </span></h4>
                        </div>
                    </div>
                </div>
                <div class="row mt-4 d-flex align-items-center">
                    <div class="col-sm-6 order-md-2 text-right">
                        <a href="catalog.html" class="go_shopping mb-3 mb-m-1 order-md-1 text-md-left">Checkout</a>
                    </div>
                    <div class="col-sm-6 mb-m-1 order-md-1 text-md-left">
                        <a href="homepage_user.php" class="go_shopping">Continua cumparaturile</a>
                    </div>
                </div>
            </div>
        </section>

        <?php }
        else
        { ?>
        <p>Nu sunt produse în coș.</p>
        <?php } ?>



    </div>
</div>


<?php include 'footer.php'; ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>
<script src="/bookzone/view/includes/main.js"></script>
<script src="/bookzone/view/includes/mpgal.js"></script>
<script src="/bookzone/view/includes/login.js"></script>

<script>
var myTabs = new bootstrap.Tab(document.getElementById('myTabs'));
myTabs.show();
</script>

</body>

</html>