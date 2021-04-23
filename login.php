<?php
    require 'includes/app.php';
    // Importar la conexión de la base de datos
    $db = conectarDB();

    // Creación de arreglo para los errores de la autenticación
    $errores = [];

    // Autenticar el usuario
    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
        $password = mysqli_real_escape_string($db, $_POST['password']);

        // Validación del formulario

        if(!$email){
            $errores[] = 'El email es obligatorio o no es válido';
        }

        if(!$password){
            $errores[] = 'La contraseña es obligatoria o no es válida';
        }

        if(empty($errores)){
            // Revisar si un usuario existe
            $query = "SELECT * FROM usuarios WHERE email = '${email}'";
            $resultado = mysqli_query($db, $query);

            if ($resultado->num_rows) {
                // Revisar si el password es correcto
                $usuario = mysqli_fetch_assoc($resultado);

                // Verificar si el password es correcto
                $auth = password_verify($password, $usuario['password']);

                // echo "<pre>";
                // var_dump($usuario);
                // echo "</pre>";
                

                if($auth){
                    // Autenticar al usuario
                    session_start();

                    // Llenar el arreglo de la sesión
                    $_SESSION['usuario'] = $usuario['email'];
                    $_SESSION['login'] = true;

                    // Redirecciónar al usuario
                    header('Location: /admin');

                }else{
                    $errores[] = 'La contraseña no es correcta';
                }
            }else{
                $errores[] = 'El usuario no existe';
            }
        }
    }


    // Incluye el template de Header
    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Iniciar Sesión</h1>

        <?php foreach($errores as $error): ?>
            <div class="alerta error"><?php echo $error; ?></div>
        <?php endforeach; ?>

        <form method="POST" class="formulario" novalidate>
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

<?php incluirTemplate('footer'); ?>