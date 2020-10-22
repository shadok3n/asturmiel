<?php 
$idArticulo=$_REQUEST['idArticulo'];
$datos=Articulos::datosArticulo($idArticulo);
 ?>
<section class="col-md-6">
  <h1 class="naranja">Articulo: <?=$datos['nombreArticulo'] ?></h1>  	
  <div class="row">
    <div class="col-md-6">
     <h3 class="negrobold">Categoria: <?=$datos['nombreCategoria'] ?></h3>
  <h4 class="negrobold">Subategoria: <?=$datos['nombreSubcat'] ?></h4>
     <p class="negro"><?=$datos['descripcion'] ?></p>
     <p class="negrobold">Precio: <?=$datos['precio'] ?>€</p>
     <p class="negrobold">Stock: <?=$datos['stock'] ?></p>
     <a href="indexarticulo.php?idArticulo=<?=$datos['idArticulo'] ?>&alcarrito=ok"><i class="fas fa-cart-plus fa-3x"></i></a>
    </div>
	<div class="col-md-6">
    <img src="admin/<?=$datos['fotoArticulo'] ?>" alt="<?=$datos['nombreArticulo'] ?>" width="200px">
    </div>
  </div>
</section>