<?php foreach($propiedades as $propiedad): ?>
    <div class="card">
        <img loading="lazy" src="/imagenes/<?php echo $propiedad->imagen;?>" alt="Anuncio">

        <div class="card--descripcion contenedor">
            <h3 class="no-margin"><?php echo $propiedad->titulo;?></h3>
            <p class="no-margin descripcion"><?php echo $propiedad->descripcion;?></p>
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
        </div>
        <a href="/propiedad?id=<?php echo $propiedad->id;?>" class="boton boton--amarillo">
            Ver Propiedad
        </a>
    </div>
<?php endforeach; ?>