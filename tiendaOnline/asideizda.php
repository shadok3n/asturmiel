<aside class="col-md-3">
 <h4 class="naranja">CATALOGO</h4>
 <div class="panel-group" id="accordion">
 <?php 
 $categorias=Categorias::listadoCategorias();
 foreach($categorias as $indice=>$valor)
 {
  $idCategoria=$valor['idCategoria'];
 ?>
 <div class="panel backmenu">
 <div class="panel-heading">
    <h4 class="panel-title">
      <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$idCategoria ?>"><?=$valor['nombreCategoria'] ?></a>
    </h4>
  </div>
	<div id="collapse<?=$idCategoria ?>" class="panel-collapse collapse">	
 <?php 
  $subcategorias=Subcategorias::listadoSubcategorias($valor['idCategoria']);
  foreach ($subcategorias as $indice2 => $valor2) {
   echo "<div class='panel-body'>";
   echo "<a href='indexarticulos.php?posicion=0&articulosPorPagina=6&idSubcat=".$valor2['idSubcat']."' class='backsubmenu'>".$valor2['nombreSubcat']."</a></div>";
  }
  ?> 
  </div>
  </div>
  <?php 
 } 
  ?>
 </div>
</aside>
		