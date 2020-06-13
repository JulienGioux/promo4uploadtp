<?php
define('MAX_UPLOAD_SIZE', '2000000');
define('IMG', 'img/');
define('ACCEPTED_MIME', array('image/jpeg', 'image/jpg', 'image/png'));
function rearrange($arr){
    foreach( $arr as $key => $all ){
        foreach( $all as $i => $val ){
            $new[$i][$key] = $val;   
        }   
    }
    return $new;
}

function testUpload($fileArr) {
    if (empty($fileArr['tmp_name'] 
    && $_SERVER['REQUEST_URI'] == $_SERVER['SCRIPT_NAME'] 
    && $_SERVER['REQUEST_METHOD'] == 'POST'))
    {
        $test = FALSE;
    } else {
        $test = TRUE;
    }
    return $test;
}

function testFileSize($fileArr) {
    if (MAX_UPLOAD_SIZE == $_POST['MAX_FILE_SIZE']) {
        if (MAX_UPLOAD_SIZE > $fileArr['size'] && $fileArr['size'] > 0) {
            $msg = [TRUE, 'Le fichier ne dépasse pas ' . MAX_UPLOAD_SIZE / 1000000 . ' Mo.'];
        } elseif ($fileArr['size'] == 0){
            $msg = [FALSE, 'Erreur: la taille du fichier est null'];
        } else {
            $msg = [FALSE, 'Erreur: Votre image dépasse les ' . MAX_UPLOAD_SIZE / 1000000 . ' Mo.'];
        }
    } else {
        $msg = [FALSE, 'Erreur: La taille maximum du fichier n\'est pas correctement défini'];
    }
    return $msg; // [BOOL, MSG]
}

function testMime($fileArr) {
    $fileMime = mime_content_type($fileArr['tmp_name']);
    if (in_array($fileMime, ACCEPTED_MIME)){
        $msg = [TRUE, 'Le fichier ' . $fileArr['name'] . ' est une image valide', $fileMime];
    } else {
        $msg = [FALSE, 'Le fichier ' . $fileArr['name'] . ' n\'a pas un format valide', $fileMime];
    }
    return $msg; // [BOOL, MSG, Mime/Type]
}

if (isset($_FILES['myImg']) 
&& count($_FILES['myImg']['tmp_name']) > 0 
&& $_SERVER['REQUEST_URI'] == $_SERVER['SCRIPT_NAME'] 
&& $_SERVER['REQUEST_METHOD'] == 'POST') 
{
    $filesArr = rearrange($_FILES['myImg']);
    foreach ($filesArr as $key => $fileArr) {
        if (testUpload($fileArr)) {
            $mvTest = FALSE;
            $filesArr[$key] += ['testFileSize' => testFileSize($fileArr)[0],
                        'msgFileSize' => testFileSize($fileArr)[1],
                        'testMime' => testMime($fileArr)[0],
                        'msgMime' => testMime($fileArr)[1],
                        'mime' => testMime($fileArr)[2]];
            if ($filesArr[$key]['testFileSize'] && $filesArr[$key]['testMime']){
                $mimeExt = preg_split('[/]', $filesArr[$key]['mime']);               
                do {
                    $newID = uniqid('img_');
                    $newName = $newID . '.' . $mimeExt[1];
                } while (file_exists(IMG . $newName));
                move_uploaded_file($filesArr[$key]['tmp_name'], IMG . $newName);
            }
        }
    }
}

function showMsgs ($filesArr) {
    foreach ($filesArr as $key => $value) {
        if ($value['testFileSize'] && $value['testMime']){
            echo '<p class="light-green-text text-darken-1">';
            echo $value['name'] . ' : ' . $value['msgFileSize'];
            echo '<br>';
            echo $value['msgMime'] . ' et a bien été téléchargé.';
            echo '</p>';
        } else {
            echo '<p class="red-text text-accent-4">';
            echo $value['name'] . ' : ' . $value['msgFileSize'];
            echo '<br>';
            echo $value['msgMime'] . ' Télechargement abandonné';
            echo '</p>';
        }      
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
    <title>TP Upload</title>
</head>

<body class="container">
    <div class="card row z-depth-3">
        <div class="col s12 pl0 pr0">
            <div class="blue darken-4 white-text pt20 pl20 pr20 pb20" id="headerForm">
                <h1>Module d'enregistrement d'images.</h1>
                <p>Mise en pratique PHP : Upload d'images.</p>
            </div>
            <div class="row pl10 pr10">
                <div class="card-stacked col s12 m6 l8">
                    <form action="index.php" method="post" enctype="multipart/form-data">
                        <div class="file-field input-field">
                            <p>Veuillez choisir une image :</p>
                            <div class="btn blue darken-4 btn-floating pulse">
                                <span>File</span>
                                <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
                                <input type="file" multiple id="myImg" name="myImg[]" data-preview=".preview">
                                
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
                <div class="card-image col s12 m6 l4">
                    <img class="responsive-img preview" src="img/no-image-placeholder-2.jpg">
                </div>
                <div class="card-action col s12">
                    <a href="galery.php">Voir la galerie</a>
                    <?php (isset($filesArr) && testUpload($fileArr)) ? showMsgs($filesArr) : ''; ?>
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="assets/uploadPreview.js"></script>
</body>
</html>