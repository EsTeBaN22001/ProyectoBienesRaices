<?php
    require 'includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Casa en venta frente al bosque</h1>

        <picture>
            <source srcset="build/img/destacada.webp" type="image/webp">
            <source srcset="build/img/destacada.jpg" type="image/jpeg">
            <img lazy ="loading" src="build/img/destacada.jpg" alt="Imagen de la propiedad">
        </picture>

        <div class="resumen-propiedad">
            <p class="precio">$3.000.000</p>

            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                    <p>3</p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamento">
                    <p>3</p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono dormitorio">
                    <p>4</p>
                </li>
            </ul>

            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam, ipsam laudantium fugit perferendis velit earum odit facilis, corporis amet nam repellendus voluptatem sunt minima tenetur ad! Cumque culpa non corporis!. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cum earum, aperiam perspiciatis deserunt magnam ut rerum ab porro, dolores quo ea assumenda aliquid magni sint sequi tenetur, pariatur fuga necessitatibus.lor. Lorem da dolor deserunt blanditiis.
            </p>

            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure, eos quibusdam placeat nobis sequi, magnam aperiam ipsum dolores quia nesciunt quas veritatis a
            </p>
        </div>
    </main>

<?php incluirTemplate('footer'); ?>