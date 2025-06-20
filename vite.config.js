import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'
import laravel, { refreshPaths } from 'laravel-vite-plugin'

export default defineConfig({
  plugins: [
    laravel({
      input: [
        'resources/css/app.css',
        'resources/css/web.css',
        'resources/js/app.js',
        'resources/js/web.js',
      ],
      refresh: [...refreshPaths, 'site/templates/**'],
    }),
    vue({
      template: {
        transformAssetUrls: {
          base: null,
          includeAbsolute: false,
        },
      },
    }),
  ],
  resolve: {
    alias: {
      '@': '/resources/js',
    },
  },
})
