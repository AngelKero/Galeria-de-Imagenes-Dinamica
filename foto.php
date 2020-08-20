<?php 
include_once 'funciones.php';

$conexion = conexion('galeria', 'root', '');
#Se mata la pagina si no hay conexioin con la BD
if (!$conexion) {
    die();
}
#El id de la foto sera igual al de la url
$id = (isset($_GET['id']) ? (int)$_GET['id'] : false);
if (!$id) { //Si no hay ningun id en la url se regresa al inicio
    header('Location: index.php');
}
#Se trae la foto de la base de datos
$statement = $conexion->prepare('SELECT * FROM fotos WHERE Id = :id');
$statement->execute([':id' => $id]);
$foto = $statement->fetch();
#Si no hay foto se refresa al index
if (!$foto) {
    header('Location: index.php');
}
#Si no hay titulo sera el nombre del archivo
$foto['titulo'] = 
(!empty($foto['titulo'])) ? 
($foto['titulo']) : 
(pathinfo($foto['ruta'], PATHINFO_BASENAME));
#Si no hay descripcion sera una por defecto
$foto['descripcion'] = 
(!empty($foto['descripcion'])) ? 
($foto['descripcion']) : 
'Sin descripcion.';

require 'views/foto.view.php';