# Práctica Fullstack CRUD (Create, Read Update y Delete).
Aplicación web para la adminstración de Alumnos, Profesores y Materias.

## Tecnologías utilizadas


- **Lenguaje:** PHP
- **Framework:** Symfony
- **ORM:** Doctrine
- **Base de Datos:** MySQL (relacional)
- **Frontend:** HTML5, Twig, Bootstrap

## Funcionalidades


- CRUD Alumnos
- CRUD Profesores
- CRUD Materias
- Registro de usuarios
- Login de usuarios
- Logout de usuarios


## Capturas del Frontend
Registro de Usuarios
![image](https://user-images.githubusercontent.com/75576067/201244580-f54be475-e2ba-4292-91fb-f789adfabf7b.png)
Login de Usuarios
![image](https://user-images.githubusercontent.com/75576067/201244624-1c419e84-b074-4ed1-a18e-76752fec512a.png)
CRUD Alumnos
![image](https://user-images.githubusercontent.com/75576067/201244113-68d358a1-ad27-4fec-9721-7a7d9cdffa99.png)
CRUD Profesores
![image](https://user-images.githubusercontent.com/75576067/201244201-73ba5386-3ffa-4a47-8bf5-af890d14f438.png)
CRUD Materias
![image](https://user-images.githubusercontent.com/75576067/201244247-601cbdac-c54b-4e6b-9bb8-50a57d87e554.png)

## Diagrama entidad-relacion (DER), de la Base de Datos.
![image](https://user-images.githubusercontent.com/75576067/201221763-cc4e28aa-5ea5-4c67-bf0b-10c02837b53f.png)


## Documentación del proceso de desarrollo
**Creación de un CRUD Web App:**

1. **Crear el Proyecto:** `composer create-project symfony/website-skeleton crudSymfony` → Nos ubicamos en la carpeta de Xampp y creamos un proyecto en Symfony utilizando Composer en el CMD de Windows, le asignamos el nombre “crudSymfony”; aquí se crearon todas las librerías necesarias para Symfony.
2. **Crear la Base de Datos:** Crear una Base de Datos en MySQL, en este caso se llama “crudsymfonybd”.
3. **Apuntar la BD a nuestro Proyecto:** En el archivo .env, localizamos la cadena de conexión DATABASE y la unimos a la ya creada, ejemplo: `DATABASE_URL=mysql://root@127.0.0.1:3306/crudsymfonybd` .
4. **Crear Tablas y sus CRUD:** estamos trabajando con Doctrine ORM, una buena práctica es utilizarlo, por lo que las tablas serán creadas con esta herramienta. **Pasos a seguir por cada una::**
    1. Crear la Entity con sus relaciones → `php bin/console make:entity`
        1. Creamos una migración → `php bin/console make:migration`
        2. Impactamos los cambios a la base de datos → `php bin/console doctrine:migrations:migrate`
    2. Crear el CRUD de dichas Entity (una vez que esten todas las tablas y relaciones creadas), se creará el Repository y el Controller. → `php bin/console make:crud`
    3. Hacer el Frontend de cada una (editar los template)
    4. A las Entity que NO se le aplcia el comando make:crud, los formularios se deben realizar por separado, como en la tabla User → `php bin/console make:form UserType` , esto para que el usuario tenga acceso a la registración del mismo.
5.  **Servidor Local:** `symfony server:start` → Iniciar el servidor de symfony, nos determina una IP para probar nuestro programa, recordar colocar el endpoint para poder visualizarlo, ejemplo: [https://127.0.0.1:8000/alumnos](https://127.0.0.1:8000/alumnos)
6. **Bootstrap:** Integrar Bootstrap al proyecto para mejorarlo visualmente y utilizar sus componentes Frontend.
    1. Lo traemos de la web oficial en Templates → base.html.twig. (link de css).
    2. Para los forms lo integramos en el `config/packages/twig.yaml` → `form_themes: ['bootstrap_5_layout.html.twig']` . Será aplicado a todos los formularios.                      Web oficial → [https://symfony.com/doc/current/form/bootstrap5.html](https://symfony.com/doc/current/form/bootstrap5.html)
    3. Gracias a que trajimos el CSS en el anterior punto “a”, podremos modificar los botones respetando la estructura de Bootstrap para darle una notable mejora visual, ejemplo: `<button button style="background-color:red" class="btn btn-primary">Eliminar</button>`
7. **Login y Formulario de Registro.**
    1. Crear la Entity User, la misma viene pre-configurada en Symfony, con los atributos necesarios (id, email, roles, password).
        1. Aquí en (Entity → User.php) iniciamos un constructor con los parámetros que queremos utilizar en el formulario de registro posteriormente.
            
             `public function __construct($id = null, $email = null, $password = null){`
            
            `$this->$id = $id;`
            
            `$this->$email = $email;`
            
            `$this->$password = $password;`
            
            `}`
            
    2. Creamos el controller registration para registrar nuevos usuarios → `@Route("/registration", name="user_registration")` , en el mismo integramos el componente de Symfony Security para hashear la password al momento de almacenarla en la base de datos → Complemento utilizado en código y link de la documentación oficial: (`use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface`;) [https://symfony.com/doc/current/security.html#registering-the-user-hashing-passwords](https://symfony.com/doc/current/security.html#registering-the-user-hashing-passwords)
        1. Creación del Formulario de Login, con su controller → [https://symfony.com/doc/current/security.html#form-login](https://symfony.com/doc/current/security.html#form-login) . 
            
            Controller → `php bin/console make:controller Login` 
            
    3. La creación del Repository se ejecuta cuando creamos primeramente la entity.
    4. **Logout** → Creamos la ruta `/logout` en el controller y agregamos los packages correspondientes en el security.yaml, seguimos los pasos de la documentación oficial: [https://symfony.com/doc/current/security.html#customizing-logout](https://symfony.com/doc/current/security.html#customizing-logout) (en la parte ****[Logging Out](https://symfony.com/doc/current/security.html#logging-out)****)
