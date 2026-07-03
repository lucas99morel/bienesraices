# Bienes Raíces MVC

Aplicación web para la administración de venta, compra y gestión de propiedades inmobiliarias.

> Proyecto académico realizado como parte del curso **"Desarrollo Web Completo con HTML5, CSS3, JS, PHP y MySQL"** (Udemy).

## Stack

- **Backend:** PHP (MVC, router custom con `Router.php`)
- **Base de datos:** MySQL
- **Frontend:** HTML, JavaScript, SCSS
- **Gestión de dependencias:** Composer (PHP) y npm (JS/assets)
- **Build de assets:** Gulp

## Requisitos previos

- PHP >= 8.0
- Composer
- Node.js y npm
- MySQL (o MariaDB)
- Servidor local (opcional): XAMPP, Laragon, o `php -S`

> **Nota:** los comandos de este README están pensados para **Windows PowerShell**. Si usás CMD o una terminal Unix (Mac/Linux), algunos comandos (como el de importar la base de datos) pueden variar.

## Instalación

1. Cloná el repositorio
   ```powershell
   git clone https://github.com/lucas99morel/bienesraices.git
   cd bienesraices
   ```

2. Instalá dependencias de PHP
   ```powershell
   composer install
   ```

3. Instalá dependencias de Node
   ```powershell
   npm install
   ```

4. Configurá la conexión a la base de datos

   Copiá el archivo de ejemplo includes/config/database.example.php y completá tus propios datos y credenciales:
   ```powershell
   Copy-Item includes/config/database.example.php includes/config/database.php
   ```
   Editá `includes/config/database.php` con tu usuario/contraseña de MySQL local.

5. Creá la base de datos e importá el esquema

   El repo incluye `database/schema.sql` con la estructura completa (`vendedores`, `propiedades`, `usuarios`), en el orden correcto según sus relaciones. Se crea la base automáticamente si no existe:
   ```powershell
   Get-Content database/schema.sql | mysql -u root -p
   ```

6. Compilá los assets (CSS/JS)
   ```powershell
   npm run dev
   ```
   > Corre Gulp, que compila SCSS a CSS, procesa/minifica JS y optimiza imágenes.

7. Levantá el servidor PHP

   Parado dentro de la carpeta `public/` (no en la raíz del proyecto):
   ```powershell
   cd public
   php -S localhost:3000
   ```

8. Abrí el navegador en `http://localhost:3000`

## 📁 Estructura del proyecto

```
bienesraices/
├── controllers/    # Controladores de la aplicación
├── database/        # schema.sql (estructura de la BD)
├── includes/       # Archivos de configuración e inicialización
├── models/         # Modelos (interacción con la base de datos)
├── public/         # Punto de entrada, assets compilados (CSS/JS)
├── src/            # Clases y lógica de soporte
├── views/          # Vistas (plantillas)
├── Router.php      # Router custom de la aplicación
├── composer.json    # Dependencias PHP
├── package.json     # Dependencias Node / scripts de build
└── gulpfile.js       # Configuración de tareas Gulp
```
