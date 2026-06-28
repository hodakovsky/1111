# 1111

## Render deployment

This repository is a monorepo with two services:

- `backend/` — Laravel API
- `frontend/` — Nuxt storefront

A Render monorepo configuration file is provided in `render.yaml`.

### Render services

1. **Backend service**
   - root: `backend`
   - type: `php`
   - build command: `composer install --no-dev --optimize-autoloader`
   - start command: `php artisan serve --host 0.0.0.0 --port $PORT`
   - health check: `/`
   - important env vars:
     - `APP_ENV=production`
     - `APP_DEBUG=false`
     - `APP_URL=https://<backend-service>.onrender.com`
     - `DB_CONNECTION=pgsql`
     - `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`

2. **Frontend service**
   - root: `frontend`
   - type: `node`
   - build command: `npm install && npm run build`
   - start command: `npm run preview -- --hostname 0.0.0.0 --port $PORT`
   - health check: `/`
   - important env vars:
     - `NUXT_PUBLIC_API_BASE=https://<backend-service>.onrender.com`
     - `NODE_ENV=production`

### Notes

- `render.yaml` defines both services for Render auto-deploy.
- The backend should use a managed database on Render; do not rely on SQLite in production.
- Set database credentials in Render's environment variables.
- The frontend reads `NUXT_PUBLIC_API_BASE` from environment.
