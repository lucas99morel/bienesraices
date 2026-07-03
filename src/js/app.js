document.addEventListener('DOMContentLoaded',function(){
    eventListener();
});

function eventListener(){
    const menu = document.querySelector('.contenedor--barras');
    menu.addEventListener('click',deslizarNav);

    const contactar = document.querySelectorAll('input[name="contacto[contacto]"]');
    contactar.forEach(input => input.addEventListener('click',metodoContacto));
}

function deslizarNav(){
    const headerNav = document.querySelector('.header--nav');
    var navegacion = document.querySelector('.navegacion');
    if (navegacion === null){
        navegacion = document.createElement('nav');
        navegacion.classList.add('navegacion');
        navegacion.innerHTML = `
            <a href="/nosotros">
                <div class="contenedor--icono">
                    <img src="/build/img/users.svg" alt="users">
                </div>
                <p>Nosotros</p>
            </a>
            <a href="/propiedades">
                <div class="contenedor--icono">
                    <img src="/build/img/bellW.svg" alt="bell">
                </div>
                <p>Anuncios</p>
            </a>
            <a href="/blog">
                <div class="contenedor--icono">
                    <img src="/build/img/file-text.svg" alt="textFile">
                </div>
                <p>Blog</p>
            </a>
            <a href="/contacto">
                <div class="contenedor--icono">
                    <img src="/build/img/phone.svg" alt="phone">
                </div>
                <p>Contacto</p>
            </a>
        `;

        if (headerNav.classList.contains('auth')){
            navegacion.innerHTML += `
                <a href="/logout">
                    <div class="contenedor--icono">
                        <img src="/build/img/user-minus.svg" alt="darkMode">
                    </div>
                    <p>Cerrar Sesion</p>
                </a>            
            `
        }
        else if(headerNav.classList.contains('no-auth')){
            navegacion.innerHTML += `
                <a href="/login">
                    <div class="contenedor--icono">
                        <img src="/build/img/user.svg" alt="darkMode">
                    </div>
                    <p>Iniciar Sesion</p>
                </a> 
            `;
        }
        headerNav.appendChild(navegacion);
    }else{
        navegacion.classList.add('ocultar');
        navegacion.addEventListener('animationend',()=>{
            navegacion.remove();
        });
    }
}

function metodoContacto(e){
    const divTipo = document.querySelector('.tipoContacto');
    if (e.target.value == 'tel'){
        divTipo.innerHTML = `
            <label for="telefono">Ingrese aqui:</label>
            <input type="tel" placeholder="Tu Telefono" id="telefono" name="contacto[telefono]">

            <p> Elija la fecha y la hora que desea ser contactado</p>

            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" name="contacto[fecha]">

            <label for="hora">Hora</label>
            <input type="time" id="time" min="09:00" max="18:00" name="contacto[hora]">
        `;
    }
    else{
        divTipo.innerHTML = `
            <label for="email">Ingrese Aqui:</label>
            <input type="email" placeholder="Tuemail@gmail.com" id="email" name="contacto[email]" required>
        `;
    }
}