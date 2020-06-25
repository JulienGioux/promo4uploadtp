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
    <title>TP Upload V2</title>
</head>

<body class="container">
    <div class="card row z-depth-3">
        <div class="col s12 pl0 pr0">
            <div class="blue darken-4 white-text pt20 pl20 pr20 pb20" id="headerForm">
                <h1>AllPix</h1>
                <p>Mise en pratique PHP : Upload d'images.</p>
                <h2 class="right-align"><?= (isset($_SESSION['name']) && !empty($_SESSION['name'])) ? $_SESSION['name'] : ''; ?></h2>
            </div>
            <form action="index.php" method="post" novalidate class="col s8  offset-s2">
                <div class="row">
                    <div class="input-field col s12">
                        <input value="<?= isset($_POST['login']) && empty($_POST['password']) ? $_POST['login'] : '' ?>" id="login" type="text" name="login" aria-describedby="login" pattern="<?= substr($regexLogin, 1, -1) ?>" class="<?= isset($_POST['login']) && !preg_match($regexLogin, $_POST['login']) && !preg_match($regexLogin, $_POST['password']) ? 'invalid' : 'validate' ?>" required>
                        <label for="login">Login<span class="red-text text-accent-4">*</span></label>
                        <span class="helper-text" data-error="<?= isset($_POST['login']) && empty($_POST['login']) ? 'Veuillez renseigner ce champ' : '' ?>"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input value="<?= isset($_POST['password']) && empty($_POST['login']) ? $_POST['password'] : '' ?>" id="password" pattern="<?= substr($regexLogin, 1, -1) ?>" type="password" name="password" aria-describedby="password" class="<?= isset($_POST['password']) && !preg_match($regexLogin, $_POST['login']) && !preg_match($regexLogin, $_POST['password']) ? 'invalid' : 'validate' ?>" required>
                        <label for="password">Password<span class="red-text text-accent-4">*</span></label>
                        <span class="helper-text" data-error="<?= isset($_POST['password']) && empty($_POST['password']) ? 'Veuillez renseigner ce champ' : '' ?>"></span>
                    </div>
                </div>
                <p class="helper-text red-text text-accent-4"><?= !empty($_POST['login']) && !empty($_POST['password']) ? $errorMessage : '' ?></p>
                <button class="btn waves-effect waves-light" name="button" type="submit">Connexion
                    <i class="material-icons right">send</i>
                </button>
            </form>
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