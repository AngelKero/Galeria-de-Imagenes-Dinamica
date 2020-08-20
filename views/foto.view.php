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
            <h1 class="titulo"><?php echo $foto['titulo'] ?></h1>
        </div>
    </header>

    <div class="contenedor">
        <div class="foto">
            <img src="<?php echo $foto['ruta'] ?>" alt="<?php echo $foto['titulo'] ?>">
            <p class="texto"><?php echo $foto['descripcion'] ?></p>
            <a href="#" onclick="window.history.back();" class="regresar"><i class="fas fa-long-arrow-alt-left"></i> Regresar</a>
        </div>
    </div>

    <footer>
        <p class="copyright">Galeria creada por Angel Zaragoza</p>
    </footer>
</body>
</html>