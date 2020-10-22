<?php 
// CLASE PARA CONEXION CON LA BASE DE DATOS
class miBaseDatos{
  private $host="localhost";
  private $user="root";
  private $pass="";
  private $bbdd="mitienda";
  private $conexion;

  /*private $host="localhost";
  private $user="id5676834_mguerra";
  private $pass="Mguerra2018";
  private $bbdd="id5676834_tiendina2018";
  private $conexion;  */

  public function __construct(){
  	$con = new mysqli($this->host,$this->user,$this->pass,$this->bbdd);
  	if ($con->connect_errno) {
  	die("Error de conexion '".$con->connect_errno."': ".$con->connect_error);
  	}
  	$con->query("SET NAMES 'UTF-8'");
  	$this->conexion=$con;
  	return $con;
  } // fin constructor 

  // Consulta basica, devuelve el primer registro
  public function consultabasica($sentencia){
  	$fila=array();
  	if ($sentencia!="") {
  	  $resultado = $this->conexion->query($sentencia);
  	  $fila = $resultado->fetch_assoc();
  	}
  	return $fila;
  } // fin consulta basica

  // consulta para devolver listado de elementos
  public function consulta($sentencia){
  	$datos=array();
  	if ($sentencia!="") {
  	  $resultado=$this->conexion->query($sentencia);
  	  while ($fila=$resultado->fetch_assoc()) {
  	  	$datos[]=$fila;
  	  }
  	}
  	return $datos;
  } // fin consulta multiple

  // metodo para ejecutar sentencias SQL
  public function ejecutar($sentencia){
  	if ($sentencia!="") {
  	 $this->conexion->query($sentencia) OR DIE("No se ha podido ejecutar la sentencia");
  	 // para devolver el ultimo id ejecutado
  	 return $this->conexion->insert_id;
  	}
  } // fin metodo ejecutar sentencias

  public function cerrar(){
  	$this->conexion->close();
  }

} // fin clase miBaseDatos


// Clase Usuarios
class Usuarios{
  private $idUsuario;
  private $usuario; // es el correo
  private $clave;

  function __construct() {}

  // metodo para dar de alta un usuario
  public static function altaUsuario($usuario,$clave){
  	$bd = new miBaseDatos();
  	$clavencriptada=hash('ripemd160',$clave);
  	$ssql="INSERT INTO usuarios(usuario,clave) VALUES ('$usuario','$clavencriptada')";
  	$bd->ejecutar($ssql);
  	$bd->cerrar();
  } // fin alta usuario

  // buscar usuario en la bbdd por el correo
  public static function buscaUsuarioCorreo($usuario){
  	$bd=new miBaseDatos();
  	$ssql="SELECT * FROM usuarios WHERE usuario='$usuario'";
  	$datos[]=$bd->consultabasica($ssql);
  	$bd->cerrar();
  	return isset($datos[0]);
  } // fin buscaUsuarioCorreo

  // metodo para buscar usuario por correo y clave
  public static function buscaUsuario($usuario,$clave){
  	$bd=new miBaseDatos();
  	$clavencriptada=hash('ripemd160',$clave);
  	$ssql="SELECT * FROM usuarios WHERE usuario='$usuario' AND clave='$clavencriptada'";
  	$datos[]=$bd->consultabasica($ssql);
  	$bd->cerrar();
  	return isset($datos[0]);
  } // fin buscaUsuario

  // metodo que me devuelve el idUsuario
  public static function getIdUsuario($usuario){
  	$bd=new miBaseDatos();
  	$ssql="SELECT idUsuario FROM usuarios WHERE usuario='$usuario'";
  	$datos=$bd->consultabasica($ssql);
  	$bd->cerrar();
  	return $datos['idUsuario'];
  } // fin getIdUsuario
} // fin clase Usuarios

// clase para manejar las sesiones
class Sesiones{
  private $login=false;
  private $usuario;

  function __construct(){
  	$this->verificaLogin();
  }

  // metodo para verificar si esta creada la sesion de usuario
  private function verificaLogin(){
  	if (isset($_SESSION['usuario'])) {
  	   $this->usuario=$_SESSION['usuario'];
  	   $this->login = true;
  	}else{
  	  unset($this->usuario);
  	  $this->login=false;
  	}
  }  // fin verificaLogin

  // metodo para inicializar la sesion
  public function iniciaLogin($usuario){
  	$_SESSION['usuario']=$usuario;
  	$this->usuario=$usuario;
  	$this->login=true;
  }

