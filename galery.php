<?php

session_start();
require_once 'my-config.php';
 
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="assets/uploadPreview.css">
    <link rel="stylesheet" href="assets/style.css">
    <!-- <link href="assets/lightbox.css" rel="stylesheet" /> -->
    <title>TP Upload - Galerie</title>
</head>

<body class="container">
    <div class="card row z-depth-3">
        <div class="col s12 pl0 pr0">
            <div class="blue darken-4 white-text pt20 pl20 pr20 pb20" id="headerForm">
                <h1 class="white-text">allPIX</h1>
                <h2 class="white-text">Bonjour, <?= isset($_SESSION['name']) && $_SESSION['name'] == 'admin' || isset($_SESSION['name']) && $_SESSION['name'] == 'guest' ? ucfirst($_SESSION['name']) : '' ?></h2>
            </div>
            <div class="my-gallery" itemscope itemtype="http://schema.org/ImageGallery">

            <?php 
            foreach($imgGalery as $img) {
            ?>

            <div class="col s6 headline">
               <div class="card">
                 <div class="card-image imgCards">
                    <img class="responsive-img materialboxed" src="<?= 'img/'. $img ?>">
                 </div>
               </div>
            </div>

            <?php } ?>

            </div>

            <?php if (isset($_SESSION['name']) && $_SESSION['name'] == 'admin') { ?>
            <div class="card-action col s12">
                <a class="blue-text text-darken-4 " href="dashboard.php">Dashboard</a>
            </div>
            <?php } ?>

            <?php if (isset($_SESSION['name']) && $_SESSION['name'] == 'guest') { ?>
            <div class="card-action col s12">
                <a class="blue-text text-darken-4 " href="deconnection.php">Déconnection</a>
            </div>
            <?php } ?>

        </div>
    </div>
    
    <!-- <script src="https://unpkg.com/scrollreveal"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- <script src="assets/lightbox.js"></script> -->
    <script>
        // lightbox.option({
        //     'resizeDuration': 200,
        //     'wrapAround': true
        // })
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.materialboxed');
            var options = {inDuration: 400, outDuration: 300};
            var instances = M.Materialbox.init(elems, options);
        });

    </script>
</body>

</html>