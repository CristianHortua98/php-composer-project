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

Antes de ejecutar el proyecto, asegúrate de tener instalado:

- PHP 8 o superior.
- Composer.
- MySQL.
- Visual Studio Code (opcional).

## Instalación

### 1. Clonar o descargar el proyecto

```bash
git clone URL_DEL_REPOSITORIO
cd project-one
```

### 2. Instalar dependencias

Ejecutar desde la raíz del proyecto:

```bash
composer install
```

Este comando instala las dependencias definidas en `composer.json` y `composer.lock`.

### 3. Configurar las variables de entorno

Crear un archivo `.env` en la raíz del proyecto:

```env
DB_HOST=127.0.0.1
DB_NAME=crud_composer
DB_USER=root
DB_PASSWORD=
```

Configurar las credenciales correspondientes a tu servidor MySQL.

### 4. Crear la base de datos

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

### 5. Actualizar el autoload

Si se realizan modificaciones en la configuración PSR-4 de `composer.json`, ejecutar:

```bash
composer dump-autoload
```

## Ejecución del proyecto

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

## Comandos de Composer

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
