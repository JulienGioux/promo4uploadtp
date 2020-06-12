<?php

function updateGalery() {
    $imgGalery = array_diff(scandir('img'), array('..', '.'));

    foreach($imgGalery as $img) {
        echo '<img class="col s4 responsive-img z-depth-2 materialboxed" src="img/'. $img .'">';
    }
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

    <div class="row">
        <h1>Galerie d'images</h1>
    </div>
    <div class="row">
            <?= updateGalery() ?>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="assets/uploadPreview.js"></script>
</body>

</html>