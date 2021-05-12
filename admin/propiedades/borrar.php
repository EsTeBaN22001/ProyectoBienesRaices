<?php
    require '../../includes/app.php';
    incluirTemplate('header');
?>

<?php if($admin = true){?>

    <div class="contenedor-carga">
        <div class="carga"></div>
    </div>

<?php }?>

    <main class="contenedor seccion">
        <h1>Borrar</h1>
    </main>

<?php incluirTemplate('footer'); ?>