<main class="contenedor seccion">
        <h1 class="m-0 mt-4">Actualizar vendedor/a</h1>

        <a href="/admin" class="boton boton-verde">Volver</a>

        <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
        <?php endforeach; ?>


        <form class="formulario" method="POST">

            <?php include __DIR__ . '/formulario.php'; ?>

            <input type="submit" value="Actualizar vendedor/a" class="boton-verde">

        </form>
</main>