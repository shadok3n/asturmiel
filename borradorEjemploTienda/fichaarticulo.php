<?php 
$idArticulo=$_REQUEST['idArticulo'];
$datos=Articulos::datosArticulo($idArticulo);
 ?>
<section class="col-md-6">
  <h1>Articulo: <?=$datos['nombreArticulo'] ?></h1>  	
  <div class="row">
    <div class="col-md-6">
     <h3>Categoria: <?=$datos['nombreCategoria'] ?></h3>
  <h4>Subategoria: <?=$datos['nombreSubcat'] ?></h4>
     <p><?=$datos['descripcion'] ?></p>
     <p>Precio: <?=$datos['precio'] ?>€</p>
     <p>Stock: <?=$datos['stock'] ?></p>
     <a href="indexarticulo.php?idArticulo=<?=$datos['idArticulo'] ?>&alcarrito=ok"><i class="fas fa-cart-plus"></i></a>
    </div>
	<div class="col-md-6">
    <img src="admin/<?=$datos['fotoArticulo'] ?>" alt="<?=$datos['nombreArticulo'] ?>" width="200px">
    </div>
  </div>
</section>