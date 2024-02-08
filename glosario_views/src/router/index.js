import { createRouter, createWebHistory } from 'vue-router'
import Login from "@/views/LoginView.vue"
import Logout from "@/views/LogoutView.vue"
const routes = [
  {
    path: '/',
    name: 'home',
    
  },
  {
    path: '/login',
    name: 'login',
    component:Login,
  },
  {
    path: '/logout',
    name: 'logout',
    component:Logout,
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
