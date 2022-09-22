<?php

// Voila notre fichier de base qui sera tout le temps utilisé

?>

<html lang="en" coupert-item="9AF8D9A4E502F3784AD24272D81F0381"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Album example · Bootstrap v5.1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
  <style>
        @font-face{
            font-family: 'Circular'; 
            font-weight: 400;
            src: url(chrome-extension://mfidniedemcgceagapgdekdbmanojomk/font/Circular-Pro-Black-Regular.eot);
            src: url(chrome-extension://mfidniedemcgceagapgdekdbmanojomk/font/Circular-Pro-Black-Regular.eot?#iefix) format('embedded-opentype'),
                url(chrome-extension://mfidniedemcgceagapgdekdbmanojomk/font/Circular-Pro-Black-Regular.woff2) format('woff2'),
                url(chrome-extension://mfidniedemcgceagapgdekdbmanojomk/font/Circular-Pro-Black-Regular.woff) format('woff'),
                url(chrome-extension://mfidniedemcgceagapgdekdbmanojomk/font/Circular-Pro-Black-Regular.ttf) format('truetype'),
                url(chrome-extension://mfidniedemcgceagapgdekdbmanojomk/font/Circular-Pro-Black-Regular.svg) format('svg');
        }
        @font-face{
            font-family: 'Circular'; 
            font-weight: 700;
            src: url(chrome-extension://mfidniedemcgceagapgdekdbmanojomk/font/Circular-Pro-Black-Bold.eot);
            src: url(chrome-extension://mfidniedemcgceagapgdekdbmanojomk/font/Circular-Pro-Black-Bold.eot?#iefix) format('embedded-opentype'),
                url(chrome-extension://mfidniedemcgceagapgdekdbmanojomk/font/Circular-Pro-Black-Bold.woff2) format('woff2'),
                url(chrome-extension://mfidniedemcgceagapgdekdbmanojomk/font/Circular-Pro-Black-Bold.woff) format('woff'),
                url(chrome-extension://mfidniedemcgceagapgdekdbmanojomk/font/Circular-Pro-Black-Bold.ttf) format('truetype'),
                url(chrome-extension://mfidniedemcgceagapgdekdbmanojomk/font/Circular-Pro-Black-Bold.svg) format('svg');
        }
    </style></head>
  <body style="">
    
<header>
  <div class="bg-dark collapse" id="navbarHeader" style="">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          <h4 class="text-white">About</h4>
          <p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
        </div>
        <div class="col-sm-4 offset-md-1 py-4">
          <h4 class="text-white">Contact</h4>
          <ul class="list-unstyled">
            <li><a href="#" class="text-white">Follow on Twitter</a></li>
            <li><a href="#" class="text-white">Like on Facebook</a></li>
            <li><a href="#" class="text-white">Email me</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container">
      <a href="#" class="navbar-brand d-flex align-items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
        <strong>LiveCoding MVC</strong>
      </a>
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
</header>

<main>


<?php 
//Maintenant en fonction des vues antérieurs nous allons afficher ou non les bloc envoyés

if(!empty($loopBooks)){
    echo $loopBooks;
}
if(!empty($single)){
    echo $single;
}
?>

</main>

<footer class="text-muted py-5">
  <div class="container">
    <p class="float-end mb-1">
      <a href="#">Back to top</a>
    </p>
    <p class="mb-1">Album example is © Bootstrap, but please download and customize it for yourself!</p>
    <p class="mb-0">New to Bootstrap? <a href="/">Visit the homepage</a> or read our <a href="/docs/5.1/getting-started/introduction/">getting started guide</a>.</p>
  </div>
</footer>


    <script src="/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

      
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body><div id="9d80bb1d-18dc-4d2d-89f9-3782ab1d7801" style="display: block !important; z-index: 2147483647 !important;"></div></html>