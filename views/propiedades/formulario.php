<fieldset>
    <legend>Informacion General</legend>

    <label for="titulo">Titulo</label>
    <input type="text" placeholder="Titulo Propiedad" id="titulo" name="propiedad[titulo]" value="<?php echo s($propiedad->titulo);?>">

    <label for="precio">Precio</label>
    <input type="number" placeholder="3000000" id="precio" name="propiedad[precio]" value="<?php echo s($propiedad->precio);?>">

    <label for="image">Imagen</label>
    <input type="file" id="image" accept="image/jpeg, image/png, image/webp" name="propiedad[imagen]">
    <?php if ($propiedad->imagen): ?>
        <img src="/imagenes/<?php echo $propiedad->imagen;?>" class="imgActualizar" alt="">
    <?php endif; ?>

    <label for="descrip">Descripcion</label>
    <textarea id="descrip" name="propiedad[descripcion]"><?php echo s($propiedad->descripcion);?></textarea>
</fieldset>
<fieldset>
    <legend>Informacion de la Propiedad</legend>

    <label for="habitaciones">Habitaciones</label>
    <input type="number" placeholder="Ej: 3" id="habitaciones" name="propiedad[habitaciones]" value="<?php echo s($propiedad->habitaciones);?>" min="1">

    <label for="baños">Baños</label>
    <input type="number" placeholder="Ej: 3" id="baños" name="propiedad[wc]" value="<?php echo s($propiedad->wc);?>" min="1">

    <label for="estacionamiento">Estacionamientos</label>
    <input type="number" placeholder="Ej: 3" id="estacionamientos" name="propiedad[estacionamiento]" value="<?php echo s($propiedad->estacionamiento);?>" min="1">
</fieldset>

<fieldset>
    <label for="vendedor">Vendedor</label>
    <select name="propiedad[vendedores_id]" id="vendedor">
        <option value="" selected>~~Seleccione un Vendedor~~</option>
        <?php foreach($vendedores as $vendedor): ?>
            <option value="<?php echo s($vendedor->id); ?>"
                <?php echo($vendedor->id === $propiedad->vendedores_id ? 'selected' : '');  ?>>
                <?php echo s($vendedor->nombre) . " " . s($vendedor->apellido); ?>
            </option>
        <?php endforeach; ?>
    </select>
</fieldset>