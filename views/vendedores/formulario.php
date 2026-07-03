<fieldset>
    <legend>Informacion General</legend>

    <label for="titulo">Nombre</label>
    <input type="text" placeholder="Tu Nombre" id="titulo" name="vendedor[nombre]" value="<?php echo s($vendedor->nombre);?>">
    
    <label for="apellido">Apellido</label>
    <input type="text" placeholder="Tu Apellido" id="apellido" name="vendedor[apellido]" value="<?php echo s($vendedor->apellido);?>">

    <label for="telefono">Apellido</label>
    <input type="tel" placeholder="Tu Telefono" id="telefono" name="vendedor[telefono]" value="<?php echo s($vendedor->telefono);?>">    
</fieldset>