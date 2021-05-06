<?php

    use App\Propiedad;
    use Intervention\Image\ImageManagerStatic as Image;

    // Autenticación de usuario
    require '../../includes/app.php';
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
    $db = conectarDB();

    // Obtener los datos de la propiedad
    $propiedad = Propiedad::find($id);

    // Consultar para obtener vendedores
    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta);

    // Arreglo con mensajes de errores
    $errores = Propiedad::getErrores();

    // Ejecutar el código despues de que el usuario envia el formulario
    
    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        // Asignar los atributos
        $args = $_POST['propiedad'];

        
        $propiedad->sincronizar($args);
        
        // Subida de archivos
        // Generar nombre único para las imágenes
        $nombreImagen = md5(uniqid(rand(), true)). ".jpg";
        
        if($_FILES['propiedad']['tmp_name']['imagen']){
            $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
            $propiedad->setImagen($nombreImagen);
        }

        // Validación
        $errores = $propiedad->validar();

        // Revisar que el arreglo de errores este vacio
        if(empty($errores)){
                // Almacenar la imagen
                if ($_FILES['propiedad']['tmp_name']['imagen']){
                    $image->save(CARPETA_IMAGENES . $nombreImagen);
                }
                $propiedad->actualizar();
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

            <?php include '../../includes/templates/formulario_propiedades.php'; ?>

            <input type="submit" value="Actualizar Propiedad" class="boton-verde">

        </form>
    </main>

<?php incluirTemplate('footer'); ?>