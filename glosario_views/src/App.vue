<template>
  <nav>
    <router-link to="/">Home</router-link> |
    <router-link v-if="!isLoggedIn" to="/login">Inicial Sesion</router-link> |
    <router-link v-if="isLoggedIn" to="/palabras">Agregar</router-link> |
    <router-link v-if="isLoggedIn" to="/logout">Logout</router-link>
    <p v-if="isLoggedIn">Bienvenido, {{ userName }}</p>
    <p v-else>Bienvenido</p>
  </nav>
  <router-view/>
</template>

<script>
export default {
  data() {
    return {
      isLoggedIn: localStorage.getItem('isLogged') == "true",
      userName: localStorage.getItem('userName') || '',
    };
  },
  watch: {
    '$route': 'checkLoginStatus'
  },
  methods: {
    checkLoginStatus() {
      this.isLoggedIn = localStorage.getItem('isLogged') == "true";
      this.userName = localStorage.getItem('user') || '';
    }
  },
  created() {
    this.checkLoginStatus();
  }
}
</script>