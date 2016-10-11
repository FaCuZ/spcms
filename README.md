![Titulo](info/spcms-0-b.png?raw=true "Título")

## Introducción

*Single Page CMS* permite crear de forma rápida y sencilla una estructura para el **desarrollo de aplicaciones web**. Cuenta con una sistema de administración para manejar el contenido dinámico de la página web, entre otras cosas por ejemplo los textos e imágenes.

Una de las funcionalidades más importantes es su sistema de caché que **evita el acceso intensivo de la base de datos y ejecuciones de código php en tiempo de ejecución**, generando un html de todo el contenido en un intervalo de tiempo especificado, reduciendo al mínimo posible la carga del servidor.  

## Funcionalidades

![Administrador](info/spcms-9.png?raw=true "Administrador")

*SinglePage CMS* actualmente cuenta con:
 - Sistema de administración.
 - Administración de usuarios con roles.
 - Manipulación dinámica de Textos.
 - Creación de galerías de imágenes.
 - Formulario para soporte técnico.
 - Registro histórico de cambios.
 - Caché del contenido dinámico.
 - Envíos de email de soporte.
 - Modo de mantenimiento.
 - Instalador automatico.
 - Sistema modular.

## Usuarios

El administrador da la posibilidad de ser ingresado como dos tipos de usuarios distintos: Client y Admin. Está pensado principalmente para los desarrolladores que buscan darle cierto control del contenido a sus clientes.

![Usuarios](info/spcms-5.png?raw=true "Usuarios")

## Cache

El sistema de cache busca evitar totalmente el acceso de la base de datos y ejecuciones de código php en tiempo de ejecución. Este genera un html del contenido con un intervalo de tiempo especificado, reduciendo al mínimo posible la carga del servidor.  

![cache](info/spcms-7.png?raw=true "cache")

## Módulos

Los módulos facilitan el control de las distintas funcionalidades de forma separada, dependiendo los requerimiento del cliente el desarrollador podrá des/habilitar algunas funcionalidades, además de simplificar y agilizar la programación de nuevos agregados.

![Módulos](info/spcms-6.png?raw=true "Módulos")

#### Módulos: Textos e Imágenes

Estos dos módulos permite al cliente cambiar los textos e imágenes que aparecen en la página de forma dinámica. Los cambios se mostrarán sólo cuando el cache sea refrescado, manual o automáticamente.

![Imagenes](info/spcms-2.png?raw=true "Imágenes")

#### Módulos: Soporte y Emails

El módulo de soporte mejora la comunicación del cliente con el desarrollador. Al igual que el módulos Email solo que orientado a la administración de cuentas de emails e ingreso al webmail.

![Soporte](info/spcms-4.png?raw=true "Soporte")


## Instalación

```
$ git clone -o spcms git@github.com:FaCuZ/spcms.git [NOMBRE]

$ composer install
$ npm install

$ sudo chmod -R gu+rwx storage public/images bootstrap/cache
$ find ./modules -name 'module.json' | xargs chmod -v 777
 ```

Una vez clonado el proyecto en lugar de la página aparecerá el instalador que te ayudará a realizar las configuraciones básicas.

![Instalador](info/spcms-8.png?raw=true "Instalador")

## Por hacer

Más allá de que *SPCMS* actualmente esta totalmente funcional, todavía se encuentra bajo desarrollo, algunas funcionalidades no están terminadas y serán agregadas próximamente.

 - [x] Registro histórico.
 - [x] Sistema de cache.
 - [ ] Instalador web.
 - [ ] Administrador de templates.
 - [ ] Manejo de páginas múltiples.
 - [ ] Módulo de blog.
 - [ ] Módulo de carro de compras.