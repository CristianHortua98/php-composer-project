# PHP Project One - Composer & MySQL

Proyecto desarrollado en PHP puro utilizando Composer para la gestión de dependencias y autoloading de clases mediante PSR-4. Utiliza PDO para la conexión y operaciones CRUD sobre una base de datos MySQL.

## Tecnologías utilizadas

- PHP 8+
- Composer
- MySQL
- PDO
- PHP dotenv
- Autoload PSR-4
- Arquitectura MVC

## Requisitos previos

- PHP 8 o superior.
- Composer.
- MySQL.
- Visual Studio Code (opcional).

## 1. Crear un proyecto desde cero

Crear la carpeta del proyecto y acceder a ella:

```bash
mkdir project-one
cd project-one
```

Inicializar Composer:

```bash
composer init
```

Durante el asistente interactivo configurar los siguientes valores:

| Configuración | Valor |
|---|---|
| Package name | `app/project-one` |
| Description | Descripción del proyecto |
| Minimum Stability | `stable` |
| Package Type | `project` |
| License | Vacío (Enter) |
| Define dependencies | `no` |
| Define dev dependencies | `no` |
| PSR-4 Autoload | `src/` |

## 2. Crear la estructura de carpetas

Desde la raíz del proyecto ejecutar:

```bash
mkdir public
mkdir src
mkdir src/Controllers
mkdir src/Models
mkdir src/Databases
```

## 3. Instalar dependencias

Instalar PHP dotenv para gestionar variables de entorno:

```bash
composer require vlucas/phpdotenv
```

## 4. Configurar el autoload

Composer configurará PSR-4 en `composer.json`.

Ejemplo:

```json
{
    "name": "app/project-one",
    "type": "project",
    "autoload": {
        "psr-4": {
            "Vendor\\ProjectOne\\": "src/"
        }
    },
    "require": {
        "vlucas/phpdotenv": "^5.6"
    }
}
```

Para regenerar el autoload:

```bash
composer dump-autoload
```

## 5. Configurar las variables de entorno

Crear un archivo `.env` en la raíz:

```env
DB_HOST=127.0.0.1
DB_NAME=crud_composer
DB_USER=root
DB_PASSWORD=
```

Configurar las credenciales correspondientes a tu servidor MySQL.

## 6. Crear la base de datos

Ejecutar el siguiente script SQL:

```sql
CREATE DATABASE crud_composer;

USE crud_composer;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    edad INT NOT NULL
);
```

## 7. Instalar dependencias del proyecto

Si estás descargando un proyecto existente:

```bash
composer install
```

Este comando instala las dependencias definidas en `composer.json` y `composer.lock`.

## 8. Ejecutar el proyecto

Desde la raíz del proyecto ejecutar:

```bash
php -S localhost:8000 -t public
```

Abrir el navegador en:

http://localhost:8000

## Estructura del proyecto

```text
project-one/
│
├── public/
│   ├── index.php
│   └── usuarios.php
│
├── src/
│   ├── Controllers/
│   │   └── UsuarioController.php
│   │
│   ├── Models/
│   │   └── Usuario.php
│   │
│   └── Databases/
│       └── Conexion.php
│
├── vendor/
│
├── .env
├── .gitignore
├── composer.json
└── composer.lock
```

## Funcionalidades

El proyecto implementa un CRUD de usuarios con las siguientes operaciones:

| Operación | Descripción |
|---|---|
| Create | Registrar nuevos usuarios. |
| Read | Consultar y listar usuarios. |
| Update | Actualizar información de usuarios. |
| Delete | Eliminar usuarios. |

## Arquitectura

El proyecto utiliza una estructura basada en MVC:

- **Models:** contiene las consultas SQL y la interacción con MySQL mediante PDO.
- **Controllers:** gestiona las solicitudes y comunica los modelos con la interfaz.
- **Databases:** centraliza la conexión a la base de datos.
- **Public:** contiene los archivos de entrada y las interfaces accesibles desde el navegador.

## Comandos principales de Composer

| Comando | Descripción |
|---|---|
| `composer init` | Inicializar un proyecto. |
| `composer require paquete` | Instalar una dependencia. |
| `composer remove paquete` | Eliminar una dependencia. |
| `composer install` | Instalar las dependencias. |
| `composer update` | Actualizar las dependencias. |
| `composer dump-autoload` | Regenerar el autoload. |
| `composer show` | Consultar paquetes instalados. |
| `composer validate` | Validar composer.json. |
| `composer outdated` | Consultar paquetes desactualizados. |

## Seguridad

- Se utilizan consultas preparadas de PDO para reducir el riesgo de inyección SQL.
- Las credenciales de conexión se almacenan en variables de entorno.
- El archivo `.env` debe excluirse del repositorio.
- Se utiliza `htmlspecialchars()` para escapar los datos mostrados en HTML.

## Archivos excluidos de Git

El archivo `.gitignore` debe incluir:

```gitignore
/vendor/
/.env
```

## Objetivo del proyecto

Aprender a desarrollar aplicaciones PHP modernas sin depender de frameworks, utilizando Composer para gestionar dependencias, PSR-4 para cargar clases automáticamente, PDO para interactuar con MySQL y una estructura organizada basada en MVC.