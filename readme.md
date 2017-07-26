<p align="center>
Sistema de Portafolios para acreditación
Desarrollado por: Joaquin Cardenas , Javier Richards , Diego Rodriguez y Meraioth Ulloa
</p>

<p align="center">
Requerimientos [1]
<ul>
<li>•	PHP >= 5.6.4
 </li>
<li>•	OpenSSL PHP Extension
 </li>
<li> •	PDO PHP Extension
 </li>
<li>•	Mbstring PHP Extension
 </li>
<li> Tokenizer PHP Extension </li>
<li> •	XML PHP Extension
 </li>
<li> •	ZIP PHP [2]
 </li>

</ul>
</p>
<p>MER

![mer](https://github.com/meraioth/portafolios/Mer.png)
</p>
<p>
-Modificar size file en php.ini (a 15mb o más)

-Crear una base de datos en MySQL con nombre a elección (recordar nombre, usuario y password)

-Clonar repositorio : https://github.com/meraioth/portafolios

-Una vez clonado , crear un archivo llamado “.env” con el siguiente contenido , alojado en la carpeta principal del repositorio (ver .env.example)
</p>

<p>
APP_NAME=Laravel

APP_ENV=local

APP_KEY=

APP_DEBUG=true

APP_LOG_LEVEL=debug

APP_URL=http://localhost



DB_CONNECTION=mysql

DB_HOST=127.0.0.1

DB_PORT=3306

DB_DATABASE=nombre_base_de_datos

DB_USERNAME=root

DB_PASSWORD=


BROADCAST_DRIVER=log

CACHE_DRIVER=file

SESSION_DRIVER=file

QUEUE_DRIVER=sync


REDIS_HOST=127.0.0.1

REDIS_PASSWORD=null

REDIS_PORT=6379


MAIL_DRIVER=smtp

MAIL_HOST=smtp.mailtrap.io

MAIL_PORT=2525

MAIL_USERNAME=null

MAIL_PASSWORD=null

MAIL_ENCRYPTION=null

PUSHER_APP_ID=

PUSHER_APP_KEY=

PUSHER_APP_SECRET=

</p>
<p>Guardar archivo, en terminal ir a directorio de proyecto, 

Ejecutar : 


php artisan key:generate

php artisan migrate

php artisan seed


chmod –R 775 directorio_proyecto.
</p>

<p>[1] https://laravel.com/docs/5.4#installation

[2] http://php.net/manual/es/zip.installation.php

</p>
