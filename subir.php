<?php 
include_once 'funciones.php';
$conexion = conexion('galeria', 'root', '');
#Se mata la pagina si no hay conexioin con la BD
if (!$conexion) {
    die();
}
#Se comprueba que se haya enviado los datos y haya enviado archivo
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES)) {
    // echo '<pre>';
    // print_r($_FILES);
    // echo '</pre>';
    #Se comprueba que el archivo sea de tipo imagen con este truco
    //Si no se envio una imagen devuelve false
    $check = @getimagesize($_FILES['foto']['tmp_name']);
    if ($check !== false) {
        $carpetaDestino = "fotos/";//Setteamos la ruta padre
        $archivoSubido = $carpetaDestino . $_FILES['foto']['name'];//Setteamos la ruta y el nombre
        #Se copia el archivo al servidor
        move_uploaded_file($_FILES['foto']['tmp_name'], $archivoSubido);
        #Se guarda en la base de datos la info de la foto y su ruta
        $statement = $conexion->prepare('INSERT INTO fotos (titulo, ruta, descripcion) VALUES (:titulo, :ruta, :descripcion)');
        $statement->execute([
            ':titulo'       => $_POST['titulo'], 
            ':ruta'         => $archivoSubido, 
            ':descripcion' => $_POST['texto']
        ]);
        #Se redirige al index
        header('Location: index.php');
    } else{
        $error = "El archivo no es una imagen o el archivo es muy pesado";
    }
}

require 'views/subir.view.php';

?>