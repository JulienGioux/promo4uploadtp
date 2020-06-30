<?php
session_start();
require_once 'my-config.php';
if (isset($_SESSION['name']) && $_SESSION['name'] == 'admin') {
    header('Location: dashboard.php');
}
if (isset($_SESSION['name']) && $_SESSION['name'] == 'guest') {
    header('Location: galery.php');
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
    <title>TP Upload V2</title>
</head>

<body class="container">
    <div class="card row z-depth-3">
        <div class="col s12 pl0 pr0">
            <div class="blue darken-4 white-text pt20 pl20 pr20 pb20" id="headerForm">
                <div class="center-align"><img src="assets\img\logo200x200White.png" alt="Logo AllPix" class="logopng"></div>
            </div>
            <form action="" method="post"  class="col s8  offset-s2">
                <p class="helper-text red-text text-accent-4"><?= !empty($_POST['login']) && !empty($_POST['password']) ? $errorMessage : '' ?></p>
                <div class="row">
                    <div class="input-field col s6 offset-s3">
                        <input value="<?= isset($_POST['login']) && empty($_POST['password']) ? $_POST['login'] : '' ?>" id="login" type="text" name="login" aria-describedby="login" pattern="<?= substr($regexLogin, 1, -1) ?>" class="<?= isset($_POST['login']) && !preg_match($regexLogin, $_POST['login']) && !preg_match($regexLogin, $_POST['password']) ? 'invalid' : 'validate' ?>" required>
                        <label for="login">Login<span class="red-text text-accent-4">*</span></label>
                        <span class="helper-text" data-error="<?= isset($_POST['login']) && empty($_POST['login']) ? 'Veuillez renseigner ce champ' : '' ?>"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6 offset-s3">
                        <input value="<?= isset($_POST['password']) && empty($_POST['login']) ? $_POST['password'] : '' ?>" id="password" pattern="<?= substr($regexLogin, 1, -1) ?>" type="password" name="password" aria-describedby="password" class="<?= isset($_POST['password']) && !preg_match($regexLogin, $_POST['login']) && !preg_match($regexLogin, $_POST['password']) ? 'invalid' : 'validate' ?>" required>
                        <label for="password">Password<span class="red-text text-accent-4">*</span></label>
                        <span class="helper-text" data-error="<?= isset($_POST['password']) && empty($_POST['password']) ? 'Veuillez renseigner ce champ' : '' ?>"></span>
                    </div>
                </div>
                <button class="btn waves-effect waves-light blue darken-4" id="btnIndex" name="button" type="submit">Connexion
                    <i class="material-icons right">send</i>
                </button>
            </form>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="assets/uploadPreview.js"></script>
</body>
</html>