<?php

    if(!isset($_SESSION)){
        session_start();
    }

    $auth = $_SESSION['login'] ?? null;

    if(!isset($inicio)){
        $inicio = false;
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="stylesheet" href="../build/css/app.css">
    <link rel="stylesheet" href="../build/css/app.css.map">
</head>

<body>

    <!-- <?php if ($inicio) { ?>

        <div class="contenedor-carga">
            <div class="carga"></div>
        </div>

    <?php } ?> -->


    <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <div class="logo">
                    <a href="/index.php">
                        <img src="/build/img/logo.svg" alt="Logotipo de bienes raices">
                    </a>
                </div>

                <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="Icono de menu responsive">
                </div>

                <div class="derecha">
                    <img src="/build/img/dark-mode.svg" alt="Icono de Dark Mode" class="dark-mode-boton">
                    <nav data-cy="navegacion-header" class="navegacion">
                        <a href="/nosotros">Nosotros</a>
                        <a href="/propiedades">Propiedades</a>
                        <a href="/blog">Blog</a>
                        <a href="/contacto">Contacto</a>
                        <?php if (!$auth) : ?>
                            <a href="/login" class="iniciar-sesion">Iniciar Sesión</a>
                        <?php endif; ?>
                        <?php if ($auth) : ?>
                            <a href="/admin">Admin</a>
                            <a href="/logout" class="cerrar-sesion">Cerrar Sesión</a>
                        <?php endif; ?>
                    </nav>
                </div>
            </div>

            <?php echo $inicio ? "<h1 data-cy='heading-sitio'>Venta de casas y departamentos exclusivos de lujo</h1>" : ""; ?>

        </div>
    </header>


<?php echo $contenido; ?>


    <footer class="footer seccion">
        <div class="contenedor contenedor-footer">
            <nav data-cy="navegacion-footer" class="navegacion nav-footer">
                <a href="/nosotros">Nosotros</a>
                <a href="/propiedades">Propiedades</a>
                <a href="/blog">Blog</a>
                <a href="/contacto">Contacto</a>
            </nav>
        </div>

        <p data-cy="copyright" class="copyright">Todos los derechos reservados <?php echo date('Y'); ?> &copy;</p>
    </footer>

    <script src="../build/js/bundle.js"></script>
</body>

</html>