<?php 


    require '../../includes/app.php';

    use App\Propiedad;
    use Intervention\Image\Drivers\Gd\Driver;
    use Intervention\Image\ImageManager;


    estaAutenticado();


    //Base de datos
    $db = conectarDB();

    $propiedad = new Propiedad();

    //Consultar para obtener los vendedores
    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta);
    $vendedores = [];
    while($row = mysqli_fetch_assoc($resultado)) {
        $vendedores[] = (object) $row;
    }

    //Arreglo con mensajes de errores
    $errores = Propiedad::getErrores();


    //Ejecutar el codigo despues de que el usuario envie el formulario
    if($_SERVER['REQUEST_METHOD'] === 'POST') {

        $propiedad = new Propiedad($_POST['propiedad']);

        //Generar un nombre unico para la imagen
        $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";
        
        if($_FILES['propiedad']['tmp_name']['imagen']) {
            $manager = new ImageManager(new Driver());
            $imagen = $manager->read($_FILES['propiedad']['tmp_name']['imagen'])->cover(800, 600);
            $propiedad->setImagen($nombreImagen);
        }


        $errores = $propiedad->validar();
 
        //revisar que el arreglo de errores este vacio
        if(empty($errores)) {

        // Subida de Archivos
 
        if(!is_dir(CARPETA_IMAGENES)) {
            mkdir(CARPETA_IMAGENES, 0755, true);
        }


        //Guarda la imagen en el servidor solo si se subió una
        if(isset($imagen)) {
            $imagen->save(CARPETA_IMAGENES . "/" . $nombreImagen);
        }


        $resultado = $propiedad->guardar();  
        if ($resultado) {
            //Redireccionar al usuario
            header('Location: /admin/index.php?resultado=1');
            exit;
        }   
        }

 
    }

    incluirTemplate('header');
?>
    <main class="contenedor seccion">
        <h1>Crear</h1>

        <a href="/admin" class="boton boton-verde">Volver</a>
    
        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>
    
        <form class="formulario" method="POST" action="/admin/propiedades/crear.php" enctype="multipart/form-data">
        
            <?php include '../../includes/templates/formulario_propiedades.php'; ?>

            <input type="submit" value="Crear Propiedad" class="boton boton-verde">
        </form>
    
    
    </main>
<?php
  incluirTemplate('footer');
?>