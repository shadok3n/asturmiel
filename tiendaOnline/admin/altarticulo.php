<?php 

if (isset($_REQUEST['altarticulo'])) {
   $idSubcat=$_REQUEST['idSubcat'];
   $nombreArticulo=$_REQUEST['nombreArticulo'];
   $descripcion=htmlspecialchars($_REQUEST['descripcion']);
   $precio=$_REQUEST['precio'];
   $stock=$_REQUEST['stock'];  

  $imagenok=true;
  if($_FILES['imagen']['error']>0){
    echo "ERROR: archivo de imagen NO valido.";
    $imagenok=false;
  }else{
    $tipo=$_FILES['imagen']['type'];
    $tamanio=$_FILES['imagen']['size'];
    if ($tipo=="image/jpeg" && $tamanio<1000000 ) {  
      $idNuevo=Articulos::altaArticulo($idSubcat,$nombreArticulo,$descripcion,$precio,$stock,"");    
      $nombreImagen=$idNuevo."_".date("Hms").".jpg";
      $destino="../imagenes/$nombreImagen";
      copy($_FILES['imagen']['tmp_name'],$destino);
      Articulos:: modificarArticulo($idNuevo,$idSubcat,$nombreArticulo,$descripcion,$precio,$stock,$destino);
      //echo "La imagen ha sido guardada.";
   }else{
    echo "ERROR: No admitimos ese tipo de archivo o es muy grande.";
    $imagenok=false;
   }
   echo "<h2>Se ha dado de alta el articulo $nombreArticulo</h2>";
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