<main class="contenedor seccion contenido-centrado">
    <h1 class="bold">Contacto</h1>

    <?php if (!is_null($mensaje)): ?>
        <div class="alert exito">
            <p><?php echo $mensaje; ?></p>
        </div>
    <?php endif; ?>

    <picture>
        <source srcset="build/img/destacada3.webp" type="image/webp">
        <source srcset="build/img/destacada3.jpeg" type="image/jpeg">
        <img src="build/img/destacada3.jpg" alt="Imagen Del Contacto">
    </picture>

    <h2>Llene el formulario de Contacto</h2>

    <form class="formulario" method="POST" action="/contacto">
        <fieldset>
            <legend>Informacion Personal</legend>

            <label for="nombre">Nombre:</label>
            <input type="text" placeholder="Tu Nombre" id="nombre" name="contacto[nombre]" required>

            <label for="mensaje">Mensaje:</label>
            <textarea id="mensaje" name="contacto[mensaje]" required></textarea>
        </fieldset>

        <fieldset>
            <legend>Información sobre la propiedad</legend>

            <label for="vende-compra">Vende o Compra:</label>
            <select id="vende-compra" name="contacto[tipo]" required>
                <option value="" disabled selected>~~ Seleccione una opcion ~~</option>
                <option value="Compra">Compra</option>
                <option value="Vende">Vende</option>
            </select>

            <label for="precio-presup">Precio o Presupuesto</label>
            <input type="number" id="precio-presup" min="1" name="contacto[precio]" required>
        </fieldset>

        <fieldset>
            <legend>Información sobre la propiedad</legend>

            <p>Como desea ser contactado</p>
            
            <div class="contactar">
                <div class="contactar--opcion">
                    <label for="contactar-tel">Telefono</label>
                    <input type="radio" value="tel" name="contacto[contacto]" id="contactar-tel" required>
                </div>

                <div class="contactar--opcion">
                    <label for="contactar-email">Email</label>
                    <input type="radio" value="email" name="contacto[contacto]" id="contactar-email" required>
                </div>
            </div>

            <div class="tipoContacto">
                <!-- HTML a agregar segun el tipo elegido -->
            </div>
        </fieldset>
        
        <input type="submit" value="Enviar" class="boton--verde">
    </form>
</main>
