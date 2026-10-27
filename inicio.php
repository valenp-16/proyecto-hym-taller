<?php
session_start();

if (!isset($_SESSION["usuario_id"])) {
    header("Location: registrarse.html");
    exit;
}
?>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>MYH-Aromas y Bienestar</title>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     
  <link rel="stylesheet" href="style1.css">
  <style>
  </style>
</head>
<body>
  <div class="page-container" style="background-image: url(imagenes/imagen.fondo.png);">
   <header class="site-header">
    <div class="container header-inner">
      <div class="logo">
          <img src="imagenes/logo.jpeg" alt="Logo M&H">
    </div>
    <div class="search-box">
          <span class="search-icon">🔍</span>
          <input type="text"  placeholder="Buscar...">
    </div>
    <div class="header-icons">
      <div class="dropdown">
        <input type="checkbox" id="menu-toggle" class="menu-checkbox">
          <label for="menu-toggle" class="btn-icon">☰</label>
          <div class="dropdown-menu">
            <ul>
              <li class="menu-category">Sahumerios
                <ul>
                  <li><a href="#sagrada-madre">Sagrada madre</a></li>
                  <li><a href="#rituales">Rituales</a></li>
                </ul>
              </li>
              <li class="menu-category">Fragancias
                <ul>
                  <li><a href="#textiles">Textiles</a></li>
                  <li><a href="#ambientes">De ambientes</a></li>
                  <li><a href="#autos">Para autos</a></li>
                </ul>
              </li>
              <li class="menu-category">Humidificadores
                <ul>
                  <li><a href="#esencias">Esencias</a></li>
                </ul>
              </li>
              <li class="menu-category"><a href="#lamparas" class="category-link">Lamparas</a></li>
            </ul>
          </div>
      </div>
          <button class="btn-icon">🛒</button>
  </div>
   </header>
    <main class="container">
      <h2 class="title">Algunos de nuestros productos de bienestar</h2>
      
<div class="products-grid">

  <a href="sahumerios.html" class="product-card">
    <div class="image-container">
      <img src="imagenes/sahumerios.webp" alt="Sahumerios">
    </div>
    <h3 class="product-title">Sahumerios</h3>
    <p>Descubrí nuestros aromas.</p>
    <span class="ver-mas">Ver categoría →</span>
  </a>

  <a href="humidificadores.html" class="product-card">
    <div class="image-container">
      <img src="imagenes/humidificadores.webp" alt="Humidificadores">
    </div>
    <h3 class="product-title">Humidificadores</h3>
    <p>Creá un ambiente de bienestar.</p>
    <span class="ver-mas">Ver categoría →</span>
  </a>

  <a href="fragancias.html" class="product-card">
    <div class="image-container">
      <img src="imagenes/fragancias.jpg" alt="Fragancias">
    </div>
    <h3 class="product-title">Fragancias</h3>
    <p>Perfumes para tus espacios.</p>
    <span class="ver-mas">Ver categoría →</span>
  </a>
</div>
      </div> 
      </main>
  </div>
  <div class="cerrar-sesion">
  <a href ="api/logout.php">Cerrar sesion</a>
</div>
</body>
</html>