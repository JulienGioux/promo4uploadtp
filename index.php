<?php

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
    <title>TP Upload V2</title>
</head>

<body class="container">
    <div class="card row z-depth-3">
        <div class="col s12 pl0 pr0">
            <div class="blue darken-4 white-text pt20 pl20 pr20 pb20" id="headerForm">
                <h1>AllPix</h1>
                <p>Mise en pratique PHP : Upload d'images.</p>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input value="<?= isset($_POST['lastName']) ? htmlspecialchars($_POST['lastName']) : '' ?>" id="lastName" type="text" name="lastName" aria-describedby="lastName" pattern="<?= substr($regexString, 1, -1) ?>" class="<?= isset($_POST['lastName']) && !$checkLastName ? 'invalid' : 'validate' ?>" required>
                    <label for="lastName">Login<span class="red-text text-accent-4">*</span></label>
                    <!-- <span class="helper-text" data-error="<?= isset($_POST['lastName']) && !$checkLastName ? 'Veuillez renseigner ce champ. Ex: Dupont' : '' ?>"></span> -->
                    <span class="helper-text" data-error="<?= isset($_POST['button']) && empty($_POST['lastName']) && !preg_match($regexString, $_POST['lastName']) ? 'Veuillez renseigner ce champ' : 'Veuillez renseigner ce champ. Ex: Dupont' ?>"></span>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input value="<?= isset($_POST['firstName']) ? htmlspecialchars($_POST['firstName']) : '' ?>" id="firstName" pattern="<?= substr($regexString, 1, -1) ?>" type="text" name="firstName" aria-describedby="firstName" class="<?= isset($_POST['firstName']) && !$checkFirstName ? 'invalid' : 'validate' ?>" required>
                    <label for="firstName">Password<span class="red-text text-accent-4">*</span></label>
                    <span class="helper-text" data-error="<?= isset($_POST['firstName']) && !$checkFirstName ? (empty($_POST['firstName']) ? 'Veuillez renseigner ce champ' : 'Veuillez respecter le format. Ex: Jean') : '' ?>"></span>
                </div>
            </div>
            <button class="btn waves-effect waves-light" name="button" type="submit">Envoyer
                <i class="material-icons right">Connexion</i>
            </button>
            <!-- <div class="row pl10 pr10">
                <div class="card-stacked col s12 m6 l8">
                    <form action="index.php" method="post" enctype="multipart/form-data">
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
                            <button class="btn waves-effect waves-light blue darken-4" type="submit" name="action">Submit
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                    </form>
                </div>
                <div id="imgsPreview" class="card-image col s12 m6 l4">
                    <img class="responsive-img preview" src="img/no-image-placeholder-2.jpg">
                </div>
                <div class="card-action col s12">
                    <a href="galery.php">Voir la galerie</a>
                    <?php (isset($filesArr) && testUpload($fileArr)) ? showMsgs($filesArr) : ''; ?>
            </div> -->
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="assets/uploadPreview.js"></script>
</body>
</html>