# qaronitest
Para correr el proyecto se debe clonar del repositorio con esta url:

git clone https://github.com/manuelcast1820/qaronitest.git

Despues de clonar correr el comando

composer install

configurar el archivo .env

crear una nueva base de datos y asociar las credenciales en el archivo .env

configurar la variable QUEUE_CONNECTION con database en el archivo .env

configrar las variables relacionadas al envio de correo

php artisan migrate

php artisan db:seed

activar la cola de trabajo con el comando

php artisan queue:listen
