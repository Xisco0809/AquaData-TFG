# AquaData

AquaData es una plataforma web dedicada a la pesca y la conservación marina en el mar Mediterráneo. Permite a usuarios aficionados y expertos consultar información sobre especies marinas, registrar capturas, leer noticias y curiosidades, y participar en la protección del medio ambiente.

## Tecnologías utilizadas

- **Frontend:** [Angular](https://angular.io/) + [Tailwind CSS](https://tailwindcss.com/)
- **Backend:** [Symfony](https://symfony.com/) (PHP)
- **Base de datos:** PostgreSQL (configurable)
- **Otros:** FontAwesome, Google Fonts

## Estructura del proyecto

```
/angular-frontend      # Aplicación Angular (SPA)
  └── src/app
      └── modules
          ├── pages   # Páginas principales (login, registro, menú, etc.)
          └── shared  # Componentes compartidos (navbar, footer)
/symfony-backend       # API y lógica de negocio Symfony
  └── migrations       # Migraciones de base de datos
  └── templates        # Plantillas Twig (si aplica)
```

## Funcionalidades principales

- **Registro e inicio de sesión de usuarios**
- **Catálogo de especies marinas** del Mediterráneo
- **Noticias** y **curiosidades** sobre el mundo marino
- **Agenda personal** para registrar capturas diarias
- **Perfil de usuario** editable
- **Panel de administración** (en desarrollo)
- **Diseño responsive** y moderno con Tailwind CSS

## Instalación

### Frontend (Angular)

1. Ve al directorio del frontend:
   ```bash
   cd angular-frontend
   ```
2. Instala dependencias:
   ```bash
   npm install
   ```
3. Inicia el servidor de desarrollo:
   ```bash
   npm start
   ```
   La app estará disponible en `http://localhost:4080`.

### Backend (Symfony)

1. Ve al directorio del backend:
   ```bash
   cd symfony-backend
   ```
2. Instala dependencias:
   ```bash
   composer install
   ```
3. Configura la base de datos en `.env` o `.env.local`.
4. Ejecuta las migraciones:
   ```bash
   php bin/console doctrine:migrations:migrate
   ```
5. Inicia el servidor de desarrollo:
   ```bash
   symfony server:start
   ```
   La API estará disponible en `http://localhost:8080`.

## Scripts útiles

- **Angular:**  
  - `npm run build` — Compila la app para producción
  - `npm run test` — Ejecuta los tests unitarios

- **Symfony:**  
  - `php bin/console server:run` — Inicia el servidor
  - `php bin/phpunit` — Ejecuta los tests

## Créditos

- Desarrollado por el equipo de AquaData
- Hecho con ❤️ para la conservación marina

## Licencia

Este proyecto está bajo la licencia MIT.

---

