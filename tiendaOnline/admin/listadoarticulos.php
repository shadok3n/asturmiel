<?php 
if (isset($_REQUEST['eliminarticulo']))
{
  $idArticulo=$_REQUEST['idArticulo'];
  Articulos::eliminarArticulo($idArticulo);
  echo "<h3>Se ha eliminado el articulo $idArticulo</h3>";
}

if (isset($_REQUEST['modificarticulo']))
{
  $idArticulo=$_REQUEST['idArticulo'];
  $nombreArticulo=$_REQUEST['nombreArticulo'];
  $idSubcat=$_REQUEST['idSubcat'];
  $descripcion=$_REQUEST['descripcion'];
  $precio=$_REQUEST['precio'];
  $stock=$_REQUEST['stock'];

  if ($_FILES['imagen']['name']!="") {
  	// modificar con imagen nueva
  	include_once "subirimagen.php";
  	Articulos::modificarArticulo($idArticulo,$idSubcat,$nombreArticulo,$descripcion,$precio,$stock,$destino);
  }else{
  	// modificar manteniendo imagen
  	Articulos::modificarArticulo($idArticulo,$idSubcat,$nombreArticulo,$descripcion,$precio,$stock);
  }
 echo "<h2>Se ha modificado el articulo $nombreArticulo</h2>";
}

$listado=Articulos::listadoArticulos();

 ?>
<h2>Lsitado de Articulos</h2>
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



