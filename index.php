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

    $i = 10;
    do {
        $i++; //protection
        $newName = uniqid('img_');
    } while (file_exists($path . '/' . $newName . '.' . $actualExtension) && $i < 10);



    if ($actualSize <= $sizeMax && $_FILES['myImg']['size'] > 0) {
        $mimeType = getimagesize($tempPath);       
        if ($mimeType !== false && in_array($mimeType['mime'], $extensionAccepted) && $i < 10) {
            $extensionName = preg_split('[/]', $mimeType['mime']);
            $messageValid = 'Le fichier ' . $infoExtension['filename'] . '.' . $extensionName[1] . ' a bien été uploadé';
            move_uploaded_file($tempPath, $path . '/' . $newName . '.' . $extensionName[1]);
        } else {
            $messageInvalid = 'Votre fichier n\'est pas une image';
           
        }
    } else {
        $messageInvalid = 'Désolé, votre fichier doit faire moins de 1Mo';
    }

} else {
    $messageInvalid = 'Désolé, votre fichier n\'est pas conforme';
}
if ($i >= 10) {
    $messageInvalid = 'Le serveur a rencontrer un problème';
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
    <title>TP Upload</title>
</head>

<body class="container">
    <div class="row">
        <div class="col s12">
            <div class="indigo lighten-5" id="headerForm">
                <h1>Module d'enregistrement d'images.</h1>
                <p>Mise en pratique PHP : Upload d'images.</p>
            </div>
            <div class="card horizontal">
                <div class="card-stacked col s12">
                    <form action="index.php" method="post" enctype="multipart/form-data">
                        <div class="file-field input-field">
                            <p>Veuillez choisir une image :</p>
                            <div class="btn">
                                <span>File</span>
                                <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
                                <input type="file" id="myImg" name="myImg" data-preview=".preview">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>
                        <p class="light-green-text text-darken-1"><?= (isset($messageValid))? $messageValid : '' ?></p>
                        <p class="red-text text-accent-4"><?= (isset($messageInvalid))? $messageInvalid . '<br>' . 'Votre fichier n\'a pas été uploadé' : '' ?></p>
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