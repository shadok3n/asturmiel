<?php 
session_start();

if (isset($_REQUEST['administrar'])) {
  $admin=$_REQUEST['admin'];
  $clave=$_REQUEST['clave'];

  if ($admin=="Superadmin" AND $clave="Admin123") {
  	$_SESSION['admin']=$admin;
  }
}

// cerrar sesion administrador
if (isset($_REQUEST['cerraradmin'])) {
  unset($_SESSION['admin']);
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Administracion de MiTienda</title>
</head>
<body>
<h1>Administracion de Mitienda On-Line</h1>
<hr>
  <?php 
  if (isset($_SESSION['admin'])) {
    include_once "parteadministrador.php";
  }else{
  ?>
<form action="index.php" method="post">
  <label for="admin">Administrador: </label>
  <input type="text" name="admin">
  <br>
  <label for="clave">Password: </label>
  <input type="password" name="clave">
  <br>
  <input type="submit" name="administrar" value="ACCEDER">
</form>  	
<?php 
  }
   ?>
</body>
</html>