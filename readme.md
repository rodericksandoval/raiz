# raíz

## Uso


### Con Gulp

#### Instalar Node.js

	curl https://www.npmjs.org/install.sh | sh

#### Instalar Gulp globalmente

	npm install -g gulp

#### Instalar dependencias

Ejecutar en la carpeta src del tema:

	npm install

Corregir permisos de carpeta node_modules:

	chmod -R 775 node_modules

#### Ejecutar tareas

	gulp



### Con Compass

#### Instalar RVM (Con la versión estable de Ruby)

	\curl -sSL https://get.rvm.io | bash -s stable --ruby

#### Instalar dependencias

Ejecutar en la carpeta src del tema:

	bundle install

#### Compilar Sass

	compass watch





## Ideas y recursos de:

- [Sonambulo](https://www.drupal.org/project/Sonambulo)
- [Omega](https://www.drupal.org/project/omega)
- [ZURB Foundation](https://www.drupal.org/project/zurb_foundation)
- [Web Starter Kit](https://developers.google.com/web/starter-kit/)


## Por hacer

* Revisar markup en page.tpl.php, eliminar divs innecesarios.
* Eliminar estilos de prueba en src/sass


## Resolución de problemas

* Drupal notifica errores como:

		Warning: opendir([...]/node_modules/[...]): failed to open dir: Permission denied in file_scan_directory()...

Ejecutar en la carpeta raíz del tema:

	chmod -R 775 node_modules

* Drupal muestra un tema vacío en /admin/appearance (This version is not compatible with Drupal 7.x and should be replaced.) y notifica errores como:

		Warning: uasort(): Array was modified by the user comparison function in system_themes_page()...

Un módulo de gulp incluye un archivo .info que no indica nombre. Agregar un nombre al inicio del archivo. http://drupal.stackexchange.com/a/105342
