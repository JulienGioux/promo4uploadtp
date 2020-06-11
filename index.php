<?php
    var_dump($_FILES);
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
    <title>TP Upload</title>
</head>
<body>
    <div class="row">
        <div class="col s12 m10 offset-m1">
            <h2 class="header">Module d'enregistrement d'images.</h2>
            <p>Mise en pratique PHP : Upload d'images.</p>
            <div class="card horizontal">
                <div class="card-stacked">
                <form action="index.php"  method="post" enctype="multipart/form-data">
                    <div class="file-field input-field">
                        <p>Veuillez choisir une image :</p>
                        <div class="btn">
                            <span>File</span>
                            <input type="file" id="imgUpload" name="imgUpload" data-preview=".preview">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                    </div>
                    <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                        <i class="material-icons right">send</i>
                    </button>
                </form>
                </div>
                <div class="card-image">
                    <img class="preview" src="img/capture01.png">
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="assets/uploadPreview.js"></script>
</body>
</html>