<?php 
if (isset($_REQUEST['borrarCategoria']))
{
  $idCategoria=$_REQUEST['idCategoria'];
  Categorias::eliminarCategoria($idCategoria);
}

if (isset($_REQUEST['modificaCat'])) {
  $idCategoria=$_REQUEST['idCategoria'];
  $nombreCategoria=$_REQUEST['nombreCategoria'];
  $descripcionCat=$_REQUEST['descripcionCat'];
  Categorias::modificaCategoria($idCategoria,$nombreCategoria,$descripcionCat);

}

$listado=Categorias::listadoCategorias();
 ?>

 <h2>Listado de categorias</h2>
 <table>
 	<tr>
 		<th>Nombre categoria</th>
 		<th> </th>
 		<th> </th>
		<th> </th>
 	</tr>
<?php 
foreach ($listado as $indice => $valor)
{
  echo "<tr>";
  echo "<td>".$valor['nombreCategoria']."</td>";
  echo "<td><a href='admin.php?menu=11&idCategoria=".$valor['idCategoria']."&borrarCategoria=ok' >eliminar</a></td>";
  echo "<td><a href='admin.php?menu=12&idCategoria=".$valor['idCategoria']."' >modificar</a></td>";
  echo "<td><a href='admin.php?menu=21&idCategoria=".$valor['idCategoria']."'> listado subcategorias </a></td>";
  echo "</tr>";
}
 ?> 	
 </table>

 <hr>
 <a href="index.php">Ir al menu principal</a>