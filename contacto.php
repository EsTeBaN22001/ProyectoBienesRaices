<?php
    require 'includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Contacto</h1>

        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jpeg">
            <img src="build/img/destacada3.jpg" alt="Imagen de contacto">
        </picture>

        <h2>Llene el formulario de contacto</h2>

        <form class="formulario">
            <fieldset>
                <legend>Información personal</legend>

                <label for="nombre">Nombre</label>
                <input type="text" placeholder="Tu nombre" id="nombre">

                <label for="email">Email</label>
                <input type="email" placeholder="Tu Email" id="email">

                <label for="telefono">Teléfono</label>
                <input type="tel" placeholder="Tu telefono" id="telefono">

                <label for="mensaje">Mensaje:</label>
                <textarea id="mensaje"></textarea>
                
            </fieldset>

            <fieldset>
                <legend>Información sobre propiedad</legend>

                <label for="opciones"></label>
                <select id="opciones">
                    <option value="" disabled selected>-- Seleccione --</option>
                    <option value="Compra">Compra</option>
                    <option value="Vende">Vende</option>
                </select>

                <label for="presupuesto">Precio o presupuesto</label>
                <input type="number" placeholder="Tu precio o presupuesto" id="presupuesto">
            </fieldset>

            <fieldset>
                <legend>Contacto</legend>

                <p>Como desea ser contactado</p>

                <div class="forma-contacto">
                    <label for="contactar-telefono">Teléfono</label>
                    <input name="contacto"type="radio" value="telefono" id="contactar-telefono">
                    <label for="contactar-email">Email</label>
                    <input name="contacto"type="radio" value="email" id="contactar-email">
                </div>

                <p>Si eligió teléfono, elija la fecha y hora</p>

                <label for="fecha">Teléfono</label>
                <input type="date" id="fecha">

                <label for="hora">Teléfono</label>
                <input type="time" id="hora" min="09:00" max="18:00">
            </fieldset>

            <input type="submit" value="Enviar" class="boton-verde">
        </form>
    </main>

    <?php incluirTemplate('footer'); ?>