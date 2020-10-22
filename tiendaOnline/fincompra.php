<?php 
if (isset($_SERVER['HTTPS'])) {
  $servidor = "https://".$_SERVER['HTTP_HOST']."/";
}else{
  $servidor = "http://".$_SERVER['HTTP_HOST']."/";
}

$mensaje="";
if (isset($_REQUEST['codigo'])) {
  if ($_REQUEST['codigo']==555) {
   // almacenar el carrito en la bbdd
   $idUsuario=Usuarios::getIdUsuario($_SESSION['usuario']);
   $fechaPedido=date("Y-m-d");
   $horaPedido=date("H:i:s");
   $totalPedido=$micarrito->getImporteTotal();
   // Alta del pedido
   $idPedido=Pedidos::altaPedido($idUsuario,$fechaPedido,$horaPedido,$totalPedido);
   // Alta Lineas del Pedido
   foreach($_SESSION['carrito'] as $indice=>$valor)
   {
   if ($indice!='precioTotal' AND $indice!='articulosTotal') {
   	$idArticulo=$indice;
   	$cantidad=$valor['cantidad'];
   	$precio=$valor['precio'];
   	LineasPedidos::altaLineaPedido($idPedido,$idArticulo,$cantidad,$precio);
   	} 
   } // fin alta lineas pedidos
   $micarrito->vaciarCarrito();
   $micarrito = new Carrito();

  	$mensaje="<h2>El pedido ha sido realizado con exito</h2>
  	<h4>En su puerta en el menor tiempo posible</h4>";
  }
  if ($_REQUEST['codigo']==666) {
  	$mensaje="<h2>El pedido no se ha podido pagar correctamente</h2>
  		<h4>Repita el proceso o póngase en contacto con el administrador</h4>";
  }
}
 ?>
<section class="col-md-6 negrobold">
  <h1>Resumen de la Compra</h1>
  <hr>
  <?php 
  echo "$mensaje";
  if ($misesion->estadoLogin()) {
  	// permitimos mostra el resumen del carrito y relizar la compra
  	?>
  	<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
  	<input type="hidden" name="cmd" value="_cart">
	<input type="hidden" name="upload" value="1">
<!-- direccion de correo de vendedor -->
	<input type="hidden" name="business" value="fran.ast@hotmail.com">
<!-- direccion url de la pagina web -->
	<input type="hidden" name="shopping_url" value="https://pruebafran.000webhostapp.com/tiendaOnline/">
<!-- direccion dentro de mi sitio web una vez hecho el pago -->
	<input type="hidden" name="return" value="https://pruebafran.000webhostapp.com/tiendaOnline/finalizarcompra.php?codigo=555">
<!-- direccion dentro de mi sitio web si se cancela el pago -->
	<input type="hidden" name="cancel_return" value="https://pruebafran.000webhostapp.com/tiendaOnline/finalizarcompra.php?codigo=666">
<!-- definir el tipo de moneda -->
	<input type="hidden" name="currency_code" value="EUR">
	<?php 
	  $micarrito->resumenCarrito();
    ?>
    <div id="divpaypal">
	<input type="image" src="imagenes/paypal1024.jpg" name="submit" alt="Paypal. La forma más segura de comprar y vender." id="paypal">
    </div>
    </form>
    <?php 
 	}else{
   ?>
   <hr>
   <div class="row">
   <h3>Para poder realizar el pago, debe estar registrado en nuestra web.</h3>
   <h4>Puede registrarse en este enlace <a href="altausuario.php">registro</a></h4>
   <h4>Si ya está registrado, acceda desde la parte superior de la web</h4>
   </div>
	<?php 
	 }
	 ?>


</section>