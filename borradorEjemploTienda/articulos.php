<?php 
$idSubcat=$_REQUEST['idSubcat'];
$posicion=$_REQUEST['posicion'];
$articulosPorPagina=$_REQUEST['articulosPorPagina'];
$listado=Articulos::listadoArticulos($posicion,$articulosPorPagina,$idSubcat);
?>
<section class="col-md-6">
  <h1>Articulos de la categoria</h1>	
  <div class="row">
<?php 
$conta=0;
foreach ($listado as $indice => $valor) {
 $conta++;
 echo "<div class='col-md-4'>";
 echo "<div class='row'>";
 echo "<div class='col-md-6'>";
 echo $valor['nombreArticulo'];
 echo "<br>Precio: ".$valor['precio']."€";
 echo "</div><div class='col-md-6'>";
 echo "<img src='admin/".$valor['fotoArticulo']."' width='50px'></div></div>"; 
 echo "<a href='indexarticulo.php?idArticulo=".$valor['idArticulo']."'>Ver</a>";
 echo " | <a href='indexarticulos.php?idArticulo=".$valor['idArticulo']."&idSubcat=$idSubcat&alcarrito=ok'><i class='fas fa-cart-plus'></i></a> <hr>";
 echo "</div>";
 if ($conta==3) {
 	echo "<div clearfix visible-md></div>";
 }
}
?>
</div>
<div class="row text-center">
<ul class="pagination">
<?php 
//$articulosPorPagina=6;
$numArticulos=Articulos::numArticulos($idSubcat);
$numPaginas= ceil($numArticulos/$articulosPorPagina);
for ($i=0; $i<$numPaginas; $i++) { 
  $pagina = $i+1;
  $pos = $i * $articulosPorPagina;
  if ($posicion==$pos) {
  	echo "<li class='active'>";
  }else{
  	echo "<li>";
  }
  echo "<a href='indexarticulos.php?posicion=$pos&articulosPorPagina=$articulosPorPagina&idSubcat=$idSubcat'>$pagina</a></li>";
}
 ?>
</ul>
</div>
</section>
		