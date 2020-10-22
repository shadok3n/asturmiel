<?php 
session_start();
include_once "../clases.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Administracion MiTienda</title>
</head>
<body>
<h1>Administracion MiTienda On-line</h1>
<?php 
if (isset($_SESSION['admin'])) {
  $menu=$_REQUEST['menu'];
  switch ($menu) {
  	case 10:
  	 // Alta de categorias
  	 include_once "altacategoria.php";
  	 break;
  	case 11:
  	 // Listado de categorias
  	 include_once "lisdadocategorias.php";
  	 break;
  	case 12:
  	 // Listado de categorias
  	 include_once "modificarcategoria.php";
  	 break;
  	case 20:
  	 // Alta de subcategoria
  	 include_once "altasubcategoria.php";
  	 break;
  	case 21:
  	 // Listado de subcategorias
  	 include_once "listadosubcategorias.php";
  	 break;
  	case 22:
  	 // Modificar subcategorias
  	 include_once "modificasubcategoria.php";
  	 break;
  	case 30:
  	 // Alta de articulo
  	 include_once "altarticulo.php";
  	 break;
  	case 31:
  	 // Listado de articulos
  	 include_once "listadoarticulos.php";
  	 break;
  	case 32:
  	 // Buscar articulos
  	 include_once "buscararticulos.php";
  	 break;
  	case 33:
  	 // Ver articulo
  	 include_once "verarticulo.php";
  	 break;
  	case 34:
  	 // Modificar articulo
  	 include_once "modificararticulo.php";
  	 break;

  	default:
  		echo "<h1>No existe ese menu</h1>";
  		break;
  }
}else{
	echo "<h1>NO PUEDE ACCEDER A ESTA PAGINA...</h1>";
}



 ?>	
</body>
</html>