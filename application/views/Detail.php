<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
  <meta name="description" content="A well made and handcrafted Bootstrap 5 template">
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo site_url('assets/img/apple-touch-icon.png'); ?>">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo site_url('assets/img/favicon-32x32.png'); ?>">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo site_url('assets/img/favicon-16x16.png');?>">
  <link rel="icon" type="image/png" sizes="96x96" href="<?php echo site_url('assets/img/favicon.png'); ?>">
  <meta name="author" content="Holger Koenemann">
  <link rel="stylesheet" href="assets/css/theme.min.css">
  <meta name="generator" content="Eleventy v2.0.0">
  <meta name="HandheldFriendly" content="true">
    <title><?php foreach($Detail as $row){ echo $row['titre'];} ?></title>
    <link rel="stylesheet" href="<?php echo site_url('assets/css/theme.min.css');?>">
 
   <style>

/* inter-300 - latin */
@font-face {
  font-family: 'Inter';
  font-style: normal;
  font-weight: 300;
  font-display: swap;
  src: local(''),
       url('fonts/inter-v12-latin-300.woff2') format('woff2'), /* Chrome 26+, Opera 23+, Firefox 39+ */
       url('fonts/inter-v12-latin-300.woff') format('woff'); /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
}

/* inter-400 - latin */
@font-face {
  font-family: 'Inter';
  font-style: normal;
  font-weight: 400;
  font-display: swap;
  src: local(''),
       url('fonts/inter-v12-latin-regular.woff2') format('woff2'), /* Chrome 26+, Opera 23+, Firefox 39+ */
       url('fonts/inter-v12-latin-regular.woff') format('woff'); /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
}

@font-face {
  font-family: 'Inter';
  font-style: normal;
  font-weight: 500;
  font-display: swap;
  src: local(''),
       url('fonts/inter-v12-latin-500.woff2') format('woff2'), /* Chrome 26+, Opera 23+, Firefox 39+ */
       url('fonts/inter-v12-latin-500.woff') format('woff'); /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
}
@font-face {
  font-family: 'Inter';
  font-style: normal;
  font-weight: 700;
  font-display: swap;
  src: local(''),
       url('fonts/inter-v12-latin-700.woff2') format('woff2'), /* Chrome 26+, Opera 23+, Firefox 39+ */
       url('fonts/inter-v12-latin-700.woff') format('woff'); /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
}

</style>


