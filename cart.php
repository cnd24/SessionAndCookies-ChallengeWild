<?php
session_start();
if (empty($_SESSION['loginname'])) {
    header('Location: login.php');
    exit();
}
if (empty($_COOKIE['id'])) {
    header('Location: index.php');
    exit();
}
?>

<?php require 'inc/data/products.php'; ?>
<?php require 'inc/head.php'; ?>
<section class="cookies container-fluid">
    <div class="row">
        <?php foreach ($catalog as $id => $cookie) {
            foreach ($_COOKIE['id'] as $cookieid) {
                if ($cookieid == $id) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <figure class="thumbnail text-center">
                            <img src="assets/img/product-<?= $id; ?>.jpg" alt="<?= $cookie['name']; ?>"
                                 class="img-responsive">
                            <figcaption class="caption">
                                <h3><?= $cookie['name']; ?></h3>
                                <p><?= $cookie['description']; ?></p>
                            </figcaption>
                        </figure>
                    </div>
                <?php }
            }
        } ?>
    </div>
</section>

<?php require 'inc/foot.php'; ?>
