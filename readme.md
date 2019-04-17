<p align="center">
<img src="https://avatars1.githubusercontent.com/u/49149236"/>
</p>

## MeliSdk: Listado de publicaciones de usuario

Implementación ejemplo de listado de publicaciones de usuario de Mercadolibre utilizando [MeliSdk](https://github.com/tecnogo/meli-sdk).

Esta implementación está realizada sobre Laravel 5, utilizando el paquete [tecnogo/laravel-meli-sdk](https://github.com/tecnogo/laravel-meli-sdk).

### Requerimientos

 * PHP 7.2
 * ext-curl
 * ext-json

### Instalación

Instalar dependencias PHP:

> `composer update`

Luego las dependencias de npm:

> `npm update`

Compilar los assets:

> `npm run dev`

Crear el archivo `.env` y completar los campos `MELI_APP_ID` y `MELI_APP_SECRET`

> `cp .env.example .env`

Generar el application key:

> `php artisan key:generate`

### Uso

> ` php artisan:serve`

### Selfie

<img src="http://i.imgur.com/kFCulwI.png"/>

### Licencia

© 2019 Valentin Starck <valentin.starck@gmail.com>

Este proyecto está bajo licencia MIT. Para más información: [LICENSE](https://raw.githubusercontent.com/tecnogo/meli-examples-my-items/master/LICENSE)

