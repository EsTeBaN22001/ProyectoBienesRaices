
<main class="contenedor seccion contenido-centrado">
    <h1 data-cy="heading-login" >Iniciar Sesión</h1>


    <p class="alerta actualizado alerta-login"><span>IMPORTANTE: Este inicio de sesión es solo para los administradores del sitio web.</span></p>

    <?php foreach($errores as $error): ?>
        <div data-cy="alerta-login" class="alerta error"><?php echo $error; ?></div>
    <?php endforeach; ?>

    <form data-cy="formulario-login" method="POST" class="formulario" action="/login">
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