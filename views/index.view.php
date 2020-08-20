<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galerìa</title>
    <link href="https://fonts.googleapis.com/css2?family=Slabo+27px&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b192e847c1.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <header>
        <div class="contenedor">
            <h1 class="titulo">Galeria de Imagenes</h1>
            <a href="subir.php">Subir imagen <i class="fas fa-upload"></i></a>
        </div>
    </header>

    <section class="fotos">
        <div class="contenedor">
            <?php foreach($fotos as $foto): ?>
                <div class="thumb">
                    <a href="<?php echo 'foto.php?id=' . $foto['Id'] ?>">
                        <img src="<?php echo $foto['ruta'] ?>" alt="<?php echo $foto['titulo'] ?>">
                    </a>
                </div>
            <?php endforeach ?>
        </div>
    </section>

    <section class="paginacion">
        <div class="contenedor">
            <?php if($paginaActual > 1): ?>
                <a href="index.php?p=<?php echo $paginaActual - 1; ?>" class="izquierda"><i class="fas fa-long-arrow-alt-left"></i> Pagina Anterior</a>
            <?php endif ?> 
            <?php if($paginaActual != $totalPaginas): ?>
                <a href="index.php?p=<?php echo $paginaActual + 1; ?>" class="derecha">Pagina Siguiente <i class="fas fa-long-arrow-alt-right"></i></a>
            <?php endif ?>     
        </div>
    </section>

    <footer>
        <p class="copyright">Galeria creada por Angel Zaragoza</p>
    </footer>
</body>
</html>