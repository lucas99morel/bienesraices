<main class="contenedor contenido-centrado">
    <h1 class="bold">LOGIN</h1>
    <?php foreach($errores as $error): ?>
        <div class="alert error">
            <p><?php echo $error;?>!</p>
        </div>
    <?php endforeach; ?>
    <form class="formulario" method="POST">
        <fieldset>
            <label for="email">Email:</label>
            <input type="email" name="email" placeholder="Tuemail@gmail.com" id="email" required>

            <label for="nombre">Contraseña:</label>
            <input type="password" name="passw" placeholder="123456" id="nombre" required>
        </fieldset>
        <input type="submit" value="Iniciar Sesion" class="boton--verde">
    </form>
</main>
