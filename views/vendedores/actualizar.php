<main class="contenedor contenido-centrado">
    <h1>Actualizar vendedor</h1>
    <a href="/admin" class="boton--verde">Volver</a>

    <?php foreach($errores as $error): ?>
        <div class='alert error'>
            <p><?php echo $error ?>!</p>
        </div>
    <?php endforeach; ?>

    <form class="formulario" method="POST">
        <?php include 'formulario.php'; ?>
        <input type="submit" value="Guardar cambios" class="boton--verde">
    </form>
</main>