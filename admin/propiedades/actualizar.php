<?php
    // Autenticación de usuario
    require '../../includes/funciones.php';
    $auth = estaAutenticado();

    if(!$auth){
        header('Location: /');
    }

    // Validación y sanitización de la URL por Id válido
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id){
        header('location: /admin');
    }

    // Base de datos
    require '../../includes/config/database.php';
    $db = conectarDB();

    // Obtener los datos de la propiedad
    $consultaPropiedad = "SELECT * FROM propiedades WHERE id= ${id}";
    $resultadoPropiedad = mysqli_query($db, $consultaPropiedad);
    $propiedad = mysqli_fetch_assoc($resultadoPropiedad);


    // Consultar para obtener vendedores
    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta);

    // Arreglo con mensajes de errores
    $errores = [];

    $titulo = $propiedad['titulo'];
    $precio = $propiedad['precio'];
    $descripcion = $propiedad['descripcion'];
    $habitaciones = $propiedad['habitaciones'];
    $wc = $propiedad['wc'];
    $estacionamiento = $propiedad['estacionamiento'];
    $vendedorId = $propiedad['vendedorId'];
    $imagenPropiedad = $propiedad['imagen'];

    // Ejecutar el código despues de que el usuario envia el formulario
    
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        
        $titulo = mysqli_real_escape_string( $db, $_POST['titulo']);
        $precio = mysqli_real_escape_string( $db, $_POST['precio']);
        $descripcion = mysqli_real_escape_string( $db, $_POST['descripcion']);
        $habitaciones = mysqli_real_escape_string( $db, $_POST['habitaciones']);
        $wc = mysqli_real_escape_string( $db, $_POST['wc']);
        $estacionamiento = mysqli_real_escape_string( $db, $_POST['estacionamiento']);
        $vendedorId = mysqli_real_escape_string( $db, $_POST['vendedor']);
        $creado = date('Y/m/d');

        // Asignar FILES a una variable
        $imagen = $_FILES['imagen'];


        // Validación del formulario
        if(!$titulo){
            $errores[] = "Debes añadir un título";
        }

        if(!$precio){
            $errores[] = "Debes añadir un precio";
        }

        // Validar imagen por tamaño (1M máx)
        $medida = 1000 * 100;

        if($imagen['size'] > $medida){
            $errores[] = 'La imagen es muy pesada';
        }

        if(strlen($descripcion) < 50){
            $errores[] = "Debes añadir una descripción y debe tener al menos 50 caracteres";
        }

        if(!$habitaciones){
            $errores[] = "El número de habitaciones es obligatorio";
        }

        if(!$wc){
            $errores[] = "El número de baños es obligatorio";
        }

        if(!$estacionamiento){
            $errores[] = "El número lugares de estacionamiento es obligatorio";
        }

        if(!$vendedorId){
            $errores[] = "Elije un vendedor";
        }


        // echo "<pre>";
        // var_dump($errores);
        // echo "</pre>";

        // Revisar que el arreglo de errores este vacio
        if(empty($errores)){
            // Crear carpeta
            $carpetaImagenes = '../../imagenes/';

            if(!is_dir($carpetaImagenes)){
                mkdir($carpetaImagenes);
            }

            $nombreImagen = '';

            // Subida de archivos

            if($imagen['name']){

                // Eliminar imagen previa
                unlink($carpetaImagenes . $propiedad['imagen']);

            // Generar nombre único para las imágenes
            $nombreImagen = md5(uniqid(rand(), true)). ".jpg";

            // Subir la imagen
            move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);
            }else{
                $nombreImagen = $propiedad['imagen'];
            }





            // Insertar datos en la base de datos
            $query = "UPDATE propiedades SET titulo = '${titulo}', precio = ${precio}, imagen = '${nombreImagen}', descripcion = '${descripcion}', habitaciones = ${habitaciones}, wc = ${wc}, estacionamiento = ${estacionamiento}, vendedorId = ${vendedorId} WHERE id = ${id}";

            $resultado1 = mysqli_query($db, $query);
            
            if($resultado1){
                // Redireccionar al usuario
                header('Location: /admin?resultado=2');
            }
        }
    }

    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Actualizar propiedad</h1>

        <a href="/admin" class="boton boton-verde">Volver</a>

        <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
        <?php endforeach; ?>


        <form class="formulario" method="POST" enctype="multipart/form-data">

            <fieldset>
                <legend>Información general</legend>

                <label for="titulo">Titulo:</label>
                <input 
                    type="text" 
                    id="titulo" 
                    name="titulo" 
                    placeholder="Titulo propiedad" 
                    value="<?php echo $titulo; ?>">

                <label for="precio">Precio:</label>
                <input 
                    type="number" 
                    id="precio" 
                    name="precio" 
                    placeholder="Precio propiedad" 
                    value="<?php echo $precio; ?>">

                <label for="imagen">Imagen</label>
                <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

                <img src="/imagenes/<?php echo $imagenPropiedad; ?>" alt="">

                <label for="descripcion">Descripción</label>
                <textarea id="descripción" name="descripcion"><?php echo $descripcion; ?></textarea>
            </fieldset>

            <fieldset>
                <legend>Información propiedad</legend>

                <label for="habitaciones">Habitaciones:</label>
                <input 
                    type="number" 
                    id="habitaciones" 
                    name="habitaciones" 
                    placeholder="Ej: 3" 
                    min="1" max="9" 
                    value="<?php echo $habitaciones; ?>">

                <label for="wc">Baños:</label>
                <input 
                    type="number" 
                    id="wc"
                    name="wc" 
                    placeholder="Ej: 2" 
                    min="1" max="9" 
                    value="<?php echo $wc; ?>">

                <label for="estacionamiento">Estacionamiento:</label>
                <input 
                    type="number" 
                    id="estacionamiento" 
                    name="estacionamiento" 
                    placeholder="Ej: 3" 
                    min="1" max="9" 
                    value="<?php echo $estacionamiento; ?>">
            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>
                <select name="vendedor">
                    <option value="0">--Seleccione--</option>

                    <?php while($vendedor = mysqli_fetch_assoc($resultado)): ?>
                    <option <?php echo $vendedorId === $vendedor['id'] ? 'selected' : ''; ?> value="<?php echo $vendedor['id'];?>"><?php echo $vendedor['nombre'] . " " . $vendedor['apellido']; ?></option>
                    <?php endwhile; ?>

                </select>
            </fieldset>

            <input type="submit" value="Actualizar Propiedad" class="boton-verde">

        </form>
    </main>

<?php incluirTemplate('footer'); ?>