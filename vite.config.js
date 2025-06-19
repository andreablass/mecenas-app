import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'
import laravel, { refreshPaths } from 'laravel-vite-plugin'
import tailwindcss from '@tailwindcss/vite'

export default defineConfig({
  plugins: [
    tailwindcss(),
    laravel({
      input: ['resources/css/web.css', 'resources/js/web.js', 'resources/js/app.js','resources/css/app.css'],
      refresh: [...refreshPaths, 'site/templates/**'],
    }),
    vue({
      template: {
        transformAssetUrls: {
          base: null,
          includeAbsolute: false
        }
      }
    }),
  ],
  resolve: {
    alias: {
      '@': '/resources/js',
    },
  },
  server: {
    proxy: {
      '/api': {
        target: 'http://kirby-mecenas.test',
        changeOrigin: true,
        secure: false,
      }
    }
  }
})
