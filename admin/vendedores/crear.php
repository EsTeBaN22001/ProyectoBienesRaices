<?php
    require '../../includes/app.php';

    use App\Vendedor;

    // Autenticación del usuario
    estaAutenticado();

    $vendedor = new Vendedor;

    // Arreglo con los mensajes de errores
    $errores = Vendedor::getErrores();
    
    // Ejecutar el código despues de que el usuario envia el formulario
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        // Crear una nueva instancia
        $vendedor = new Vendedor($_POST['vendedor']);
        
        // Validar que no haya campos vacíos
        $errores = $vendedor->validar();

        // Si no hay errores
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
        <h1 class="m-0 mt-4">Registrar vendedor/a</h1>

        <a href="/admin" class="boton boton-verde">Volver</a>

        <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
        <?php endforeach; ?>


        <form class="formulario" method="POST" action="/admin/vendedores/crear.php">

            <?php include '../../includes/templates/formulario_vendedores.php' ?>

            <input type="submit" value="Registrar vendedor/a" class="boton-verde">

        </form>
    </main>

<?php incluirTemplate('footer'); ?>