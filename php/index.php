<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sobre nós</title>
  <link href="../css/sobrenos.css" type="text/css" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">

</head>

<body>
  <header>
    <div class="esq">
      <div class="pqp">
        <nav role="navigation">
          <div id="menuToggle">


            <input type="checkbox" />

            <span></span>
            <span></span>
            <span></span>

            <ul id="menu">
            <a href="cadastro.html"><li>Cadastro</li></a>
            <a href="pacotes.php"><li>Pacotes</li></a>
            <a href="#"><li>Suporte</li></a>
            </ul>
          </div>
        </nav>

      </div>
      <div class="pqp_direita">
        <h1>
          Trailermarine
        </h1>
      </div>

    </div>
    <div class="dir">
      <a href="../php/pacotes.php"><img src="../imagens/submariano.png"></a>
      <a href="../html/login.html"><img src="../imagens/icone (3).png" class="perfil"> </a>
    </div>
  </header>
  <!-- esses input são as imagens do carrosel, elas são visualizadas atravez do checked, ou seja onde o checked estiver é onde vai mostrar-->
  <div class="carousel">
    <ul class="slides">
      <input type="radio" name="radio-buttons" id="img-1" checked />
      <li class="slide-container">
        <div class="slide-image">
          <img src="../imagens/submaras.jpg">
        </div>
        <div class="carousel-controls">
          <label for="img-3" class="prev-slide">
            <span>&lsaquo;</span>
          </label>
          <label for="img-2" class="next-slide">
            <span>&rsaquo;</span>
          </label>
        </div>
      </li>
      <input type="radio" name="radio-buttons" id="img-2" />
      <li class="slide-container">
        <div class="slide-image">
          <img src="../imagens/quarto.webp">
        </div>
        <div class="carousel-controls">
          <label for="img-1" class="prev-slide">
            <span>&lsaquo;</span>
          </label>
          <label for="img-3" class="next-slide">
            <span>&rsaquo;</span>
          </label>
        </div>
      </li>
      <input type="radio" name="radio-buttons" id="img-3" />
      <li class="slide-container">
        <div class="slide-image">
          <img src="../imagens/submariiano.jpg">
        </div>
        <div class="carousel-controls">
          <label for="img-2" class="prev-slide">
            <span>&lsaquo;</span>
          </label>
          <label for="img-1" class="next-slide">
            <span>&rsaquo;</span>
          </label>
        </div>
      </li>
      <div class="carousel-dots">
        <label for="img-1" class="carousel-dot" id="img-dot-1"></label>
        <label for="img-2" class="carousel-dot" id="img-dot-2"></label>
        <label for="img-3" class="carousel-dot" id="img-dot-3"></label>
      </div>
    </ul>
  </div>

  <div class="sobrenoz">

    <div class="sobrevos">
      <h1>Sobre Nós</h1>

    </div>
    <div class="texto">
      Bem-vindo à "Trailermarine", a sua porta de entrada para o mundo submarino! Como uma empresa de viagens de submarino inovadora, nós oferecemos uma experiência única e emocionante de turismo subaquático.

    </div>
  </div>

  </div>
  <div>

</body>

</html>