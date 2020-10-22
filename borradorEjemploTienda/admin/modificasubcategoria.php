<?php 

$idSubcat=$_REQUEST['idSubcat'];
$datos=Subcategorias::datosSubcategoria($idSubcat);

$listado = Categorias::listadoCategorias();

 ?>
<h2>Modificar Subcategoria</h2>
<hr>
<form action="admin.php" method="post">
  <input type="hidden" name="menu" value="21">
  <input type="hidden" name="idSubcat" value="<?=$idSubcat ?>">
  <label for="idCategoria">Categoria: </label>
  <select name="idCategoria">
  <?php 
  foreach ($listado as $indice=>$valor)
  {
  	if ($valor['idCategoria']==$datos['idCategoria']) {
  	 echo "<option value='".$valor['idCategoria']."' selected> ".$valor['nombreCategoria']." </option>";
  	}else{
  	 echo "<option value='".$valor['idCategoria']."'> ".$valor['nombreCategoria']." </option>";
  	}  	
  }
   ?>
   </select>
  <br>
  <label for="nombreSubcat">Nombre Subcategoria: </label>
  <input type="text" name="nombreSubcat" value="<?=$datos['nombreSubcat'] ?>"> <br>
  <label for="descripcionSubcat">Descripcion Subcategoria:</label>
  <br>
  <textarea name="descripcionSubcat" cols="30" rows="10"><?=$datos['descripcionSubcat'] ?></textarea><br>
  <input type="submit" name="modificaSubcat" value="Modificar">
</form>
<hr>
<a href="index.php">Ir al menu principal</a>
