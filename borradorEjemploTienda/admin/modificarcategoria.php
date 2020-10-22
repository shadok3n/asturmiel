<?php 

$idCategoria = $_REQUEST['idCategoria'];
$datosCategoria = Categorias::datosCategoria($idCategoria);

 ?>
<h2>Modificar Categoría</h2>
<form action="admin.php" method="post">
	<input type="hidden" name="menu" value="11">
	<input type="hidden" name="idCategoria" value="<?=$idCategoria ?>">
	<label for="nombreCategoria">Nombre de Categoría: </label>
	<input type="text" name="nombreCategoria" value="<?=$datosCategoria['nombreCategoria'] ?>" >
	<br>
	<label for="descripcionCat">Descripcion de la categoría:</label>
	<br>
	<textarea name="descripcionCat" cols="30" rows="10"><?=$datosCategoria['descripcionCat'] ?></textarea>
	<br>
	<input type="submit" name="modificaCat" value="Modificar">
</form>
<hr>
<a href="index.php">Ir al menu principal</a>