import { createRouter, createWebHistory } from 'vue-router'
import Login from "@/views/LoginView.vue"
const routes = [
  {
    path: '/',
    name: 'home',
    
  },
  {
    path: '/login',
    name: 'login',
    component:Login,
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
