<template>
  <!-- Barra de navegacion -->
  <header class="head">
    <nav class="navbar">
      <router-link active-class="active" class="nav-link-name hea" to=""> 📚📕Glosario</router-link>
      <router-link active-class="active" class="nav-link hea" to="/">Home</router-link>
      <router-link v-if="!isLoggedIn" active-class="active" class="nav-link hea" to="/login">Iniciar Sesion</router-link>
      <router-link v-if="!isLoggedIn" active-class="active" class="nav-link hea" to="/register">Registrarse</router-link>
      <router-link v-if="isLoggedIn" active-class="active" class="nav-link hea" to="/palabras">Agregar</router-link>
      <router-link v-if="isLoggedIn" active-class="active" class="nav-link hea" to="/logout">Logout</router-link>
    </nav>
    <p v-if="isLoggedIn" class="welcome-message hea">Bienvenido, <b class="user">{{ userName }} !! 🤠</b></p>
    <p v-else class="welcome-message hea">Bienvenido!! 🤠🥳</p>
  </header>
  
  <router-view/>

</template>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Honk&family=Montserrat:wght@500&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap');


.head{
  /* background-color: burlywood; */
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 5px;
}

.user{
  color: #007bff;
}
.hea {
  font-family: "Outfit", sans-serif;
  font-optical-sizing: auto;
  font-size: 20px;
  font-weight: 500;
  font-style: normal;
}

.honk {
  font-family: "Honk", system-ui;
  font-optical-sizing: auto;
  font-weight: 400;
  font-style: normal;
  font-size: 40px;
  font-variation-settings:
    "MORF" 15,
    "SHLN" 50;
}

.navbar {
  display: flex;
}

.nav-link {
  text-decoration: none;
  color: #333;
  margin-right: 10px;
}

.nav-link-name {
  text-decoration: none;
  color: #333;
  margin-right: 10px;
}

.nav-link:hover {
  color: #007bff;
}

.nav-link.active {
  color: #007bff;
}

.welcome-message {
  font-size: 20px;
  color: #333;
}
</style>

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