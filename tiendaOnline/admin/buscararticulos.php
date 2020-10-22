<?php 
$listado=array();
if (isset($_REQUEST['buscarticulos']))
{
  $nombreArticulo=$_REQUEST['nombreArticulo'];
  $precio=$_REQUEST['precio'];
  $stock=$_REQUEST['stock'];
  if ($nombreArticulo=="" && $precio==0 && $stock==0) {
    $listado=Articulos::listadoArticulos();
  }else{
  	$listado=Articulos::listadoComplejo($nombreArticulo,$precio,$stock);
  }
}
 ?>
<h2>Busqueda de Artículos</h2>
<form action="admin.php" method="post">
  <input type="hidden" name="menu" value="32">
  <label for="nombreArticulo">Artículo: </label>
  <input type="text" name="nombreArticulo" placeholder="Nombre completo o parte de el.">
  <br>
  <label for="precio">Precio: </label>
  <select name="precio">
    <option value="0">No buscar precio</option>
  	<option value="1">Entre 0 y 10€</option>
  	<option value="2">Entre 10€ y 20€</option>
  	<option value="3">Entre 20€ y 30€</option>
	<option value="4">Entre 30€ y 40€</option>
	<option value="5">Entre 40€ y 50€</option>
	<option value="6">Mas de 50€</option>
  </select>
  <br>
  <label for="stock">Máximo Stock: </label>
  <input type="number" name="stock" value="0"><br>
  <input type="submit" name="buscarticulos" value="Buscar Artículos">
</form>
<hr>
<h2>Resultado de la busqueda</h2>
<table>
  <tr>
  	<th>Categoría</th>
  	<th>Subcategoría</th>
  	<th>Artículo</th>
  	<th>Stock</th>
  	<th></th>
	<th></th>
	<th></th>
  </tr>
<?php 
foreach ($listado as $indice=>$valor) {
 echo "<tr>";
 echo "<td>".$valor['nombreCategoria']."</td>";
 echo "<td>".$valor['nombreSubcat']."</td>";
 echo "<td>".$valor['nombreArticulo']."</td>";
 echo "<td>".$valor['stock']."</td>";
 echo "<td><a href='admin.php?menu=33&idArticulo=".$valor['idArticulo']."'>ver</a></td>";
 echo "<td><a href='admin.php?menu=31&idArticulo=".$valor['idArticulo']."&eliminarticulo=ok'> eliminar </a></td>";
 echo "<td><a href='admin.php?menu=34&idArticulo=".$valor['idArticulo']."&modificarticulo=ok'> modificar </a></td>";
 echo "</tr>";
}
 ?>
</table>
<hr>
<a href="index.php">Ir al menu principal</a>


