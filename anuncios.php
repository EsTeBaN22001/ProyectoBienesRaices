<?php
    require 'includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <section class="seccion contenedor">
            <h2>Casas y departamentos en venta</h2>
    
            <?php 
                $limite = 9;
                include 'includes/templates/anuncios.php';
            ?>
        </section>
    </main>

    <?php incluirTemplate('footer'); ?>