</head>
  <body class="bg-black text-white mt-0" data-bs-spy="scroll" data-bs-target="#navScroll">

  <nav id="navScroll" class="navbar navbar-dark bg-black fixed-top px-vw-5" tabindex="0">
    <div class="container">
      <a class="navbar-brand pe-md-4 fs-4 col-12 col-md-auto text-center" href="index.html">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-stack" viewBox="0 0 16 16">
          <path d="m14.12 10.163 1.715.858c.22.11.22.424 0 .534L8.267 15.34a.598.598 0 0 1-.534 0L.165 11.555a.299.299 0 0 1 0-.534l1.716-.858 5.317 2.659c.505.252 1.1.252 1.604 0l5.317-2.66zM7.733.063a.598.598 0 0 1 .534 0l7.568 3.784a.3.3 0 0 1 0 .535L8.267 8.165a.598.598 0 0 1-.534 0L.165 4.382a.299.299 0 0 1 0-.535L7.733.063z" />
          <path d="m14.12 6.576 1.715.858c.22.11.22.424 0 .534l-7.568 3.784a.598.598 0 0 1-.534 0L.165 7.968a.299.299 0 0 1 0-.534l1.716-.858 5.317 2.659c.505.252 1.1.252 1.604 0l5.317-2.659z" />
        </svg>
        <span class="ms-md-1 mt-1 fw-bolder me-md-5">IA ODC</span>
      </a>

      <ul class="navbar-nav mx-auto mb-2 mb-lg-0 list-group list-group-horizontal">
        <li class="nav-item">
          <a class="nav-link fs-5" href="<?php echo site_url('Mycontroller/index') ?>" aria-label="Homepage">
            Home
          </a>
        </li>
        <li class="nav-item">        
        </li>
        <li class="nav-item">
          <a class="nav-link fs-5" href="#1" aria-label="A system message page">
            
          </a>
        </li>

      </ul>
      <a href="<?php echo site_url('Mycontroller/Ajoutarticle'); ?>" aria-label="Download this template" class="btn btn-outline-light">      
      </a>
    </div>
  </nav>


  <main>
      <div class="container">
  <div class="row d-flex justify-content-center py-vh-5 pb-0">
  <?php foreach($Detail as $row){ ?>
    <div class="col-12 col-lg-10 col-xl-8">
      <div class="row">
        <div class="col-12">
          <h1 class="display-1 fw-bold"><?php echo $row['titre']; ?>
          <h4 class="card-subtitle mb-2"><strong>Categorie : </strong><?php echo $row['categorie']; ?></h4>

            </h1><br><hr>
            <span class="fs-4"></span>
          <br><?php echo $row['Contenu']; ?>
          </p>    
          <br>
  </br>
          
      <div class="card bg-transparent mb-5" data-aos="zoom-in-up">
        <div class="bg-dark shadow rounded-5 p-0">       
      <img src="<?php echo 'https://valiah-referencement-backoffice.tsangana.com/assets/img/'.$this->db->escape_str($row['photo_name']);?>" alt="abstract image" class="img-fluid position-relative rounded-5 shadow" data-aos="zoom-up">
        
      </div>
    </div>   

        </div>
      </div>
    </div>
    <div class="row">   
   
    </div>
        <div class="col-12 col-lg-10 col-xl-8">
      <div class="row d-flex align-items-start" data-aos="fade-right">
        <div class="col-12 col-lg-7">
          <h2 class="h3 mt-5 border-top pt-5">Resumé : </h2>
          <p class="text-secondary"><?php echo $row['resume']; ?></p>
        </div>
        <div class="col-12 col-lg-4 offset-lg-1 bg-gray-900 p-5 mt-5">
          <h3 class="h6"></h3>
          <p class="text-secondary">
          <?php echo $row['categorie']; ?>
          </p>
        </div>
      </div>
      
    </div>
    <?php } ?>
  </div>
      </div>
  </main>




            <footer class="bg-black border-top border-dark">
  <div class="container py-vh-4 text-secondary fw-lighter">
    <div class="row">
      <div class="col-12 col-lg-5 py-4 text-center text-lg-start">
            <a class="navbar-brand pe-md-4 fs-4 col-12 col-md-auto text-center" href="index.html">
  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-stack" viewBox="0 0 16 16">
    <path d="m14.12 10.163 1.715.858c.22.11.22.424 0 .534L8.267 15.34a.598.598 0 0 1-.534 0L.165 11.555a.299.299 0 0 1 0-.534l1.716-.858 5.317 2.659c.505.252 1.1.252 1.604 0l5.317-2.66zM7.733.063a.598.598 0 0 1 .534 0l7.568 3.784a.3.3 0 0 1 0 .535L8.267 8.165a.598.598 0 0 1-.534 0L.165 4.382a.299.299 0 0 1 0-.535L7.733.063z"/>
    <path d="m14.12 6.576 1.715.858c.22.11.22.424 0 .534l-7.568 3.784a.598.598 0 0 1-.534 0L.165 7.968a.299.299 0 0 1 0-.534l1.716-.858 5.317 2.659c.505.252 1.1.252 1.604 0l5.317-2.659z"/>
  </svg>
  <span class="ms-md-1 mt-1 fw-bolder me-md-5">IA ODC</span>
</a>

      </div>
      <div class="col border-end border-dark">
        <span class="h6">Company</span>
<ul class="nav flex-column">
  <li class="nav-item">
    <a href="#" class="link-fancy link-fancy-light">Contact</a>
  </li>
  <li class="nav-item">
    <a href="#" class="link-fancy link-fancy-light">Legal</a>
  </li>

  <li class="nav-item">
    <a href="#" class="link-fancy link-fancy-light">Doc</a>
  </li>
</ul>
      </div>
      <div class="col border-end border-dark">
                <span class="h6">Services</span>
                <ul class="nav flex-column">
                  <li class="nav-item">
                    <a href="#" class="link-fancy link-fancy-light">Documentation</a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="link-fancy link-fancy-light">Products</a>
                  </li>

                  <li class="nav-item">
                    <a href="#" class="link-fancy link-fancy-light"></a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="link-fancy link-fancy-light"></a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="link-fancy link-fancy-light"></a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="link-fancy link-fancy-light">More</a>
                  </li>
                </ul>
      </div>
      <div class="col">
                <span class="h6">Support</span>
                <ul class="nav flex-column">
                  <li class="nav-item">
                    <a href="#" class="link-fancy link-fancy-light">A propos</a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="link-fancy link-fancy-light">Legal</a>
                  </li>

                  <li class="nav-item">
                    <a href="#" class="link-fancy link-fancy-light"></a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="link-fancy link-fancy-light">Contact</a>
                  </li>
                </ul>
      </div>
    </div>
  </div>
  
</footer>


<script src="<?php echo site_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/js/aos.js'); ?>"></script>
<script>
AOS.init({
 duration: 800, // values from 0 to 3000, with step 50ms
});
</script>
<script>
  let scrollpos = window.scrollY
  const header = document.querySelector(".navbar")
  const header_height = header.offsetHeight

  const add_class_on_scroll = () => header.classList.add("scrolled", "shadow-sm")
  const remove_class_on_scroll = () => header.classList.remove("scrolled", "shadow-sm")

  window.addEventListener('scroll', function() {
    scrollpos = window.scrollY;

    if (scrollpos >= header_height) { add_class_on_scroll() }
    else { remove_class_on_scroll() }

    console.log(scrollpos)
  })
</script>


</body>
</html>