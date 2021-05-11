<?php
    // Autenticación de usuario
    require '../includes/app.php';
    estaAutenticado();

    use App\Propiedad;

    // Implementar un método para obterer todas las propiedades
    $propiedades = Propiedad::all();

    // Muestra mensaje condicional
    $resultado = $_GET['resultado'] ?? null;

    // Eliminar propiedad
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if($id){

            // Eliminar el archivo
            $query = "SELECT imagen FROM propiedades WHERE id = ${id}";

            $resultado = mysqli_query($db, $query);
            $propiedad = mysqli_fetch_assoc($resultado);

            unlink('../imagenes/' . $propiedad['imagen']);

            // Elimina la propiedad
            $query = "DELETE FROM propiedades WHERE id= ${id}";

            $resultado = mysqli_query($db, $query);

            if($resultado){
                header('location: /admin?resultado=3');
            }
        }
    }

    // Incluye un template
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Administrador de Bienes Raices</h1>
        <?php if(intval($resultado) === 1): ?>
            <p class="alerta exito">Anuncio creado correctamente</p>
        <?php elseif(intval($resultado) === 2): ?>
            <p class="alerta actualizado">Anuncio actualizado correctamente</p>
        <?php elseif(intval($resultado) === 3): ?>
            <p class="alerta error">Anuncio eliminado correctamente</p>
        <?php endif; ?>

        <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva propiedad</a>


        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody> <!-- Mostrar los resultados -->
            <?php foreach($propiedades as $propiedad): ?>
                <tr>
                    <td><?php echo $propiedad->id; ?></td>
                    <td><?php echo $propiedad->titulo; ?></td>
                    <td><img src="/imagenes/<?php echo $propiedad->imagen; ?>" alt="Imagen de propiedad" class="imagen-tabla"></td>
                    <td><?php echo $propiedad->precio; ?></td>
                    <td>
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
                            <input type="submit"class="boton-rojo-block" value="Eliminar">
                        </form>
                        <a href="/admin/propiedades/actualizar.php?id=<?php echo $propiedad->id; ?>" class="boton-naranja-block">Actualizar</a>
                    </td>
                </tr>

                <?php endforeach; ?>
            </tbody>
        </table>
    </main>

<?php
    // Cerrar la conexión
    mysqli_close($db);

?>

<?php incluirTemplate('footer'); ?>