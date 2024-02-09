import { createRouter, createWebHistory } from 'vue-router'
import Login from "@/views/LoginView.vue"
import Logout from "@/views/LogoutView.vue"
import RegisterView from "@/views/RegisterView.vue"
import Palabras from "@/views/PalabrasView.vue"
import Conceptos from "@/views/ConceptsView.vue"

const routes = [
  {
    path: '/',
    name: 'home',
    component: Conceptos,
    
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
  },
  {
    path: '/palabras',
    name: 'palabras',
    component:Palabras,
  },
  {
    path: '/conceptos',
    name: 'conceptos',
    component:Conceptos,
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