  // metodo para finalizar una sesion
  public function finLogin(){
  	unset($_SESSION['usuario']);
  	unset($this->usuario);
  	$this->login=false;
  } // finLogin

  // metodo para saber si estamos o no logueados
  public function estadoLogin(){
  	return $this->login;
  }

  // metodo que me devuelve el usuario
  public function getUsuario(){
  	return $this->usuario;
  }
} // fin clase Sesiones


// Clase Categorías
class Categorias{
  private $idCategoria;
  private $nombreCategoria;
  private $descripcionCat;

  function __construct() {}

  // metodo para dar de alta una categoria
  public static function altaCategoria($nombre,$descripcion){
   $bd=new miBaseDatos();
   $ssql="INSERT INTO categorias(nombreCategoria,descripcionCat) VALUES ('$nombre','$descripcion')";
   $bd->ejecutar($ssql);
   $bd->cerrar();
  } // fin alta categoria

  // metodo para obtner el listado de las categorias
  public static function listadoCategorias(){
  	$bd = new miBaseDatos();
  	$ssql = "SELECT * FROM categorias";
  	$datos = $bd->consulta($ssql);
  	$bd->cerrar();
  	return $datos;
  } // fin listado categorias

  // metodo para eliminar una categoria
  public static function eliminarCategoria($idCategoria){
  	$bd=new miBaseDatos();
  	$ssql="DELETE FROM categorias WHERE idCategoria='$idCategoria'";
  	$bd->ejecutar($ssql);
  	$bd->cerrar();
  }

 // metodo para recuperar los datos de una categoria a través de su id
 public static function datosCategoria($idCategoria){
   $bd=new miBaseDatos();
   $ssql="SELECT * FROM categorias WHERE idCategoria=$idCategoria";
   $datos=$bd->consultabasica($ssql);
   $bd->cerrar();
   return $datos;
 } // fin datos categoria

 // metodo para modificar una categoria
 public static function modificaCategoria($idCategoria,$nombreCategoria,$descripcionCat){
   $bd=new miBaseDatos();
   $ssql="UPDATE categorias SET nombreCategoria='$nombreCategoria', descripcionCat='$descripcionCat' WHERE idCategoria=$idCategoria";
   $bd->ejecutar($ssql);
   $bd->cerrar();
 }


} // fin clase categorias


// Clase Subcategorias
class Subcategorias{
  private $idSubcat;
  private $idCategoria;
  private $nombreSubcat;
  private $descripcionSubcat;

  function __construct() {}

  // metodo para dar de alta una Subcategoria
  public static function altaSubcategoria($idCategoria,$nombreSubcat,$descripcionSubcat){
    $bd=new miBaseDatos();
    $ssql="INSERT INTO subcategorias(idCategoria,nombreSubcat,descripcionSubcat) VALUES('$idCategoria','$nombreSubcat','$descripcionSubcat')";
    $bd->ejecutar($ssql);
    $bd->cerrar();
  } // fin alta Subcategoria

  // metodo para obtener el listado de las subcategorias
  public static function listadoSubcategorias($idCategoria=0){
  	$bd = new miBaseDatos();
  	if ($idCategoria==0) {
  	$ssql = "SELECT * FROM subcategorias INNER JOIN categorias ON subcategorias.idCategoria=categorias.idCategoria ORDER BY categorias.nombreCategoria";
  	}else{
  	$ssql = "SELECT * FROM subcategorias INNER JOIN categorias ON subcategorias.idCategoria=categorias.idCategoria WHERE categorias.idCategoria='$idCategoria'";
  	}  	
  	$datos = $bd->consulta($ssql);
  	$bd->cerrar();
  	return $datos;
  } // fin listado subcategorias

  // metodo para eliminar una subcategoria
  public static function eliminarSubcat($idSubcat){
  	$bd=new miBaseDatos();
  	$ssql="DELETE FROM subcategorias WHERE idSubcat='$idSubcat'";
  	$bd->ejecutar($ssql);
  	$bd->cerrar();
  } // fin metodo eliminar

 // metodo que devuelve los datos de una subcategoria con el idSubcat
 public static function datosSubcategoria($idSubcat){
  $bd=new miBaseDatos();
  $ssql="SELECT * FROM subcategorias WHERE idSubcat=$idSubcat";
  $datos=$bd->consultabasica($ssql);
  $bd->cerrar();
  return $datos;
 } // fin datos subcategoria

