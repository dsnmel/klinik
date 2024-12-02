import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
  plugins: [
    laravel({
      input: ['resources/css/app.css', 'resources/js/app.js'],
      refresh: true,
    }),
  ],
  build: {
    outDir: 'dist', // Menentukan folder output build
    rollupOptions: {
      external: ['axios'], // Menambahkan axios sebagai modul eksternal
    },
  },
});
