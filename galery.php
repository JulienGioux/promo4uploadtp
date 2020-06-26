<?php

session_start();
var_dump($_SESSION);

function updateGalery() {
    $imgGalery = array_diff(scandir('img'), array('..', '.'));

    foreach($imgGalery as $img) {
        // echo '<img class="headline materialboxed" src="img/'. $img .'">';
        echo
        '<figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
            <img src="img/'. $img .'" itemprop="thumbnail" class="imgGalery" alt="Image description" />
        <figcaption itemprop="caption description">Image caption</figcaption>
    </figure>';
        // '<div class="col s6 headline">
        //     <div class="card">
        //         <div class="card-image">
        //         <img class="responsive-img materialboxed" src="img/'. $img .'">
        //         </div>
        //     </div>
        // </div>';
    }
}
 
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/dist/photoswipe.css">
    <link rel="stylesheet" href="assets/dist/default-skin/default-skin.css">
    <link rel="stylesheet" href="assets/uploadPreview.css">
    <link rel="stylesheet" href="assets/style.css">
    <title>TP Upload - Galerie</title>
</head>

<body class="container">

    <div class="row">
        <h1>Galerie d'images</h1>
    </div>
    <div class="row">
    <div class="my-gallery" itemscope itemtype="http://schema.org/ImageGallery">





            <?= updateGalery() ?>
            </div>
    </div>




    


    <!-- Root element of PhotoSwipe. Must have class pswp. -->
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

    <!-- Background of PhotoSwipe. 
        It's a separate element as animating opacity is faster than rgba(). -->
    <div class="pswp__bg"></div>

    <!-- Slides wrapper with overflow:hidden. -->
    <div class="pswp__scroll-wrap">

        <!-- Container that holds slides. 
            PhotoSwipe keeps only 3 of them in the DOM to save memory.
            Don't modify these 3 pswp__item elements, data is added later on. -->
        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>

        <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
        <div class="pswp__ui pswp__ui--hidden">

            <div class="pswp__top-bar">

                <!--  Controls are self-explanatory. Order can be changed. -->

                <div class="pswp__counter"></div>

                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

                <button class="pswp__button pswp__button--share" title="Share"></button>

                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                <!-- Preloader demo https://codepen.io/dimsemenov/pen/yyBWoR -->
                <!-- element will get class pswp__preloader--active when preloader is running -->
                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                    <div class="pswp__preloader__cut">
                        <div class="pswp__preloader__donut"></div>
                    </div>
                    </div>
                </div>
            </div>

            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div> 
            </div>

            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
            </button>

            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
            </button>

            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>

        </div>

    </div>

    </div>





    
    <script src="assets/dist/photoswipe.min.js"></script>
    <script src="assets/dist/photoswipe-ui-default.min.js"></script> 
    <script>


        let galery = document.querySelectorAll('.imgGalery');
        console.log(galery);

        var openPhotoSwipe = function() {

        var pswpElement = document.querySelectorAll('.pswp')[0];

        // build items array
        var items = [
            {
                src: 'https://placekitten.com/600/400',
                w: 600,
                h: 400
            },
            {
                src: 'https://placekitten.com/1200/900',
                w: 1200,
                h: 900
            }
        ];

        // define options (if needed)
        var options = {
            // optionName: 'option value'
            // for example:
            index: 0 // start at first slide
        };

        // Initializes and opens PhotoSwipe
        var gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);
        gallery.init();
        };

        openPhotoSwipe();

        for (i = 0; i <= galery.length; i++) {
            galery[i].onclick = openPhotoSwipe;
        }

        // document.getElementById('btn').onclick = openPhotoSwipe; 

    </script>
</body>

</html>