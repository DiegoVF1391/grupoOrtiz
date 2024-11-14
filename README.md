# Proyecto de Gestión de Productos

Este es un proyecto para gestionar productos, utilizando **Laravel**, **Vue.js**, **Inertia.js** y **TailwindCSS**. La aplicación permite crear, leer, actualizar y eliminar productos a través de una interfaz web y también ofrece una API para interactuar con los productos.

## Requisitos

- PHP >= 8.0
- Composer
- Node.js y npm
- MySQL (o cualquier otra base de datos compatible con Laravel)

## Instalación

Sigue estos pasos para instalar y correr el proyecto en tu entorno local:

### 1. Clonar el repositorio

Primero, clona el repositorio a tu máquina local:

```bash
git clone https://github.com/usuario/proyecto-gestion-productos.git
cd proyecto-gestion-productos
```

### 2. Configuración del entorno

Copia el archivo .env.example a .env:

```bash
cp .env.example .env
```

### 3. Configuración de la base de datos
Abre el archivo .env y configura las credenciales de la base de datos:

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_de_base_de_datos
DB_USERNAME=usuario_de_base_de_datos
DB_PASSWORD=contraseña_de_base_de_datos
```

Asegúrate de crear la base de datos con el nombre especificado en .env.

Además, intenta ingresar algunos ejemplos de manera manual con este archivo SQL:
```bash
-- Creación de la base de datos
CREATE DATABASE IF NOT EXISTS `nombre_de_base_de_datos`;

USE `nombre_de_base_de_datos`;

-- Creación de la tabla products
CREATE TABLE `products` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `description` TEXT NOT NULL,
    `price` DECIMAL(10,2) NOT NULL,
    `stock` INT NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insertar algunos productos de ejemplo
INSERT INTO `products` (`name`, `description`, `price`, `stock`) VALUES
('Producto 1', 'Descripción del producto 1', 100.00, 10),
('Producto 2', 'Descripción del producto 2', 150.50, 20),
('Producto 3', 'Descripción del producto 3', 200.00, 30);
```

### 4. Instalación de dependencias
Ejecuta los siguientes comandos para instalar las dependencias del backend y del frontend:

Backend (Laravel)
```bash
composer install
```

Frontend (Vue.js + TailwindCSS)
```bash
npm install
```

### 5. Migraciones y seeds
Corre las migraciones para crear las tablas necesarias en la base de datos:

```bash
php artisan migrate --seed
```
### 6. Iniciar el servidor
Para correr la aplicación en desarrollo, usa el siguiente comando:

```bash
php artisan serve
Esto iniciará el servidor en http://localhost:8000.
```

### 7. Compilar los assets del frontend
Para compilar y ver los cambios del frontend, ejecuta:

```bash
npm run dev
```

### 8. Interactuar con la API
La API permite realizar operaciones CRUD sobre los productos.

Endpoints disponibles:
GET /api/products: Obtiene una lista de todos los productos.
GET /api/products/{id}: Obtiene los detalles de un producto específico.
POST /api/products: Crea un nuevo producto.
PUT /api/products/{id}: Actualiza un producto existente.
DELETE /api/products/{id}: Elimina un producto.
Ejemplo de uso de la API con curl:
Crear un producto:

```bash
curl -X POST http://localhost:8000/api/products \
-H "Content-Type: application/json" \
-d '{"name": "Producto de prueba", "description": "Descripción", "price": 100, "stock": 10}'
```

Obtener lista de productos:

```bash
Copy code
curl http://localhost:8000/api/products
```

Actualizar un producto:

```bash
curl -X PUT http://localhost:8000/api/products/1 \
-H "Content-Type: application/json" \
-d '{"name": "Producto actualizado", "description": "Nueva descripción", "price": 150, "stock": 20}'
```

Eliminar un producto:

```bash
Copy code
curl -X DELETE http://localhost:8000/api/products/1
```