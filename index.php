<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="./assets/styles/style.css" />
  <title>Pagina principal</title>
</head>

<body>
  <?php require('components/navbar.php') ?>
  <div class="container-home">
    <div class="carrusel">
      <img src="./assets/img/Carretera-hero.jpg" alt="..." />
    </div>
    <div class="services-title">
      <h1>Servicios</h1>
    </div>
    <div class="container-services">
      <div class="card">
        <div class="img-card">
          <img src="./assets/img/card1.jpg" alt="..." />
        </div>
        <div>
          <h3>Cambio de bateria</h3>
        </div>
      </div>
      <div class="card">
        <div class="img-card">
          <img src="./assets/img/card2.jpg" alt="..." />
        </div>
        <div>
          <h3>Cambio de aceite</h3>
        </div>
      </div>
      <div class="card">
        <div class="img-card">
          <img src="./assets/img/card3.jpg" alt="..." />
        </div>
        <div>
          <h3>Tecnicomecanica</h3>
        </div>
      </div>
    </div>
    <div class="brands">
      <h1>Marcas</h1>
      <div class="brand-img">
        <div>
          <img height="100px" width="100px" src="./assets/img/chrevrolet_brand.png" alt="..." />
          <p>Chevrolet</p>
        </div>
        <div>
          <img height="100px" width="100px" src="./assets/img/ford_brand.png" alt="..." />
          <p>Ford</p>
        </div>
        <div>
          <img height="100px" width="100px" src="./assets/img/hyundai_brand.png" alt="..." />
          <p>Hyundai</p>
        </div>
        <div>
          <img height="100px" width="100px" src="./assets/img/honda_logo.png" alt="..." />
          <p>Honda</p>
        </div>
      </div>
      <div class="brand-img">
        <div>
          <img height="100px" width="100px" src="./assets/img/mazda_brand.png" alt="..." />
          <p>Mazda</p>
        </div>
        <div>
          <img height="100px" width="100px" src="./assets/img/nissan_brand.png" alt="..." />
          <p>Nissan</p>
        </div>
        <div>
          <img height="100px" width="100px" src="./assets/img/renault_brand.png" alt="..." />
          <p>Renault</p>
        </div>
        <div>
          <img height="100px" width="100px" src="./assets/img/toyota_brand.png" alt="..." />
          <p>Toyota</p>
        </div>
      </div>
    </div>
  </div>
  <footer class="footer">
    <div>
      <h2>hola mundo</h2>
    </div>
    <div>
      <h2>hola mundo</h2>
    </div>
    <div>
      <h2>hola mundo</h2>
    </div>
  </footer>
</body>

</html>