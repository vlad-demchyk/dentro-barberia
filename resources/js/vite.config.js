import { defineConfig, loadEnv } from 'vite'
import vue from '@vitejs/plugin-vue'

export default defineConfig(({ mode }) => {
  const env = loadEnv(mode, '../', '')
  
  return {
    plugins: [vue()],
    root: './',
    server: {
      port: 5173,
    },
    define: {
      __VITE_API_BASE_URL__: JSON.stringify(env.VITE_API_BASE_URL),
    },
  }
})