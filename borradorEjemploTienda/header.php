<?php 
session_start();

// inicializar el carrito
$micarrito = new Carrito();

// llega un nuevo articulo para el carrito
if (isset($_REQUEST['alcarrito'])) {
  $idArticulo=$_REQUEST['idArticulo'];
  $datos=Articulos::datosArticulo($idArticulo);
  $nombreArticulo=$datos['nombreArticulo'];
  $precio=$datos['precio'];  
  $micarrito->addArticulo($idArticulo,$nombreArticulo,$precio);
} 

// vaciar carrito
if (isset($_REQUEST['vaciar'])) {
	$micarrito->vaciarCarrito();
	$micarrito = new Carrito();
}

// eliminar un articulo del carrito
if (isset($_REQUEST['eliminar'])) {
  $idArticulo=$_REQUEST['idArticulo'];
  $micarrito->delArticulo($idArticulo);
}

// modificar cantidad de articulo en el carrito
if (isset($_REQUEST['modificarCarrito'])){
 $idArticulo=$_REQUEST['idArticulo']; 
 $cantidad=$_REQUEST['cantidad'];
 $micarrito->modificarCarrito($idArticulo,$cantidad);
}


// debo crear un objeto de tipo Sesiones
$misesion = new Sesiones();

if (isset($_REQUEST['acceso'])) {
  $usuario=$_REQUEST['usuario'];
  $clave=$_REQUEST['clave'];
  if (Usuarios::buscaUsuario($usuario,$clave)) {
  	$misesion->iniciaLogin($usuario);
  }else{
  	?>
	<script>
	alert("Usuario/password NO validos");
	</script>
  	<?php
  }
}

// cerrar sesion de usuario
if (isset($_REQUEST['cerrar'])) {
  $misesion->finLogin();
}



 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Mi tienda OnLine</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 	<link rel="stylesheet" href="css/estilos.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
 </head>
 <body>
  <div class="container">
  <header class="row">
	<div id="logo"> 
		<img src="imagenes/logo.jpg" alt="Shopping" width="100px">
	</div>
	<div id="titulo">
		<h2>MiTienda On-Line<h2>
	</div>
	<div id="login">
	  <?php 
	  if ($misesion->estadoLogin()) {
	  	echo "Usuario: ".$misesion->getUsuario()."<br>";
	  ?>
	  <a href="javascript:void(0)" onClick="window.location='index.php?cerrar=303'">cerrar sesion</a>

		 | datos usuario

	  <?php
	  }else{
	  ?>
	  <form action="index.php" method="post">
	  	<label for="usuario">Usuario: </label> 
	  	<input type="email" name="usuario" placeholder="e-mail"><br>
	  	<label for="clave">Pass:</label>
		<input type="password" name="clave">
		<input type="submit" name="acceso" value="<=|">
	  </form>
	  <a href="altausuario.php">Darse de alta</a>
	  <?php
	  }
	   ?>
	</div>
  </header>
  	