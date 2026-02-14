<?php 
    require 'includes/app.php';
    use App\Propiedad;


    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id) {
        header('Location: /');
        exit;
    }

    $propiedad = Propiedad::find($id);
    
    if(!$propiedad) {
        header('Location: /');
        exit;
    }
    
    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1><?php echo $propiedad->titulo; ?></h1>

        <img loading="lazy" src="imagenes/<?php echo $propiedad->imagen; ?>" alt="Imagen de la propiedad">

        <div class="resumen-propiedad">
            <p class="precio">$<?php echo number_format($propiedad->precio); ?></p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" loading="lazy" alt="build/img/icono_wc.svg" src="build/img/icono_wc.svg">
                    <p><?php echo $propiedad->wc; ?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" alt="build/img/icono_wc.svg" src="build/img/icono_estacionamiento.svg">
                    <p><?php echo $propiedad->estacionamiento; ?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" alt="build/img/icono_wc.svg" src="build/img/icono_dormitorio.svg">
                    <p><?php echo $propiedad->habitaciones; ?></p>
                </li>
            </ul>
            <div class="descripcion-propiedad">
                <p>
                    <?php echo $propiedad->descripcion; ?>
                </p>
        </div>

    </main>
<?php
  incluirTemplate('footer');
?>