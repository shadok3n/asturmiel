<?php 

$listado = Categorias::listadoCategorias();

if (isset($_REQUEST['altaSubcat'])) {
  $idCategoria=$_REQUEST['idCategoria'];
  $nombreSubcat=$_REQUEST['nombreSubcat'];
  $descripcionSubcat=$_REQUEST['descripcionSubcat'];
  Subcategorias::altaSubcategoria($idCategoria,$nombreSubcat,$descripcionSubcat);
  echo "<h2>Se ha dado de alta la subcategoria $nombreSubcat</h2>";
}
 ?>
<h2>Alta de Subcategorias</h2>
<hr>
<form action="admin.php" method="post">
  <input type="hidden" name="menu" value="20">
  <label for="idCategoria">Categoria: </label>
  <select name="idCategoria">
  <?php 
  foreach ($listado as $indice=>$valor)
  {
  	echo "<option value='".$valor['idCategoria']."'> ".$valor['nombreCategoria']." </option>";
  }
   ?>
   </select>
  <br>
  <label for="nombreSubcat">Nombre Subcategoria: </label>
  <input type="text" name="nombreSubcat"> <br>
  <label for="descripcionSubcat">Descripcion Subcategoria:</label>
  <br>
  <textarea name="descripcionSubcat" cols="30" rows="10"></textarea><br>
  <input type="submit" name="altaSubcat" value="Dar de Alta">
</form>
<hr>
<a href="index.php">Ir al menu principal</a>
