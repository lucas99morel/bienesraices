<main class="contenedor seccion anuncio">
    <h2 class="no-margin"><?php echo $propiedad->titulo; ?></h2>
    <div class="card contenido-centrado contenedor">
        <img loading="lazy" src="/imagenes/<?php echo $propiedad->imagen;?>" alt="Anuncio1">
        <div class="card--descripcion">
            <p class="precio">$<?php echo $propiedad->precio;?></p>

            <ul class="no-margin">
                <li>
                    <img loading="lazy" src="build/img/icono_wc.svg" alt="Icono de water">
                    <p><?php echo $propiedad->wc;?></p>
                </li>
                <li>
                    <img loading="lazy" src="build/img/icono_dormitorio.svg" alt="Icono de dormitorio">
                    <p><?php echo $propiedad->habitaciones;?></p>
                </li>
                <li>
                    <img loading="lazy" src="build/img/icono_estacionamiento.svg" alt="Icono de estacionamiento">
                    <p><?php echo $propiedad->estacionamiento;?></p>
                </li>
            </ul>

            <p class="no-margin no-padding">
                <?php echo $propiedad->descripcion;?>
            </p>
        </div>
    </div>
</main>
