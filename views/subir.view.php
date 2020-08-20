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
            <h1 class="titulo">Subir foto</h1>
        </div>
    </header>

    <div class="contenedor">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="formulario" enctype="multipart/form-data">
            <label for="foto">Selecciona tu foto <i class="fas fa-upload"></i></label>
            <input type="file" name="foto" id="foto">

            <label for="titulo">Titulo de la foto</label>
            <input type="text" name="titulo" id="titulo">

            <label for="texto">Descripcion</label>
            <textarea name="texto" id="texto" placeholder="Ingresa una descripcion:"></textarea>

            <?php if(isset($error)): ?>
                <p class="error"><?php echo $error ?></p>
            <?php endif ?>

            <input type="submit" value="Subir Foto" class="submit">
        </form>
        <a href="index.php" class="regresar"><i class="fas fa-long-arrow-alt-left"></i> Regresar</a>
    </div>

    <footer>
        <p class="copyright">Galeria creada por Angel Zaragoza</p>
    </footer>
</body>
</html>