import { createRouter, createWebHistory } from 'vue-router'
import Login from "@/views/LoginView.vue"
import Logout from "@/views/LogoutView.vue"
import RegisterView from "@/views/RegisterView.vue"
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
    path: '/register',
    name: 'register',
    component: RegisterView,
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
