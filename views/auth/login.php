
<main class="contenedor seccion contenido-centrado">
    <h1>Iniciar Sesión</h1>

    <?php foreach($errores as $error): ?>
        <div class="alerta error"><?php echo $error; ?></div>
    <?php endforeach; ?>

    <form method="POST" class="formulario" action="/login">
        <fieldset>
            <legend>Email y contraseña</legend>

            <label for="email">Email</label>
            <input type="email" name="email" placeholder="Tu Email" id="email">

            <label for="contraseña">Contraseña</label>
            <input type="password" name="password" placeholder="Tu contraseña" id="contraseña">
        </fieldset>

        <input type="submit" value="Iniciar Sesión" class="boton-verde">
    </form>
</main>