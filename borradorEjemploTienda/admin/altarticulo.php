<?php 

if (isset($_REQUEST['altarticulo'])) {
 include_once "subirimagen.php";
 if ($imagenok) {
   $idSubcat=$_REQUEST['idSubcat'];
   $nombreArticulo=$_REQUEST['nombreArticulo'];
   $descripcion=htmlspecialchars($_REQUEST['descripcion']);
   $precio=$_REQUEST['precio'];
   $stock=$_REQUEST['stock'];
   $idNuevo=Articulos::altaArticulo($idSubcat,$nombreArticulo,$descripcion,$precio,$stock,$destino);
   echo "<h2>Se ha dado de alta el articulo $nombreArticulo</h2>";
 }else{
 	echo "<h2>NO se ha dado de alta el artículo</h2>";
 }
}

$listado=Subcategorias::listadoSubcategorias();

?>
<h2>Alta de Artículo</h2>
<form action="admin.php" method="post" enctype="multipart/form-data">
  <input type="hidden" name="menu" value="30">
  <label for="idSubcat">Subcategoría: </label>
  <select name="idSubcat">
  <?php 
  foreach($listado as $indice=>$valor)
  {
   $idSubcat=$valor['idSubcat'];
   $nombreCategoria=$valor['nombreCategoria'];
   $nombreSubcat=$valor['nombreSubcat'];
   echo "<option value='$idSubcat'>$nombreCategoria - $nombreSubcat</option>";
  }
  ?>
  </select>
  <br>
  <label for="nombreArticulo">Nombre del artículo: </label>
  <input type="text" name="nombreArticulo"><br>
  <label for="descripcion">Descripcion: </label><br>
  <textarea name="descripcion" cols="30" rows="10"></textarea><br>
  <label for="precio">Precio: </label>
  <input type="text" name="precio"><br>
  <label for="stock">Stock: </label>
  <input type="number" name="stock" value="1"><br>
  <label for="imagen">Imagen: </label>
  <input type="file" name="imagen"><br>
  <input type="submit" name="altarticulo" value="Alta del Artículo">
</form>
<hr>
<a href="index.php">Ir al menu principal</a>