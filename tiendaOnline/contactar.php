<?php 
$mensaje="";
if(isset($_REQUEST['enviarcomentario']))
{
  $email=$_REQUEST['email'];
  $nombre=$_REQUEST['nombre'];
  $comentario=htmlspecialchars($_REQUEST['comentario']);

  if ($email=="" OR $comentario=="") {
  	$mensaje="<h2>No puede enviar un comentario sin email o sin contenido</h2>";
  }else{
  	$destinatario="fran.ast@hotmail.com";
  	// el origen es $email
  	// el mensaje es $comentario
  	$titulo="Comentario enviado desde Asturmiel";
  	$textoaenviar="
  	<html>
  	 <head>
  	   <title>Correo enviado desde Asturmiel</title>
  	 </head>
  	 <body>
	   <h1>Correo desde Asturmiel</h1>
	   <h2>Enviado por: $nombre</h2>
	   <h3>Desde: $email</h3>
	   <p>$comentario</p>
	 </body>
	 </html>";
// Para enviar un correo HTML, debe establecerse la cabecera Content-type
$cabeceras='MIME-Version: 1.0'."\r\n";
$cabeceras.='Content-type: text/html; charset=iso-8859-1'."\r\n";
// Cabeceras adicionales
$cabeceras.="To: Fran <$destinatario>"."\r\n";
$cabeceras.="From: $nombre <$email>"."\r\n";

  	mail($destinatario,$titulo,$textoaenviar,$cabeceras);

  	$mensaje="<h2>Su comentario ha sido enviado. En breve nos pondremos en contacto con usted...</h2>";
  }
}
 ?>
<section class="col-md-6">
  <h1>Contacte con nosotros</h1>
  <?=$mensaje ?>
  <h5>Rellene el siguiente formulario y nos pondremos en contacto con usted</h5>
  <form class="form-horizontal" action="indexcontactar.php" method="post">
    <div class="form-group">
      <label class="control-label col-sm-3" for="email">Email:</label>
      <div class="col-sm-8">
        <input type="email" class="form-control" id="email" placeholder="Introduzca email" name="email">
      </div>
     </div>
     <div class="form-group">
      <label class="control-label col-sm-3" for="nombre">Contacto:</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" id="nombre" placeholder="Nombre de contacto" name="nombre">
      </div>
    </div>    
    <div class="form-group">
      <label class="control-label col-sm-3" for="Comentario">Comentario:</label>
      <div class="col-sm-9">
        <textarea name="comentario" cols="38" rows="6"></textarea>
      </div>
     </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-12">
        <button type="submit" name="enviarcomentario" class="btn btn-default">Enviar comentario</button>
      </div>
    </div>
  </form>
</section>