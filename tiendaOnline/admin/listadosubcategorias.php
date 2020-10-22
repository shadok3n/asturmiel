<?php 

if (isset($_REQUEST['modificaSubcat']))
{
 $idSubcat=$_REQUEST['idSubcat'];
 $idCategoria=$_REQUEST['idCategoria'];
 $nombreSubcat=$_REQUEST['nombreSubcat'];
 $descripcionSubcat=$_REQUEST['descripcionSubcat'];
 Subcategorias::actualizaSubcat($idSubcat,$nombreSubcat,$descripcionSubcat,$idCategoria);

}

if (isset($_REQUEST['borrarSubcat']))
{
  $idSubcat=$_REQUEST['idSubcat'];
  Subcategorias::eliminarSubcat($idSubcat);
}

if (isset($_REQUEST['modificaCat'])) {
  $idCategoria=$_REQUEST['idCategoria'];
  $nombreCategoria=$_REQUEST['nombreCategoria'];
  $descripcionCat=$_REQUEST['descripcionCat'];
  Categorias::modificaCategoria($idCategoria,$nombreCategoria,$descripcionCat);

}

if (isset($_REQUEST['idCategoria'])) {
  $idCategoria=$_REQUEST['idCategoria'];
  $listado=Subcategorias::listadoSubcategorias($idCategoria);
}else{
  $listado=Subcategorias::listadoSubcategorias();
}
 ?>

 <h2>Listado de Subcategorias</h2>
 <table>
 	<tr>
    <th>Nombre Categoría</th>
 		<th>Nombre Subcategoría</th>
 		<th> </th>
 		<th> </th>
		<th> </th>
 	</tr>
<?php 
foreach ($listado as $indice => $valor)
{
  echo "<tr>";
  echo "<td>".$valor['nombreCategoria']."</td>";
  echo "<td>".$valor['nombreSubcat']."</td>";
  echo "<td><a href='admin.php?menu=21&idSubcat=".$valor['idSubcat']."&borrarSubcat=ok' >eliminar</a></td>";
  echo "<td><a href='admin.php?menu=22&idSubcat=".$valor['idSubcat']."' >modificar</a></td>";
  echo "<td> listado articulos </td>";
  echo "</tr>";
}
 ?> 	
 </table>

 <hr>
 <a href="index.php">Ir al menu principal</a>