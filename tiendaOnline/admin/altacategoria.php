<?php 
if (isset($_REQUEST['altaCat'])) {
  $nombreCategoria=$_REQUEST['nombreCategoria'];
  $descripcionCat=$_REQUEST['descripcionCat'];
  Categorias::altaCategoria($nombreCategoria,$descripcionCat);
  echo "<h2>Se ha dado de alta la catgoría $nombreCategoria</h2>";
}
 ?>
<h2>Alta de Categoría</h2>
<form action="admin.php" method="post">
	<input type="hidden" name="menu" value="10">
	<label for="nombreCategoria">Nombre de Categoría: </label>
	<input type="text" name="nombreCategoria">
	<br>
	<label for="descripcionCat">Descripcion de la categoría:</label>
	<br>
	<textarea name="descripcionCat" cols="30" rows="10"></textarea>
	<br>
	<input type="submit" name="altaCat" value="Dar de Alta">
</form>
<hr>
<a href="index.php">Ir al menu principal</a>