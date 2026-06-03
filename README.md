temp
# Portafolio Personal Dinámico

Proyecto desarrollado como actividad práctica para transformar un portafolio estático en una aplicación dinámica conectada a un backend con Laravel.

## Tecnologías utilizadas

- PHP 8.2
- Laravel 9
- MySQL
- Blade Templates
- Tailwind CSS

## Requisitos previos

- PHP 8.2 o superior
- Composer
- MySQL
- Node.js y NPM

## Instalación

**1. Clonar el repositorio:**

    git clone https://github.com/ismael25146/portafolio-practica.git
    cd portafolio-practica

**2. Instalar dependencias de PHP:**

    composer install

**3. Instalar dependencias de Node:**

    npm install

**4. Copiar el archivo de entorno:**

    cp .env.example .env

**5. Generar la clave de la aplicación:**

    php artisan key:generate

**6. Configurar la base de datos en el archivo `.env`:**

    DB_DATABASE=portafolio
    DB_USERNAME=root
    DB_PASSWORD=

**7. Ejecutar las migraciones:**

    php artisan migrate

**8. Crear el enlace de almacenamiento:**

    php artisan storage:link

**9. Iniciar el servidor:**

    php artisan serve

## Funcionalidades

### Portafolio público
- Página de inicio con información personal dinámica
- Formulario de contacto funcional

### Panel de administración

| URL | Descripción |
|-----|-------------|
| /admin | Dashboard principal |
| /admin/profile | Editar información personal y foto |
| /admin/projects | CRUD de proyectos |
| /admin/skills | CRUD de habilidades |
| /admin/experiences | CRUD de experiencia laboral |
| /admin/contact | Ver mensajes de contacto |

## Autor

Ismael Antonio Rodas Santos  
Técnico en Desarrollo de Aplicaciones Informáticas