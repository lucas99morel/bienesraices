<main class="contenedor contenido-centrado">
    <h1>Actualizar Propiedad</h1>
    <a href="/admin" class="boton--verde">Volver</a>

    <?php foreach($errores as $error): ?>
        <div class='alert error'>
            <p><?php echo $error ?>!</p>
        </div>
    <?php endforeach; ?>

    <form method="POST" enctype="multipart/form-data" class="formulario">
        <?php include __DIR__ . '/formulario.php'; ?>
        <input type="submit" value="Actualizar" class="boton--verde">
    </form>
</main>