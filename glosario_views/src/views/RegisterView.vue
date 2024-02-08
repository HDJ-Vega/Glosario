<template>
    <div>
      <h2>Registro de Usuario</h2>
      <form @submit.prevent="register">
        <label for="name">Nombre:</label>
        <input type="text" v-model="name" required>
  
        <label for="email">Correo electrónico:</label>
        <input type="email" v-model="email" required>
  
        <label for="password">Contraseña:</label>
        <input type="password" v-model="password" required>
  
        <button type="submit">Registrarse</button>
      </form>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        name: '',
        email: '',
        password: ''
      };
    },
    methods: {
      register() {
        axios.post(`${this.$ruta.value}/register`, {
          name: this.name,
          email: this.email,
          password: this.password
        })
        .then(response => {
          console.log(response.data);
          
        })
        .catch(error => {
          console.error(error);
        });
      }
    }
  };
  </script>
<style>

</style>
