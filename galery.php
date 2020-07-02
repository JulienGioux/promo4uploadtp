<?php

session_start();
require_once 'my-config.php';
if ($_SESSION['name'] != 'admin' && $_SESSION['name'] != 'guest') {
    header("Status: 301 Moved Permanently", false, 301);
    header('Location: no-allowed.php');
    exit();
}
 
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
    <title>TP Upload - Galerie</title>
</head>

<body class="container">
    <div class="card row z-depth-3">
        <div class="col s12 pl0 pr0">
            <div class="blue darken-4 white-text pt20 pl20 pr20 pb20" id="headerForm">
                <div class="center-align"><img src="assets\img\logo200x200White.png" alt="Logo AllPix" class="logopng"></div>
                <h2 class="white-text">Bonjour, <?= isset($_SESSION['name']) && $_SESSION['name'] == 'admin' || isset($_SESSION['name']) && $_SESSION['name'] == 'guest' ? ucfirst($_SESSION['name']) : '' ?></h2>
            </div>
            <?php if (isset($_SESSION['name']) && $_SESSION['name'] == 'admin') { ?>
            <div class="card-action col s12">
                <a class="blue-text text-darken-4 " href="dashboard.php">Dashboard</a>
            </div>
            <?php } ?>

            <?php if (isset($_SESSION['name']) && $_SESSION['name'] == 'guest') { ?>
            <div class="card-action col s12">
                <form action="deconnection.php" method="post"  class="col s8">
                    <button class="blue-text text-darken-4" style="background: white; border: none;" name="deconnection" type="hidden"><a class="blue-text text-darken-4 btnDeco">Déconnection</a></button>
                </form>
            </div>
            <?php } ?> 
            <?php 
            foreach($imgGalery as $img) {
            ?>

            <div class="col s6 headline">
               <div class="card">
                 <div class="card-image materialboxed">
                    <img class="responsive-img" src="<?= 'img/'. $img ?>">
                 </div>
               </div>
            </div>
            
            <?php } ?>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>

        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.materialboxed');
            var options = {inDuration: 400, outDuration: 300};
            var instances = M.Materialbox.init(elems, options);
        });

    </script>
</body>

</html>