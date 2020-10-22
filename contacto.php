<?php 
$mensaje="";
if(isset($_REQUEST['enviarcomentario']))
{
  $email=$_REQUEST['email']; 
  $nombre=$_REQUEST['nombre'];
  $comentario=htmlspecialchars($_REQUEST['comentario']);

  if ($email=="" OR $comentario=="" OR $nombre=="") {
    $mensaje="<h2>No puede enviar un comentario sin nombre, email o contenido</h2>";
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

<!DOCTYPE html>
<html lang="es">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Asturmiel - Tienda</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/business-casual.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/contacto.css">

  </head>

  <body>

    <h1 class="site-heading text-center text-white d-none d-lg-block">
      <span class="site-heading-upper text-primary mb-3">Productos artesanos</span>
      <span class="site-heading-lower">Asturmiel</span>
    </h1>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
      <div class="container">
        <a class="navbar-brand text-uppercase text-expanded font-weight-bold d-lg-none" href="#">Asturmiel</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="index.html">Inicio
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="about.html">Sobre nosotros</a>
            </li>
            <li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="products.html">Productos</a>
            </li>
            <li class="nav-item active px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="contacto.php">Contacto</a>
            </li>
            <li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="tiendaOnline/index.php" target="_blank">Tienda on-line</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <section class="page-section cta">
      <div class="container">
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <div class="text-center rounded">
              <h2 class="section-heading mb-5">
                <span class="section-heading-upper">Deseamos escucharte</span>
                <span class="section-heading-lower" id="titgrande">Contacta</span>
              </h2>
              <?=$mensaje ?>
               <!-- La clase cta-inner no permite que funcionen los input  -->
              <form action="contacto.php" method="post">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" autofocus><br>
                <!-- <label for="apellidos">Apellidos:</label>
                <input type="text" name="apellidos"><br> -->
                <label for="email">E-mail:</label>
                <input type="mail" name="email" id="email"><br>
                <label for="comentario">Déjanos tu comentario:</label><br>
                <textarea name="comentario" id="comentario" cols="40" rows="10"></textarea><br>
                <input type="submit" name="enviarcomentario" id="enviarcomentario">
              </form> 
              <p class="address mb-5">
                <em>
                  <strong>Nos encontrarás en:</strong>
                  <br>
                  La Curriquera 56, Salas - Asturias <br>  
                  CP: 33891
                </em>
              </p>
              <p class="mb-0">
                <small>
                  <em>Estamos a tu disposición:</em>
                </small>
                <br>
                Telf. 985 658 985 - 697 325 789 <br>
                asturmiel@gmail.com
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer class="footer text-faded text-center py-5">
      <div class="container">
        <p class="m-0 small">Copyright &copy; Asturmiel 2018</p>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

  <!-- Script to highlight the active date in the hours list -->
  <script>
    $('.list-hours li').eq(new Date().getDay()).addClass('today');
  </script>

</html>
