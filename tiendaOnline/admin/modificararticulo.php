<?php 

$listado=Subcategorias::listadoSubcategorias();
$idArticulo=$_REQUEST['idArticulo'];
$datos=Articulos::datosArticulo($idArticulo);

?>
<h2>Modificar Artículo</h2>
<form action="admin.php" method="post" enctype="multipart/form-data">
  <input type="hidden" name="menu" value="31">
  <input type="hidden" name="idArticulo" value="<?=$idArticulo ?>">
  <label for="idSubcat">Subcategoría: </label>
  <select name="idSubcat">
  <?php 
  foreach($listado as $indice=>$valor)
  {
   $idSubcat=$valor['idSubcat'];
   $nombreCategoria=$valor['nombreCategoria'];
   $nombreSubcat=$valor['nombreSubcat'];
   if ($datos['idSubcat']==$idSubcat) {
   	echo "<option value='$idSubcat' selected>$nombreCategoria - $nombreSubcat</option>";
   }else{
   	echo "<option value='$idSubcat'>$nombreCategoria - $nombreSubcat</option>";
   }   
  }
  ?>
  </select>
  <br>
  <label for="nombreArticulo">Nombre del artículo: </label>
  <input type="text" name="nombreArticulo" value="<?=$datos['nombreArticulo'] ?>"><br>
  <label for="descripcion">Descripcion: </label><br>
  <textarea name="descripcion" cols="30" rows="10"><?=$datos['descripcion'] ?></textarea><br>
  <label for="precio">Precio: </label>
  <input type="text" name="precio" value="<?=$datos['precio'] ?>"><br>
  <label for="stock">Stock: </label>
  <input type="number" name="stock" value="<?=$datos['stock'] ?>"><br>
  <img src="<?=$datos['fotoArticulo'] ?>" alt="" width="100px"> 
  <label for="imagen">Imagen: </label>
  <input type="file" name="imagen"><br>
  <input type="submit" name="modificarticulo" value="Modificar Artículo">
</form>
<hr>
<a href="index.php">Ir al menu principal</a>