# DOCKER PHP 8.1 FPM + MYSQL 5.7 + NGINX

Receta base de __docker-compose__ para levantar algún proyecto con __php v8.1__

Dentro de la configuración del __Dockerfile__, instala __composer__.

## ¿Cómo usar este proyecto?

1. Clonar esta receta de docker: [https://github.com/DianaPonceR/docker-php-8-1-mysql-nginx.git](https://github.com/DianaPonceR/docker-php-8-1-mysql-nginx.git)
2. Renombrar el archivo `.env-example` a solo `.env`
3. Dentro del directorio `/src` crear el archivo `index.php` con el siguiente contenido:

    ```php
    <?php
    // index.php

    try {
    echo 'Current PHP version: ' . phpversion();
    echo '<br />';
    
        $host = 'db';
        $dbname = 'database';
        $user = 'user';
        $pass = 'pass';
        $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";
        $conn = new PDO($dsn, $user, $pass);
    
        echo 'Database connected successfully';
        echo '<br />';
    } catch (\Throwable $t) {
    echo 'Error: ' . $t->getMessage();
    echo '<br />';
    }
    ```
    Dentro del directorio `/src` deberán de estar todos los archivos __.php__.
4. Correr el comando desde la raiz de este repo:

   ```bash
   docker-compose up
   ```
5. En caso de necesitar reconstruir la imagen, correr los siguientes comandos:

    ```bash
   docker-compose down
   docker-compose up --build
   
   # reconstruir imagen en el background
   docker-compose up --build -d
   ```