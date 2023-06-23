IMPORTANTE:

Para ejecutar la aplicación necesita iniciar dos servidores al mismo tiempo, en una terminar deberá ejecutar "npm run dev" y en otra deberá ejecutar "php artisan serve", para posteriormente abrir el puerto que le indica este pultimo servidor.

TECNOLOGÍAS:
- La App está construida en Laravel, diseñada con el patrón de MVC.
- Consta de tres bases de datos relacionadas:
        La tabla "pro_proceso" que cuenta con las columnas "id", "Pro_Prefijo" y "Pro_Nombre"; en la que se almacenan los procesos de los documentos.
        La tabla "tip_tipo_doc" que cuenta con las columnas "id", "Tip_Nombre" y "Tip_Prefijo"; en la que se almacenan los tipos de documentos.
        La tabla "pro_proceso" que cuenta con las columnas "id", "Doc_Nombre", "Doc_Codigo", "Doc_Contenido", "Doc_id_tipo", "Doc_id_proceso"; en la que se almacena la información de los documentos; sus dos últimas columnas se encuentran relacionadas con los id's de las otras dos tablas.
- Para construir las bases de datos ejecute las migraciones que se encuentran dentro de database/migrations.
- Para registrar los valores de las tablas "procesos" y "tipos" ejecute los respectivos seeders que se encuentran dentro de database/seeders.

Modelos:
Se creó un modelo por cada base de datos, dentro de sus respectivas clase se especificó la BD con la que trabajan y se realizó la relación entre ellas, a través del primary_key.
Puede encontrar los modelos dentro de app/Models.

Vistas:
- Todas las vistas de la app se encuentran en la carpeta AppDocs, dentro de resources/viwes.

Controladores:
Se creó un sólo archivo controlador para todo el CRUD, allí podrá encontrar la forma en la que se crean, se leen, se eliminan y se actualizan los registros de la tabla "doc_documento"

Rutas:
Las rutas se encuentran definidas en el archivo web.php dentro de resources/viwes/routes.


--------
Frente a cualquier duda por favor comunicarse con Cristian Maldonado a través del correo crissmaldonadoh@gmail.com
--------
