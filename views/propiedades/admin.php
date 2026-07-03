<main class="contenedor contenido-centrado">
    <h1>Administrador de BienesRaices</h1>
    <?php if($registro == 1): ?>
        <div class='alert exito'>
            <p>Creado exitosamente!</p>
        </div>
    <?php elseif($registro == 2): ?>
        <div class='alert exito'>
            <p>Actualizado exitosamente!</p>
        </div>
    <?php elseif($registro == 3): ?>
        <div class='alert exito'>
            <p>Eliminado Exitosamente!</p>
        </div>
    <?php endif ?>

    <a href="/propiedades/crear" class="boton--verde">Nueva Propiedad</a>
    <a href="/vendedores/crear" class="boton--amarillo--block">Nuevo Vendedor</a>
</main>

<div class="div--tabla contenedor">
    <h2 class="bold">Propiedades</h2>
    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach($propiedades as $propiedad): ?>
            <tr>
                <td><?php echo $propiedad->id?></td>
                <td><?php echo $propiedad->titulo?></td>
                <td>
                    <div class="contenedor--imagen">
                        <img class="tabla--imagen" src="/imagenes/<?php echo $propiedad->imagen?>" alt="propiedad">
                    </div>
                </td>
                <td>$<?php echo $propiedad->precio?></td>
                <td>
                    <a href="propiedades/actualizar?id=<?php echo $propiedad->id?>" class="boton--amarillo">Actualizar</a>
                    <form class="eliminar" method="POST" action="/propiedades/eliminar" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
                        <input type="hidden" name="tipo" value="propiedad">
                        <input type="submit" value="Eliminar" class="boton--rojo">
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
</div>
<div class="div--tabla contenedor">
    <h2 class="bold">Vendedores</h2>
    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach($vendedores as $vendedor): ?>
            <tr>
                <td><?php echo $vendedor->id?></td>
                <td><?php echo $vendedor->nombre . " " . $vendedor->apellido?></td>
                <td><?php echo $vendedor->telefono ?></td>
                <td>
                    <a href="/vendedores/actualizar?id=<?php echo $vendedor->id?>" class="boton--amarillo">Actualizar</a>
                    <form class="eliminar" method="POST" enctype="multipart/form-data" action="/vendedores/eliminar">
                        <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>">
                        <input type="hidden" name="tipo" value="vendedor">
                        <input type="submit" value="Eliminar" class="boton--rojo">
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
</div>