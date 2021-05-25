<?php
    require '../../includes/app.php';

    use App\Vendedor;

    // Autenticación del usuario
    estaAutenticado();

    // Validar que sea un ID válido
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id){
        header('Location: /admin');
    }

    // Obtener el arreglo del vendedor
    $vendedor = Vendedor::find($id);

    // Arreglo con los mensajes de errores
    $errores = Vendedor::getErrores();
    
    // Ejecutar el código despues de que el usuario envia el formulario
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        // Asignar los valores
        $args = $_POST['vendedor'];

        $vendedor->sincronizar($args);
        
        // validar
        $errores = $vendedor->validar();

        if(empty($errores)){
            $vendedor->guardar();
        }
    }

    incluirTemplate('header');
?>

<?php if($admin = true){?>

    <div class="contenedor-carga">
        <div class="carga"></div>
    </div>

<?php }?>

<main class="contenedor seccion">
        <h1 class="m-0 mt-4">Actualizar vendedor/a</h1>

        <a href="/admin" class="boton boton-verde">Volver</a>

        <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
        <?php endforeach; ?>


        <form class="formulario" method="POST">

            <?php include '../../includes/templates/formulario_vendedores.php' ?>

            <input type="submit" value="Actualizar vendedor/a" class="boton-verde">

        </form>
    </main>

<?php incluirTemplate('footer'); ?>