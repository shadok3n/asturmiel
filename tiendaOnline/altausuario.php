<?php 
include_once "clases.php";

$mensaje="";
if (isset($_REQUEST['registrar'])) {
  $usuario=$_REQUEST['usuario'];
  $clave1=$_REQUEST['clave1'];
  $clave2=$_REQUEST['clave2'];

  if ($usuario!="" AND $clave1!="" AND $clave1==$clave2) {
  	if (Usuarios::buscaUsuarioCorreo($usuario)) {
  	 $mensaje="El usuario ya existe, no se puede repetir.";
  	}else{
  	  Usuarios::altaUsuario($usuario,$clave1);
  	  $mensaje="Usuario dado de alta con exito";
  	}
  }else{
  	$mensaje="Los campos no pueden ser vacios y/o las claves no pueden ser diferentes";
  }
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Alta de usuario</title>
</head>
<body>
  <h1>Formulario de alta de usuario</h1>
  <h3><?=$mensaje ?></h3>
  <form action="altausuario.php" method="post">
  <label for="Usuario">Usuario (mail):</label>
  <input type="email" name="usuario">
  <br>
  <label for="clave1">Contraseña: </label>
  <input type="password" name="clave1">
  <br>	
  <label for="clave2">Repetir contraseña: </label>
  <input type="password" name="clave2">
  <br>	
  <input type="submit" name="registrar" value="DAR DE ALTA">
  </form>	

  <hr>
  <a href="indice.php">Ir a la pagina principal</a>
</body>
</html>
