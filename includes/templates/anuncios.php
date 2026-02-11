 <?php  
    //Importar la conexión
    $db = conectarDB();

    //Consultar
    $query = "SELECT * FROM propiedades LIMIT 3";
    
    //Obtener los resultados
    $resultado = mysqli_query($db, $query);
 
 ?>
 
 <div class="contenedor-anuncios">
            <?php while( $propiedad = mysqli_fetch_assoc($resultado) ): ?>
            <div class="anuncio">   
                <picture>
                    <img src="imagenes/<?php echo $propiedad['imagen']; ?>" alt="Imagen de <?php echo $propiedad['titulo']; ?>">
                </picture>

                <div class="contenido-anuncio">
                    <h3><?php echo $propiedad['titulo']; ?></h3>
                    <p><?php echo $propiedad['descripcion']; ?></p>
                    <p class="precio">$<?php echo number_format($propiedad['precio']); ?></p>

                    <ul class="iconos-caracteristicas">
                        <li>
                            <img class="icono" loading="lazy" alt="build/img/icono_wc.svg" src="build/img/icono_wc.svg">
                            <p><?php echo $propiedad['wc']; ?></p>
                        </li>
                        <li>
                            <img class="icono" loading="lazy" alt="build/img/icono_wc.svg" src="build/img/icono_estacionamiento.svg">
                            <p><?php echo $propiedad['estacionamiento']; ?></p>
                        </li>
                        <li>
                            <img class="icono" loading="lazy" alt="build/img/icono_wc.svg" src="build/img/icono_dormitorio.svg">
                            <p><?php echo $propiedad['habitaciones']; ?></p>
                        </li>

                    </ul>

                    <a href="anuncio.php?id=<?php echo $propiedad['id']; ?>" class="boton-amarillo-block">
                        Ver Propiedad
                    </a>
                </div><!--.contenido-anuncio-->
            </div><!--.anuncio-->
            <?php endwhile; ?>
        </div><!--.contenedor-anuncio-->


<?php  
 //Cerrar la conexión
 mysqli_close($db);
?>