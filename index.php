<?php

if (isset($_FILES['myImg'])) {

    $tempPath = $_FILES['myImg']['tmp_name'];
    $actualSize = $_FILES['myImg']['size'];
    $infoExtension = pathinfo($_FILES['myImg']['name']);
    $actualExtension = $infoExtension['extension'];
    $newName = uniqid('img_');
    $path = './img';

    $extensionAccepted = ['image/jpeg', 'image/jpg', 'image/png'];
    $sizeMax = '1000000';

    $i = 0;
    do {
        $i++;
        $newName = uniqid('img_');
    } while (file_exists($path . '/' . $newName . '.' . $actualExtension) && $i < 10);
    
    $mimeType = @getimagesize($tempPath);

    $extensionName = preg_split('[/]', $mimeType['mime']);

    if ($mimeType !== false && in_array($mimeType['mime'], $extensionAccepted) && $i < 10) {
        if ($actualSize <= $sizeMax) {
            $messageValid = 'le fichier ' . $infoExtension['filename'] . '.' . $extensionName[1] . ' a bien été uploadé';
            move_uploaded_file($tempPath, $path . '/' . $newName . '.' . $extensionName[1]);
        } else {
            $messageInvalid = 'Désolé, votre fichier doit faire moins de 1Mo';
        }
    } else {
        $messageInvalid = 'Votre fichier n\'est pas une image';
    }   
}

var_dump($mimeType);
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
                    <form action="index.php" method="post" enctype="multipart/form-data">
                        <div class="file-field input-field">
                            <p>Veuillez choisir une image :</p>
                            <div class="btn">
                                <span>File</span>
                                <input type="file" id="myImg" name="myImg" data-preview=".preview">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>
                        <p><?= (isset($messageValid))? $messageValid : '' ?>
                        <?= (isset($messageInvalid))? $messageInvalid . '<br>' . 'Votre fichier n\'a pas été uploadé' : '' ?></p>
                        <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                            <i class="material-icons right">send</i>
                        </button>
                    </form>
                </div>
                <div class="card-image">
                    <img class="preview" src="img/no-image-placeholder-2.jpg">
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="assets/uploadPreview.js"></script>
</body>

</html>