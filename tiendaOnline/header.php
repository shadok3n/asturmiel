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
<html lang="es">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Asturmiel - Tienda</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/business-casual.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/store.css">

    <!-- curso -->
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
		<a href="index.php"><img src="../img/logo.png" alt="Logo abeja" width="100px" id="logoabeja"></a>
	</div>
	<div id="titulo">
		<h1 class="site-heading text-center text-white d-none d-lg-block">
		<span class="site-heading-lower">Asturmiel</span>
		<h1>
	</div>
	<div id="login">
    <div class="negrobold">
	  <?php 
	  if ($misesion->estadoLogin()) {
	  	echo "Usuario: ".$misesion->getUsuario()."<br>";
	  ?>
    </div>
	  <a href="javascript:void(0)" onClick="window.location='index.php?cerrar=303'" class="azulbold">cerrar sesion</a>

		 <!-- | <a href="indexdatosusuario.php" class="azulbold">datos usuario</a> -->
    
	  <?php
	  }else{
	  ?>
	  <form action="index.php" method="post">
	  	<label for="usuario" class="blanco">Usuario: </label> 
	  	<input type="email" name="usuario" placeholder="e-mail"><br>
	  	<label for="clave" class="blanco">Pass:</label>
		<input type="password" name="clave">
		<input type="submit" name="acceso" value="Iniciar sesión">
	  </form>
	  <a href="altausuario.php" class="azulbold">Darse de alta</a>
	  <?php
	  }
	   ?>
	</div>
  </header>
  	