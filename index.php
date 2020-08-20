<?php 
include_once 'funciones.php';

#Nos conectamos a la BD
$conexion = conexion('galeria', 'root', '');
#Se mata la pagina si no hay conexioin con la BD
if (!$conexion) {
    die();
}

$fotosPagina = 8;//Setteamos las imagenes a mostrar por pagina
#Calculamos las paginas y fotos a mostrar
$paginaActual = (isset($_GET['p']) ? (int)$_GET['p'] : 1);//Se guarda la paginacion por GET, si no hay es 1
$inicio = ($paginaActual > 1) ? ($paginaActual * $fotosPagina - $fotosPagina) : 0;

#Se guarda la informacion de todas las fotos a mostrar por pagina
$statement = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM fotos LIMIT $inicio, $fotosPagina");
$statement->execute();
$fotos = $statement->fetchALl();

#Guardamos el total de registros que hay en la tabla de fotos
$statement = $conexion->prepare("SELECT FOUND_ROWS() as totalFilas");
$statement->execute();
$totalFotos = $statement->fetch()['totalFilas'];


#Calculamos el total de paginas haber y se redondea
$totalPaginas = ($totalFotos / $fotosPagina);
$totalPaginas = ceil($totalPaginas);

require 'views/index.view.php';