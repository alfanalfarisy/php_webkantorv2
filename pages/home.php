<?php
require('../layout/header.php');
require('../layout/navbar.php')
?>



<main id="main">

    <?php require('../components/home/welcome.php') ?>
    <?php require('../components/home/news.php') ?>
    <?php require('../components/home/peringatandini.php') ?>
    <?php require('../components/home/banner.php') ?>
    <?php require('../components/home/cuacadangempa.php') ?>
    <?php require('../components/home/services.php') ?>
    <?php require('../components/home/contact.php') ?>

</main>
<?php require('../layout/footer.php') ?>



<?php
require('../layout/libraryJs.php');
require('../layout/homeJsLoader.php');
?>