 // metodo para actualizar una subcategoria
 public static function actualizaSubcat($idSubcat,$nombreSubcat,$descripcionSubcat,$idCategoria){
  $bd=new miBaseDatos();
  $ssql="UPDATE subcategorias SET nombreSubcat='$nombreSubcat',descripcionSubcat='$descripcionSubcat',idCategoria='$idCategoria' WHERE idSubcat=$idSubcat";
  $bd->ejecutar($ssql);
  $bd->cerrar();
 } // fin metodo actualizar subcat

} // fin clase Subcategoria

// clase Articulos
class Articulos{
 private $idArticulo;
 private $idSubcat;
 private $nombreArticulo;
 private $descripcion;
 private $precio;
 private $stock;
 private $fotoArticulo;

 function __construct() {}
 
 // metodo para dar de alta un artículo
 public static function altaArticulo($idSubcat,$nombreArticulo,$descripcion,$precio,$stock,$destino){
   $bd=new miBaseDatos();
   $ssql="INSERT INTO articulos(idSubcat, nombreArticulo, descripcion, precio, stock, fotoArticulo) VALUES ('$idSubcat','$nombreArticulo','$descripcion','$precio','$stock','$destino')";
   $idNuevo=$bd->ejecutar($ssql);
   $bd->cerrar();
   return $idNuevo;
 } // fin alta articulo

 // metodo para obtener el listado de artículos
 public static function listadoArticulos($posicion=0,$articulosPorPagina=0,$idSubcat=0){
  $bd=new miBaseDatos();
  $ssql="SELECT * FROM articulos 
  INNER JOIN subcategorias 
  ON articulos.idSubcat=subcategorias.idSubcat
  INNER JOIN categorias
  ON categorias.idCategoria=subcategorias.idCategoria ";
  if ($idSubcat!=0) {
  	$ssql.=" WHERE articulos.idSubcat='$idSubcat'";
  }
  $ssql.=" ORDER BY categorias.nombreCategoria, subcategorias.nombreSubcat, articulos.nombreArticulo ";
  if ($articulosPorPagina>0) {
  	$ssql.="LIMIT $posicion,$articulosPorPagina";
  }      
  $datos=$bd->consulta($ssql);
  $bd->cerrar();
  return $datos;
 } // fin listado articulos

 // metodo para buscar articulos complejo
 public static function listadoComplejo($nombreArticulo,$precio,$stock){
   if ($nombreArticulo!="") {
   $ssql="SELECT * FROM articulos AS a 
  INNER JOIN subcategorias AS s 
  ON a.idSubcat=s.idSubcat
  INNER JOIN categorias AS c
  ON c.idCategoria=s.idCategoria  
  WHERE nombreArticulo LIKE '%$nombreArticulo%' ";
if ($precio!=0) {
switch ($precio) {
case 1:
	$ssql.=" AND precio>0 AND precio<=10 ";
	break;
case 2:
	$ssql.=" AND precio>10 AND precio<=20 ";
	break;
case 3:
	$ssql.=" AND precio>20 AND precio<=30 ";
	break;
case 4:
	$ssql.=" AND precio>30 AND precio<=40 ";
	break;
case 5:
	$ssql.=" AND precio>40 AND precio<=50 ";
	break;
case 6:
	$ssql.=" AND precio>50 ";
	break;
  	 } // fin CASE
   } // precio !=0

if ($stock!=0) {
   $ssql.=" AND stock<='$stock' ";
}
 }// if nombreArticulo!=""
 else{
 $ssql="SELECT * FROM articulos AS a 
  INNER JOIN subcategorias AS s 
  ON a.idSubcat=s.idSubcat
  INNER JOIN categorias AS c
  ON c.idCategoria=s.idCategoria  
  WHERE nombreArticulo LIKE '%%' ";
  if ($precio!=0) {
switch ($precio) {
case 1:
	$ssql.=" AND precio>0 AND precio<=10 ";
	break;
case 2:
	$ssql.=" AND precio>10 AND precio<=20 ";
	break;
case 3:
	$ssql.=" AND precio>20 AND precio<=30 ";
	break;
case 4:
	$ssql.=" AND precio>30 AND precio<=40 ";
	break;
case 5:
	$ssql.=" AND precio>40 AND precio<=50 ";
	break;
case 6:
	$ssql.=" AND precio>50 ";
	break;
  	 } // fin CASE
   } // precio !=0

if ($stock!=0) {
   $ssql.=" AND stock<='$stock' ";
}
 } // nombreArticulo==""

 //echo $ssql;
 $ssql.=" ORDER BY c.nombreCategoria, s.nombreSubcat, a.nombreArticulo";

 $bd= new miBaseDatos();
 $datos=$bd->consulta($ssql);
 $bd->cerrar();
 return $datos;
} // fin listadoComplejo

