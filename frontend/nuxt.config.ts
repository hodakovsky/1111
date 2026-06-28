import { fileURLToPath } from 'node:url';
import { resolve } from 'node:path';

const rootDir = fileURLToPath(new URL('./', import.meta.url));

// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  compatibilityDate: '2025-07-15',
  devtools: { enabled: true },
  css: [resolve(rootDir, 'assets/css/main.css')],
  runtimeConfig: {
    public: {
      apiBase: process.env.NUXT_PUBLIC_API_BASE || 'http://localhost:8000',
    },
  },
});
