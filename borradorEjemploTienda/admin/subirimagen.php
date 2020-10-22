<?php 
  $imagenok=true;
  if($_FILES['imagen']['error']>0){
  	echo "ERROR: archivo de imagen NO valido.";
    $imagenok=false;
  }else{
  	$tipo=$_FILES['imagen']['type'];
  	$tamanio=$_FILES['imagen']['size'];
    if (($tipo=="image/jpeg" || $tipo=="image/png" || $tipo=="image/bmp") && $tamanio<1000000 ) {
	  	$destino="../imagenes/".$_FILES['imagen']['name'];
	  	copy($_FILES['imagen']['tmp_name'],$destino);
	  	//echo "La imagen ha sido guardada.";
   }else{
   	echo "ERROR: No admitimos ese tipo de archivo o es muy grande.";
    $imagenok=false;
   }
  }

?>