 // metodo para obtener los datos de un articulo
 public static function datosArticulo($idArticulo){
   $bd=new miBaseDatos();
   $ssql="SELECT * FROM articulos AS a 
	INNER JOIN subcategorias AS s
	ON a.idSubcat=s.idSubcat
	INNER JOIN categorias AS c
	ON c.idCategoria=s.idCategoria
    WHERE idArticulo=$idArticulo";
   $datos=$bd->consultabasica($ssql);
   $bd->cerrar();
   return $datos;
 } // fin datos articulo

 // metodo para eliminar un articulo
 public static function eliminarArticulo($idArticulo){
  $bd=new miBaseDatos();
  $ssql="DELETE FROM articulos WHERE idArticulo=$idArticulo";
  $bd->ejecutar($ssql);
  $bd->cerrar();
 } // fin eliminar articulo

 // metodo para modificar un articulo
 public static function modificarArticulo($idArticulo,$idSubcat,$nombreArticulo,$descripcion,$precio,$stock,$destino=""){
  $bd=new miBaseDatos();
  if ($destino=="") {
  	$ssql="UPDATE articulos SET idSubcat='$idSubcat',nombreArticulo='$nombreArticulo',descripcion='$descripcion',precio='$precio',stock='$stock' WHERE idArticulo=$idArticulo";
  }else{
  	$ssql="UPDATE articulos SET idSubcat='$idSubcat',nombreArticulo='$nombreArticulo',descripcion='$descripcion',precio='$precio',stock='$stock',fotoArticulo='$destino' WHERE idArticulo=$idArticulo";
  }
  $bd->ejecutar($ssql);
  $bd->cerrar();
 } // fin modificar articulo

 // devuelve el numero de articulos por subcategoria
 public static function numArticulos($idSubcat){
   $bd = new miBaseDatos();
   $sentencia = "SELECT count(*) AS total FROM articulos WHERE idSubcat=$idSubcat";
   $datos=$bd->consultabasica($sentencia);
   $bd->cerrar();
   return $datos['total'];
 } // fin numero de Articulos por subcat




} // fin clase Articulos


// clase para gestionar el carrito de la compra
class Carrito{
 private $carrito=array();
 private $estadoCarrito;

 public function __construct(){
   if (!isset($_SESSION['carrito'])) {
   	$_SESSION['carrito']=null;
   	$_SESSION['carrito']['precioTotal']=0;
   	$_SESSION['carrito']['articulosTotal']=0;
   	$this->estadoCarrito = true;
   }
   $this->carrito=$_SESSION['carrito'];
 }  // fin constructor

 // metodo que me devuelve el numero de articulos en el carrito
 public function getArticulosTotal(){
  return $this->carrito['articulosTotal'];
 }
 // metodo que devuelve el importe total que existe en el carrito
 public function getImporteTotal(){
  return $this->carrito['precioTotal'];
 }

 // metodo para añadir un articulo al carrito
 public function addArticulo($idArticulo,$nombreArticulo,$precio,$cantidad=1){
 if (!array_key_exists($idArticulo, $this->carrito)) {
  $this->carrito[$idArticulo]['nombreArticulo']=$nombreArticulo;
  $this->carrito[$idArticulo]['precio']=$precio;
  $this->carrito[$idArticulo]['cantidad']=$cantidad;
  $this->carrito[$idArticulo]['total']=$precio*$cantidad;
  $this->carrito['articulosTotal']+=$cantidad;
  $this->carrito['precioTotal']+=$precio*$cantidad;
 }
 $_SESSION['carrito']=$this->carrito;
 }  // fin añadir articulo al carrito

 // metodo para vaciar el carrito
 public function vaciarCarrito(){
 	unset($_SESSION['carrito']);
 	unset($this->carrito);
 }
 
 // metodo para ver el carrito
 public function verCarrito(){
  $cont=0;
  foreach ($this->carrito as $indice => $valor) {
  	if ($indice!='precioTotal' AND $indice!='articulosTotal') {
     $cont++;
     echo "<div class='col-md-4'>";
     echo "<form action='indexcarrito.php' method='post'>";
     echo "Artículo: ".$valor['nombreArticulo']."<br>";
     echo "Precio: ".$valor['precio']."<br>";
     echo "Cantidad: ";
     echo "<input type='number' name='cantidad' value='".$valor['cantidad']."' min='1' max='100'><br>";
     echo "Total: ".$valor['total']."<br>";
     echo "<input type='hidden' name='idArticulo' value='$indice'>";
     echo "<input type='submit' name='eliminar' value='ELIMINAR'> ";
     echo "<input type='submit' name='modificarCarrito' value='MODIFICAR'>";
     echo "<hr></form>";
     echo "</div>";
     if ($cont%3==0) {
     	echo "<div class='clearfix visible-md'></div>";
     }
  	}
  }
 } // fin metodo ver Carrito

