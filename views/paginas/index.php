<main class="contenedor seccion">
    <h2>Mas Sobre Nosotros</h2>
    <div class="sobreNosotros">
        <div class="icono">
            <img src="build/img/icono1.svg" alt="Icono de Seguridad">
            <h3 class="no-margin">Seguridad</h3>
            <p class="no-margin">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ducimus dignissimos laudantium labore. Maxime obcaecati necessitatibus earum quaerat est reiciendis labore, veritatis, quidem exercitationem nemo magni quae optio modi. Praesentium, adipisci?</p>
        </div>
        <div class="icono">
            <img src="build/img/icono2.svg" alt="Icono de Seguridad">
            <h3 class="no-margin">Precio</h3>
            <p class="no-margin">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ducimus dignissimos laudantium labore. Maxime obcaecati necessitatibus earum quaerat est reiciendis labore, veritatis, quidem exercitationem nemo magni quae optio modi. Praesentium, adipisci?</p>
        </div>
        <div class="icono">
            <img src="build/img/icono3.svg" alt="Icono de Seguridad">
            <h3 class="no-margin">A Tiempo</h3>
            <p class="no-margin">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ducimus dignissimos laudantium labore. Maxime obcaecati necessitatibus earum quaerat est reiciendis labore, veritatis, quidem exercitationem nemo magni quae optio modi. Praesentium, adipisci?</p>
        </div>
    </div>

</main>

<section class="propiedades contenedor">
    <h3>Casas y Depas en Venta</h3>
    <div class="cards">
    <?php include __DIR__ . '/listado.php'; ?>
    </div>
    <div class="ver--mas">
        <a href="/propiedades" class="boton--verde">Ver Mas</a>
    </div>
</section>

<section class="contactanos">
    <h2>Encuentra la casa de tus sueños</h2>
    <p class="no-margin">Llena el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad</p>
    <a href="/contacto" class="boton--verde">Contactanos</a>
</section>

<div class="seccion-inferior contenedor">
    <section class="inferior--blog">
        <h3>Nuestro Blog</h3>
        <article class="blog">
            <picture>
                <source srcset="build/img/blog1.webp" type="image/webp">
                <source srcset="build/img/blog1.jpg" type="image/jpeg">
                <img src="build/img/blog1.jpg" alt="Imagen del Blog1">
            </picture>
            <div class="blog--contenido">
                <a href="/entrada">
                    <h3>Terraza en el techo de tu casa</h3>
                    <p>Escrito el: <span>28/06/2025</span> por: <span> Admin</span></p>
                    <p>Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero</p>
                </a>
            </div>
        </article>
        <article class="blog">
            <picture>
                <source srcset="build/img/blog2.webp" type="image/webp">
                <source srcset="build/img/blog2.jpg" type="image/jpeg">
                <img src="build/img/blog2.jpg" alt="Imagen del Blog2">
            </picture>
            <div class="blog--contenido">
                <a href="/entrada">
                    <h3>Guia para la decoracion de tu hogar</h3>
                    <p>Escrito el: <span>28/06/2025</span> por: <span> Admin</span></p>
                    <p>Maximiza el espacio en tu hogar con esta guia, aprende a combinar muebles y colores para darle vida a tu espacio</p>
                </a>        
            </div>
        </article>
    </section>
    <section class="inferior--testimonial">
        <h3>Testimoniales</h3>
        <div class="testimonial">
            <blockquote>
                El personal se comportó de una excelente forma, muy buena atención y la casa que me ofrecieron cumple con todas mis expectativas.
            </blockquote>
            <p>- Liqui Morel</p>
        </div>
    </section>
</div>