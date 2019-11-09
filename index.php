<?php
session_start();
if (isset($_POST['loginname'])) {
    session_start();
    $_SESSION['loginname'] = $_POST['loginname'];
}

if (isset($_GET['add_to_cart'])) {
    $idProduct = $_GET['add_to_cart'];
    setCookie('id[' . $idProduct . ']', $idProduct, time() + (86400 * 30));
}

?>


<?php require 'inc/data/products.php'; ?>
<?php require 'inc/head.php'; ?>
<div style="text-align: center">
    <?php if (empty($_SESSION['loginname'])) : ?>
        <a href="login.php">
            <button type="button" class="btn btn-primary btn-lg">Login</button>
        </a>
    <?php else: ?>
        <p> Bienvenue <?= $_SESSION['loginname'] ?> </p>
    <?php endif ?>
</div>
<section class="cookies container-fluid">
    <div class="row">
        <?php foreach ($catalog as $id => $cookie) { ?>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <figure class="thumbnail text-center">
                    <img src="assets/img/product-<?= $id; ?>.jpg" alt="<?= $cookie['name']; ?>" class="img-responsive">
                    <figcaption class="caption">
                        <h3><?= $cookie['name']; ?></h3>
                        <p><?= $cookie['description']; ?></p>
                        <a href="?add_to_cart=<?= $id; ?>" class="btn btn-primary">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add to cart
                        </a>
                    </figcaption>
                </figure>
            </div>
        <?php } ?>
    </div>
</section>
<section>
    <div>
        <?php if (isset($_SESSION['loginname'])) : ?>
            <a href="login.php">
                <button name="logout" type="button" class="btn btn-primary btn-lg">Logout</button>
            </a>
        <?php endif ?>
    </div>
</section>
<?php require 'inc/foot.php'; ?>
