# 1111

## Render deployment

This repository is configured to deploy as a single Docker service on Render.

- `backend/` — Laravel API
- `frontend/` — Nuxt frontend

The Dockerfile builds the frontend static assets and copies them into the Laravel `public/` folder.

### Render service settings

- `Service Name`: `1111-app`
- `Environment`: `Docker`
- `Branch`: `main`
- `Root Directory`: `.`
- `Dockerfile Path`: `./Dockerfile`
- `Health Check Path`: `/`
- `Auto-Deploy`: `enabled`

### Environment variables

- `APP_ENV=production`
- `APP_DEBUG=false`
- `APP_URL=https://<your-service>.onrender.com`
- `APP_KEY=<generated-app-key>`
- `DB_CONNECTION=pgsql`
- `DB_HOST=<render-db-host>`
- `DB_PORT=5432`
- `DB_DATABASE=<render-db-name>`
- `DB_USERNAME=<render-db-user>`
- `DB_PASSWORD=<render-db-password>`
- `CACHE_DRIVER=file`
- `SESSION_DRIVER=file`
- `QUEUE_CONNECTION=sync`
- `NUXT_PUBLIC_API_BASE=https://<your-service>.onrender.com`
- `NODE_ENV=production`

### Notes

- Use a managed database on Render; do not use SQLite in production.
- `render.yaml` provides the deployment configuration for Render.
- The Docker container serves Laravel via Apache and includes the built Nuxt frontend.
