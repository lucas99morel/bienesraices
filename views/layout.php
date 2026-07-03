<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/build/css/app.css">
    <title>BienesRaices</title>
</head>

<body>
    <header class="header <?php echo($inicio??false ? "inicio" : "header2"); ?> ">
        <div class="header--superior">
            <div class="contenedor--barras">
                <img src="/build/img/barras.svg" alt="IconoNavegacion">
            </div>
            <a href="/" class="contenedor--logo">
                <img src="/build/img/logo.svg" alt="LogoBienesRaices">
            </a>
        </div>
        <div class="header--nav <?php echo($_SESSION['login']??false ? 'auth' : 'no-auth') ?>">
        </div>
        <?php echo($inicio??false ? 
            "<div class='header--titulo'>
                <h3 class='bold no-margin'>Venta de Casas y Departamentos</h3>
                <p class='no-margin bold'>Exclusivos de Lujo</p>
            </div>" : '');
        ?>
    </header>

    <?php echo $contenido;?>

    <footer class="footer">
        <div class="contenedor footer--contenido">
            <nav class="navegacionF">
                <a href="/nosotros">Nosotros</a>
                <a href="/propiedades">Anuncios</a>
                <a href="/blog">Blog</a>
                <a href="/contacto">Contacto</a>
            </nav>

            <p class="no-margin">Todos los derechos reservados <?php date('Y') ?> &copy;</p>
        </div>
    </footer>
    <script src="/build/js/bundle.min.js"></script>
</body>
</html>