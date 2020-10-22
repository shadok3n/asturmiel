<?php 

$idArticulo=$_REQUEST['idArticulo'];

$datos=Articulos::datosArticulo($idArticulo);
?>
<h2>Ficha de Articulo</h2>
<h3>Categoria: <?=$datos['nombreCategoria'] ?></h3>
<h4>SubCategoria: <?=$datos['nombreSubcat'] ?></h4>
<p>Nombre: <?=$datos['nombreArticulo'] ?></p>
<p>Descripcion: <br>
<?=$datos['descripcion'] ?></p>
<p>Precio: <?=$datos['precio'] ?> - Stock <?=$datos['stock'] ?></p>
<img src="<?=$datos['fotoArticulo'] ?>" alt="" width="200px">

<hr>
<a href="index.php">Ir al menu principal</a>