 // metodo para eliminar un articulo del carrito
 public function delArticulo($idArticulo){
   $this->carrito['precioTotal']-=$this->carrito[$idArticulo]['total'];
   $this->carrito['articulosTotal']-=$this->carrito[$idArticulo]['cantidad'];
   unset($this->carrito[$idArticulo]);
   $_SESSION['carrito']=$this->carrito;
 }  // fin eliminar articulo del carrito

 // metodo para modificar la cantidad y el total de un articulo en el carrito
 public function modificarCarrito($idArticulo,$cantidad){
  $this->carrito['precioTotal']-=$this->carrito[$idArticulo]['total'];
  $this->carrito['articulosTotal']-=$this->carrito[$idArticulo]['cantidad'];
  $this->carrito[$idArticulo]['cantidad']=$cantidad;
  $this->carrito[$idArticulo]['total']=$cantidad*$this->carrito[$idArticulo]['precio'];
  $this->carrito['precioTotal']+=$this->carrito[$idArticulo]['total'];
  $this->carrito['articulosTotal']+=$cantidad;
  $_SESSION['carrito']=$this->carrito;
 } // fin metodo modificar cantidad


 // resumen del carrito
 public function resumenCarrito(){  
  echo "<table class='table table-striped'>";
  echo "<tr><th>Articulo</th><th>Cantidad</th><th>Precio</th><th>Total</th></tr>";
  $item="";
  $i=1;
  foreach ($this->carrito as $indice => $valor) {
  	if ($indice!="precioTotal" AND $indice!="articulosTotal") {
  	 echo "<tr>";	
  	 echo "<td>".$valor['nombreArticulo']."</td>";
  	 echo "<td>".$valor['cantidad']."</td>";
  	 echo "<td>".$valor['precio']." €</td>";
  	 echo "<td>".number_format($valor['total'],'2','.','')." €</td>";
  	 echo "</tr>";
  	 $item.="<input type='hidden' name='item_name_$i' value='".$valor['nombreArticulo']."'>";
  	 $item.="<input type='hidden' name='amount_$i' value='".$valor['precio']."'>";
  	 $item.="<input type='hidden' name='quantity_$i' value='".$valor['cantidad']."'>";
  	 $item.="<input type='hidden' name='currency_code_$i' value='EUR'>";
  	 $i++;
  	}  	
  }
  echo "<tr>";
  echo "<td>TOTAL.....</td>";
  echo "<td>".$this->carrito['articulosTotal']."</td>";
  echo "<td></td>";
  echo "<td>". number_format($this->carrito['precioTotal'], 2, '.', ' ')." €</td>";
  echo "</tr>";
  echo "</table>";
  echo $item;
 } // fin resumen carrito

} // fin clase Carrito


// clase Pedidos
class Pedidos{
  private $idPedido;

  public function __construct() {}

  // metodo para dar de alta un pedido
  public static function altaPedido($idUsuario,$fechaPedido,$horaPedido,$totalPedido){
  	$bd = new miBaseDatos();
  	$ssql="INSERT INTO pedidos(idUsuario,fechaPedido,horaPedido,totalPedido) VALUES ('$idUsuario','$fechaPedido','$horaPedido','$totalPedido')";
  	$idPedido=$bd->ejecutar($ssql);
  	$bd->cerrar();
  	return $idPedido;
  }  // fin alta pedido


}  // fin clase Pedidos

// Clase LineasPedidos
class LineasPedidos{
  private $idPedido;
  private $idArticulo;

  public function __construct() {}

  // metodo para dar de alta un a linea de pedido
  public static function altaLineaPedido($idPedido,$idArticulo,$cantidad,$precio){
  	$bd = new miBaseDatos();
  	$ssql="INSERT INTO lineaspedidos(idPedido,idArticulo,cantidad,precio) VALUES ('$idPedido','$idArticulo','$cantidad','$precio')";
  	$bd->ejecutar($ssql);
  	$bd->cerrar();
  } // fin metodo para dar de alta linea de pedido



} // fin clase LineasPedidos




 ?>