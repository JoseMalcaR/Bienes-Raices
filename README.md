# Bienes-Raices
Proyecto parte del curso de Desarrollo Web(Udemy).

## 🚀 Tecnologías Utilizadas

### Backend
- **PHP** - Lenguaje de programación del lado del servidor
- **MySQL** - Base de datos relacional
- **mysqli** - Extensión de PHP para conectar con MySQL

### Frontend
- **HTML5** - Estructura de las páginas
- **CSS3 / SASS** - Estilos y preprocesador CSS
- **JavaScript** - Interactividad del lado del cliente
- **Modernizr** - Detección de características del navegador

### Herramientas de Desarrollo
- **Gulp** - Automatización de tareas
  - Compilación de SASS a CSS
  - Minificación de CSS y JavaScript
  - Optimización de imágenes
  - Conversión a WebP
  - Autoprefixer para compatibilidad
  - Sourcemaps para debugging
- **npm** - Gestor de paquetes

## 📚 Aprendizajes del Proyecto

### PHP y Base de Datos
- ✅ Conexión a base de datos MySQL con mysqli
- ✅ Operaciones CRUD (Create, Read, Update, Delete)
- ✅ Uso de variables de entorno (.env) para proteger credenciales
- ✅ Autenticación y manejo de sesiones
- ✅ Hasheo de contraseñas con `password_hash()`
- ✅ Validación de formularios del lado del servidor
- ✅ Separación de código con includes y templates

### Frontend
- ✅ Diseño responsive con CSS
- ✅ Uso de SASS para estilos modulares y mantenibles
- ✅ Organización de archivos CSS con arquitectura BEM/modular
- ✅ Manipulación del DOM con JavaScript

### DevOps y Buenas Prácticas
- ✅ Control de versiones con Git
- ✅ Protección de credenciales con .env y .gitignore
- ✅ Automatización de tareas repetitivas con Gulp
- ✅ Optimización de assets (imágenes, CSS, JS)
- ✅ Estructura de proyecto organizada y escalable

## ⚙️ Configuración del Proyecto

1. **Clonar el repositorio**
   ```bash
   git clone [url-del-repo]
   cd Bienes-Raices
   ```

2. **Instalar dependencias**
   ```bash
   npm install
   ```

3. **Configurar base de datos**
   - Crea un `.env`
   - Configura tus credenciales de base de datos y usuario:
     ```
     DB_HOST=localhost
     DB_USER=tu_usuario
     DB_PASS=tu_contraseña
     DB_NAME=bienesraices_crud
     EMAIL=tu_email@ejemplo.com
     PASSWORD=tu_password
     ```

4. **Crear usuario inicial**
   ```bash
   php usuario.php
   ```

5. **Compilar assets**
   ```bash
   npm run dev
   ```

6. **Iniciar servidor local**
   ```bash
   php -S localhost:8000
   ```

7. **Acceder al proyecto**
   - Frontend: `http://localhost:8000`
   - Admin: `http://localhost:8000/admin`


