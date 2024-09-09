# Prueba Técnica - Sistema de Gestión de Tareas

**Solución Prueba Técnica**

Dev: Anderson Elian Rubio Parrado
Phone: +573108787096
Email: elianrubio98018@gmail.com

Se abordaron y solucionaron los siguientes inconvenientes:

1. Visualización de tareas creadas:
    - Problema: No se podían visualizar las tareas correctamente.
    - Solución: Se creó una ruta GET para obtener todas las tareas junto con sus usuarios. Además, se modificó el componente TaskList para renderizar el JSON adecuadamente. Se implementó el método fetchTasks en las acciones del store de Vue, permitiendo su reutilización en el componente correspondiente.

2. Creación de una tarea:
    - Problema: No se podía crear una nueva tarea.
    - Solución: Se actualizó el backend para retornar respuestas en formato JSON, lo que permitió cargar correctamente la tarea en el store de Vue. Se mantuvo el método addTask en el componente debido a las validaciones específicas presentes.

3. Completado de una tarea:
    - Problema: No se podía marcar una tarea como completada.
    - Solución: Se ajustó el backend para que retornara JSON y se actualizó la tarea en el store de Vue. Se modificó el método completeTask en el componente, enviando solo el campo completed con valor 1. Este método no reutiliza la acción del store para permitir flexibilidad en futuras actualizaciones que puedan requerir la modificación de otros campos.

3. Eliminación de una tarea:
    - Problema: No se podía eliminar una tarea.
    - Solución: Se actualizó el backend para que retornara JSON y se reutilizó la acción del store para eliminar la tarea de forma eficiente.

**Mejoras Implementadas**

- Se agregó validación con estilos de Bootstrap al formulario de creación de tareas, mejorando la experiencia de usuario.
- Se integró la librería SweetAlert2 para mostrar notificaciones en el frontend. Se creó un interceptor en las respuestas para mostrar notificaciones visuales, utilizando verde para respuestas exitosas y rojo para errores.
- Se añadió una capa de servicios en el backend, separando la lógica de negocio de los controladores para mejorar la mantenibilidad y escalabilidad del código.
- Se creó un formato global para respuestas JSON en el backend, facilitando el procesamiento y renderizado de las respuestas en el frontend.
- Se actualizo a bootstrap versión 5.
- Se creo un modal con la lista de usuarios para facilitar saber los correos electrónicos.


- Además, se creó una semilla de datos para insertar 10 usuarios en la base de datos y así facilitar la creación de tareas.

Las tareas completadas no se permiten eliminar. Sin embargo, para permitir la opción de "eliminarlas" sin perder su historial, se recomienda implementar un soft delete. Esto se lograría agregando un campo deleted_at de tipo datetime en la tabla tasks, lo que permitiría marcar las tareas como eliminadas sin borrarlas físicamente de la base de datos.

Este enfoque es ideal para mantener el historial de tareas completadas, lo cual puede ser útil para futuros análisis en reportes u otros casos de uso, preservando la integridad de los datos y garantizando que se puedan restaurar o consultar en cualquier momento.

**IMPORTANTE**

Ejecutar el siguiente comando para correr la seed:

` php artisan db:seed `


## Descripción del Proyecto

Este proyecto es un sistema básico de gestión de tareas desarrollado con Laravel y Vue.js. El objetivo de esta prueba técnica es identificar y corregir errores en el código tanto en el backend como en el frontend. El sistema permite a los usuarios crear, actualizar, eliminar y visualizar tareas.

## Objetivo de la Prueba

El objetivo principal de esta prueba es evaluar tus habilidades para depurar y corregir errores en un proyecto existente que utiliza Laravel, PHP, JavaScript, y Vue.js. Deberás:

- Identificar y corregir errores en el backend relacionado con la creación, actualización, eliminación y validación de tareas.
- Corregir problemas en el frontend que afectan la visualización y manejo de la lista de tareas.
- Asegurarte de que las tareas se gestionen correctamente en la interfaz de usuario.

Además, deberás agregar una funcionalidad extra para filtrar las tareas completadas y pendientes.

## Instrucciones de Instalación

Sigue los siguientes pasos para configurar el proyecto en tu entorno local:


1. **Clona el repositorio:**

       Prueba-Soporte
   
2. **Instala las dependencias de PHP y Node.js:**

   .Composer: Para instalar las dependencias de PHP, ejecuta:
   
        composer install

   .NPM: Para instalar las dependencias de Node.js, ejecuta:

        npm install
        npm run dev

3. **Configura el archivo de entorno .env:**

   .Copia el archivo .env.example a .env:

       cp .env.example .env
   
   .Genera la clave de la aplicación:

       php artisan key:generate
   
   .Configura la base de datos en el archivo .env. Asegúrate de tener una base de datos MySQL disponible y configurada.
   
4. **Ejecuta las migraciones para crear las tablas necesarias:**

       php artisan migrate

5. **Compilar Recursos de Frontend:**

   .Compila los archivos de frontend utilizando Laravel Mix:

       npm run dev

6. **Iniciar el Servidor:**

   .Inicia el servidor de desarrollo de Laravel:

       php artisan serve

       
**Objetivo de la Prueba**

El proyecto contiene errores tanto en el backend (Laravel/PHP) como en el frontend (JavaScript). Tu objetivo es:

 1.Identificar los errores en el código.
 2.Corregir los errores para que la aplicación funcione correctamente.
 3.Probar la aplicación después de realizar las correcciones para asegurarte de que todo funcione como se espera.
 
**Entrega**

Sube el código corregido a un repositorio de GitHub y envíanos el enlace. Asegúrate de describir los problemas que encontraste y cómo los solucionaste en este archivo README.md.

**Notas**

Puedes añadir cualquier comentario adicional sobre las decisiones que tomaste al corregir el código.
Recuerda que el objetivo es demostrar tu capacidad para depurar y mejorar código existente.

¡Buena suerte!
