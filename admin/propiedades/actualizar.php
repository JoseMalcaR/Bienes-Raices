<?php 

    require '../../includes/app.php';

    use App\Propiedad;
    use App\Vendedor;
    use Intervention\Image\Drivers\Gd\Driver;
    use Intervention\Image\ImageManager;

    
    estaAutenticado();


    //Validar la URL por ID valido
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id) {
        header('Location: /admin');
    }

    //Obtener los datos de la propiedad
    $propiedad = Propiedad::find($id);

    //Consultar para obtener los vendedores
    $vendedores = Vendedor::all();

    //Arreglo con mensajes de errores
    $errores = Propiedad::getErrores();



    //Ejecutar el codigo despues de que el usuario envie el formulario
    if($_SERVER['REQUEST_METHOD'] === 'POST') {


        $propiedad->sincronizar($_POST['propiedad']);

        //Validacion
        $errores = $propiedad->validar();

        //Subida de Archivos
        $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";
        if($_FILES['propiedad']['tmp_name']['imagen']) {
            $manager = new ImageManager(new Driver());
            $imagen = $manager->read($_FILES['propiedad']['tmp_name']['imagen'])->cover(800, 600);
            $propiedad->setImagen($nombreImagen);
        }

        //revisar que el arreglo de errores este vacio
        if(empty($errores)) {
            //Crear carpeta si no existe
            if(!is_dir(CARPETA_IMAGENES)) {
                mkdir(CARPETA_IMAGENES, 0755, true);
            }
            
            //Almacenar la imagen en el servidor si hay una nueva imagen
            if(isset($imagen)) {
                $imagen->save(CARPETA_IMAGENES . '/' . $nombreImagen);
            }
           
            $propiedad->guardar();
        }

 
    }

  
    incluirTemplate('header');
?>
    <main class="contenedor seccion">
        <h1>Actualizar</h1>

        <a href="/admin" class="boton boton-verde">Volver</a>
    
        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>
    
        <form class="formulario" method="POST"  enctype="multipart/form-data">
            <?php include '../../includes/templates/formulario_propiedades.php'; ?>

            <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">
            </form>
    
    
    </main>
<?php
  incluirTemplate('footer');
?>