<aside class="col-md-3">
  <h3 class="naranja">CARRITO</h3>	
  <p class="blanco">Artículos: <?= $micarrito->getArticulosTotal(); ?></p>
  <p class="blanco">Importe: <?= $micarrito->getImporteTotal(); ?></p>
  <p><a href="indexcarrito.php" class="azulbold"><i class="fas fa-search"></i></a> | <a href="index.php?vaciar=ok" class="azulbold"><i class="fas fa-cart-arrow-down"></i></a></p>
  <hr> 

  <h4 class="naranja">SABOR DE ASTURIAS</h4>
    <div id="myCarousel2" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel2" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel2" data-slide-to="1"></li>
      <li data-target="#myCarousel2" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

      <div class="item active" class="imgpubli">
        <a href="indexarticulos.php?posicion=0&articulosPorPagina=6&idSubcat=1"><img src="img_publi/publi1.jpg" alt="campatorres" style="width:100%;">
        <div class="carousel-caption">
          <h3 class="negrobold">Mieles</h3>
          <p class="negrobold">¡Prueba nuestras mieles!</p>
        </div>
        </a>
      </div>

      <div class="item" class="imgpubli">
        <a href="indexarticulos.php?posicion=0&articulosPorPagina=6&idSubcat=3"><img src="img_publi/publi2.jpg" alt="Lis bonita" style="width:100%;">
        <div class="carousel-caption">
          <h3 class="rojobold">Dulces</h3>
          <p class="rojobold">¡Los mejores dulces!</p>
        </div>
        </a>
      </div>
    
      <div class="item" class="imgpubli">
        <a href="indexarticulos.php?posicion=0&articulosPorPagina=6&idSubcat=5"><img src="img_publi/publi3.jpg" alt="Dominos" style="width:100%;">
        <div class="carousel-caption">
          <h3 class="rojobold">¡Y mucho más!</h3>
          <p class="rojobold">cosméticos naturales, dietéticos...</p>
        </div>
      </div>
      </a>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel2" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel2" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</aside> 
  	
