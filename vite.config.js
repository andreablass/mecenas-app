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
    // Install "npm install --save-dev @vitejs/plugin-react" and uncomment if you need React
    // react(),

    // Install "npm install --save-dev @vitejs/plugin-vue" and uncomment if you need Vue
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
})
