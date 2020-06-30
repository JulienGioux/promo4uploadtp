<?php 

session_start();

require_once 'my-config.php';

if ($_SESSION['name'] != 'admin') {
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
    <title>Dashboard</title>
</head>
<body class="container">
    <div class="card row z-depth-3">
        <div class="col s12 pl0 pr0">
            <div class="blue darken-4 white-text pt20 pl20 pr20 pb20" id="headerForm">
                <div class="center-align"><img src="assets\img\logo200x200White.png" alt="Logo AllPix" class="logopng"></div>
                <h2>Bonjour, <?= isset($_SESSION['name']) && $_SESSION['name'] == 'admin' ? ucfirst($_SESSION['name']) : '' ?></h2>
                <p>Quota : <?= sizeGalery() ?></p>
                <p>Total image(s) : <?= count(IMG_GALERY) ?></p>
            </div>

            <?php

            if (isset($_POST['upload']) || isset($filesArr)) {

            ?>

            <div class="row pl10 pr10">
                <div class="card-stacked col s12 m6 l8">
                    <form action="dashboard.php" method="post" enctype="multipart/form-data">
                        <div class="file-field input-field">
                            <p>Veuillez choisir une image :</p>
                            <div class="btn blue darken-4 btn-floating pulse">
                                <span>File</span>
                                <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
                                <input type="file" onchange="myname()" multiple id="myImg" name="myImg[]" data-preview=".preview">
                                
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                                <p class="helper-text">Fichiers *jpeg, *jpg, *png < à 1Mo</p>
                            </div>
                            <?php (isset($filesArr) && testUpload($fileArr)) ? showMsgs($filesArr) : ''; ?>
                            <button class="btn waves-effect waves-light blue darken-4" type="submit" name="action">Envoyer
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                    </form>
                </div>
                <div id="imgsPreview" class="card-image col s12 m6 l4">
                    <img class="responsive-img preview" src="img/no-image-placeholder-2.jpg">
                </div>
                <div class="card-action col s12">
                    <a class="blue-text text-darken-4 " href="dashboard.php">Dashboard</a>
                </div>
            </div>

            <?php } else { ?>
            
                <form action="" method="post" novalidate class="col s8  offset-s2">
                    <p><button class="btn waves-effect waves-light blue darken-4 btnDashboard" name="upload" type="submit">Upload image</button></p>
                    <p><button class="btn waves-effect waves-light blue darken-4 btnDashboard" name="galery" type="empty"><a href="galery.php">Voir la galerie</a></button></p>
                </form>
                <div class="card-action col s12">
                    <form action="deconnection.php" method="post" novalidate class="col s8">
                        <button class="blue-text text-darken-4" style="background: white; border: none;" name="deconnection" type="hidden"><a class="blue-text text-darken-4 btnDeco">Déconnection</a></button>
                    </form>
                </div>

            <?php } ?>

        
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="assets/uploadPreview.js"></script>
    <script>
        let totalGalerySize = <?= sizeGalery($imgGalery) ?>;
        if (totalGalerySize > 1000000) {
            totalGalerySize = Math.round(totalGalerySize / 1000000).toFixed(2) + ' Mo';
        } else {
            totalGalerySize = Math.round(totalGalerySize / 1000).toFixed(2) + ' ko';
        }
        document.getElementById('quota').innerText = totalGalerySize;
    </script>
</body>
</html>