<?php
    require 'includes/funciones.php';
    incluirTemplate('header', $inicio=true);
?>

    <main class="contenedor seccion">
        <h1>Más sobre nosotros</h1>

        <div class="iconos-nosotros seccion">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono seguridad">
                <h3>Seguridad</h3>

                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eum totam tempore perspiciatis velit omnis, reiciendis, minima maiores, commodi voluptatibus optio aliquid alias voluptate provident similique sequi. Vitae, nobis. Distinctio, voluptatibus!</p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono precio">
                <h3>Precio</h3>

                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eum totam tempore perspiciatis velit omnis, reiciendis, minima maiores, commodi voluptatibus optio aliquid alias voluptate provident similique sequi. Vitae, nobis. Distinctio, voluptatibus!</p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono tiempo">
                <h3>Tiempo</h3>

                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eum totam tempore perspiciatis velit omnis, reiciendis, minima maiores, commodi voluptatibus optio aliquid alias voluptate provident similique sequi. Vitae, nobis. Distinctio, voluptatibus!</p>
            </div>
        </div>
    </main>

    <section class="seccion contenedor">
        <h2>Casas y departamentos en venta</h2>

        <div class="contenedor-anuncios">
            <div class="anuncio">
                <picture>
                    <source srcset="build/img/anuncio1.webp" type="image/webp">
                    <source srcset="build/img/anuncio1.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/anuncio1.webp" alt="anuncio">
                </picture>
                <div class="contenido-anuncio">
                    <h3>Casa de lujo en el lago</h3>
                    <p>Casa en el lago con exelente vista, acabados de lujo a un exelente precio</p>
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

                    <a href="anuncio.php" class="boton-naranja-block">Ver propiedad</a>
                </div>
            </div>
            <div class="anuncio">
                <picture>
                    <source srcset="build/img/anuncio2.webp" type="image/webp">
                    <source srcset="build/img/anuncio2.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/anuncio1.webp" alt="anuncio">
                </picture>
                <div class="contenido-anuncio">
                    <h3>Casa terminados de lujo</h3>
                    <p>Casa con diseño moderno, así como tecnología inteligente  y amueblada</p>
                    <p class="precio">$2.000.000</p>

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

                    <a href="anuncio.php" class="boton-naranja-block">Ver propiedad</a>
                </div>
            </div>
            <div class="anuncio">
                <picture>
                    <source srcset="build/img/anuncio3.webp" type="image/webp">
                    <source srcset="build/img/anuncio3.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/anuncio1.webp" alt="anuncio">
                </picture>
                <div class="contenido-anuncio">
                    <h3>Casa con piscina</h3>
                    <p>Casa con piscina y acabados de lujo en la ciudad, exelente oportunidad</p>
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

                    <a href="anuncio.php" class="boton-naranja-block">Ver propiedad</a>
                </div>
            </div>
        </div>
        
        <div class="ver-todas alinear-derecha">
            <a href="anuncios.php" class="boton boton-verde">Ver todas</a>
        </div>
    </section>

    <section class="imagen-contacto seccion">
        <h2>Encuentra la casa de tus sueños</h2>
        <p>Llena el formulario de contacto y un asesor se pondrá en contacto contigo en la brevedad</p>

        <a href="contacto.php" class="boton-naranja">Contáctanos</a>
    </section>

    <section class="blog contenedor">
        <div class="contenedor-blog">
            <h3>Nuestro blog</h3>

            <article class="entrada-blog">
                <picture>
                    <source srcset="build/img/blog1.webp" type="image/webp">
                    <source srcset="build/img/blog1.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog1.webp" alt="anuncio">
                </picture>

                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Terraza en el techo de tu casa</h4>

                        <p class="informacion-meta">Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>
    
                        <p>Consejos para construir una terraza en el techo de tu casa, con los mejores materiales y ahorrando dinero.</p>
                    </a>
                </div>
            </article>
            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="image/webp">
                        <source srcset="build/img/blog2.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/blog2.webp" alt="anuncio">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Guía para la decoración de tu hogar</h4>

                        <p class="informacion-meta">Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>
    
                        <p>Maximiza el espacio de tu hogar con esta guía, aprende a combinar muebles y colores para darle vida a tu espacio</p>
                    </a>
                </div>
            </article>
        </div>
        <div class="testimoniales">
            <h3>Testimoniales</h3>

            <div class="contenido-testimoniales">
                <blockquote>
                    El personal se comportó de una exelente forma, muy buena atención y la casa que me ofrecieron cumple con todas mis expectativas.
                </blockquote>
                <p>-Esteban Redón</p>
            </div>
        </div>
    </section>

    <?php incluirTemplate('footer'); ?>