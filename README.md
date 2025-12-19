# Caso 19 – Cerrajería 24 Horas

Proyecto desarrollado en Laravel como parte del examen práctico de la asignatura.  
El sistema implementa un módulo CRUD para la gestión de trabajos de una cerrajería, pensado para su uso principal desde dispositivos móviles.

---

## 📌 Descripción del Caso

Luis es cerrajero y recibe llamadas constantemente para realizar trabajos.  
Anteriormente registraba la información en una libreta, lo que ocasionaba pérdida de datos al no tenerla siempre a mano.

Este sistema permite registrar y gestionar los trabajos de forma digital, evitando pérdidas de información y facilitando el seguimiento de cada servicio.

---

## ⚙️ Funcionalidades Implementadas

El sistema permite:

- Registrar trabajos con:
  - Tipo de servicio
  - Dirección
  - Nombre del cliente
  - Teléfono
  - Estado del trabajo (pendiente, en camino, completado, cobrado)
- Registrar automáticamente la fecha y hora del llamado
- Listar todos los trabajos registrados
- Editar trabajos existentes en caso de errores
- Eliminar trabajos de forma lógica (no se eliminan físicamente)
- Visualizar correctamente el sistema desde dispositivos móviles

---

## 🧠 Decisiones de Diseño

- **Eliminación lógica (Soft Deletes):**  
  Los trabajos no se eliminan definitivamente de la base de datos para permitir su posterior revisión o uso en procesos de facturación.

- **Estados controlados mediante ENUM:**  
  Se definieron estados específicos para asegurar consistencia en el flujo de los trabajos.

- **Diseño responsive:**  
  Se utilizó Bootstrap para garantizar una correcta visualización en celulares, considerando que el usuario principal trabaja en la calle.

- **CRUD completo usando Laravel Resource Controllers:**  
  Se utilizó la estructura estándar de Laravel para mantener el código organizado y claro.

---

## 🧩 Tecnologías Utilizadas

- Laravel 12
- PHP 8.4
- MySQL
- Blade Templates
- Bootstrap 5

---

## 🗂 Estructura Principal

- **Modelo:** `Trabajo`
- **Controlador:** `TrabajoController`
- **Rutas:** `Route::resource('trabajos', TrabajoController::class)`
- **Vistas:**  
  - `trabajos/index.blade.php`  
  - `trabajos/create.blade.php`  
  - `trabajos/edit.blade.php`  

---

## 📸 Capturas de Pantalla

El proyecto incluye las siguientes capturas:

1. Vista de listado de trabajos
   
3. Formulario de creación de un trabajo  
4. Vista en modo móvil (responsive)

---

## ✅ Estado del Proyecto

✔ Proyecto funcional  
✔ CRUD completo  
✔ Cumple con los requisitos de la rúbrica  
✔ Adaptado al caso asignado  

---
## 👨‍💻 Autor

<p align="center">
  <strong>Steven Ariel Rosero</strong><br>
  <em>Haciendo que el sistema funcione, a base de fe y café ☕</em><br>
  Estudiante de Ingeniería en Sistemas<br>
  Pontificia Universidad Católica del Ecuador
</p>

