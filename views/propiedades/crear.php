<main class="contenedor seccion">
        <h1 class="m-0 mt-4">Crear</h1>

        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <form class="formulario" method="POST" enctype="multipart/form-data">
            <?php include __DIR__ . '/formulario.php'; ?>
            <input type="submit" value="Crear Propiedad" class="boton-verde">
        </form>
</main>