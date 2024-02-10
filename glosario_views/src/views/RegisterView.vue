<template>
  <div class="form-container">
    <form @submit.prevent="register" class="form">
      <h2 class="form-title font">Registro de Usuario</h2>
      <div class="input-field">
        <input type="text" v-model="name" id="name" required @focus="activeField = 'name'" @blur="activeField = null">
        <label class="font-text" for="name" :class="{ 'active': activeField === 'name' || name }">Nombre:</label>
      </div>
      <div class="input-field">
        <input type="email" v-model="email" id="email" required @focus="activeField = 'email'" @blur="activeField = null">
        <label class="font-text" for="email" :class="{ 'active': activeField === 'email' || email }">Correo electrónico:</label>
      </div>
      <div class="input-field">
        <input type="password" v-model="password" id="password" required @focus="activeField = 'password'" @blur="activeField = null">
        <label class="font-text" for="password" :class="{ 'active': activeField === 'password' || password }">Contraseña:</label>
      </div>
      <button type="submit" class="submit-button font-text">Registrarse</button>
    </form>
  </div>
</template>
  
<script>
import router from '@/router';
import axios from 'axios';

export default {
  data() {
    return {
      name: '',
      email: '',
      password: '',
      activeField: null,
      
    };
  },
  mounted() {
    if (localStorage.getItem('isLogged') == 'true') {
      router.push('/conceptos');
    }
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

<style scoped>
.font {
  font-family: "Outfit", sans-serif;
  font-optical-sizing: auto;
  font-size: 20px;
  font-weight: 900;
  font-style: normal;
}

.font-text {
  font-family: "Outfit", sans-serif;
  font-optical-sizing: auto;
  font-size: 15px;
  font-weight: 500;
  font-style: normal;
}
.form-container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  /* background-color: #f5f5f5; */
  background-image: url("https://img.freepik.com/vector-gratis/fondo-dia-mundial-libro-dibujado-mano_23-2149334623.jpg");
  background-size: cover;
  background-repeat: no-repeat;
}

.form {
  width: 300px;
  padding: 20px;
  background-color: #fff;
  box-shadow: 0 1px 2px 0 rgba(60,64,67,0.3), 0 2px 6px 2px rgba(60,64,67,0.15);
  border-radius: 10px;

}

.form-title {
  text-align: center;
  margin-bottom: 20px;
}

.input-field {
  position: relative;
  margin-bottom: 20px;
  border-bottom: 1px solid #d8d8d8;
}

.input-field input {
  width: 100%;
  border: none;
  outline: none;
  padding: 10px 0;
}

.input-field label {
  position: absolute;
  bottom: 10px;
  left: 0;
  color: #80868b;
  transition: all 0.3s;
}

.input-field label.active {
  transform: translateY(-150%);
  font-size: 12px;
  color: #1a73e8;
}

.submit-button {
  display: block;
  width: 100%;
  padding: 10px;
  background-color: #1a73e8;
  color: #fff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  transition: background-color 0.3s;
}

.submit-button:hover {
  background-color: #185abc;
}
</style>
<!-- <style>
.registration-container {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100vh; /* Ajusta la altura según tus necesidades */
}

.registration-form {
  max-width: 400px; /* Ajusta el ancho máximo del formulario */
  width: 100%;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 8px;
  box-shadow: 0 2px 4px #040e91d7;
  background-color: #fff;
}

.registration-form h2 {
  font-size: 24px;
  margin-bottom: 20px;
}

.registration-form label {
  display: block;
  margin-bottom: 10px;
}

.registration-form input {
  width: 100%;
  padding: 10px;
  margin-bottom: 20px;
  box-sizing: border-box;
  border: 1px solid #ccc;
  border-radius: 4px;
}

.registration-form button {
  background-color: #040e91;
  color: #fff;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-size: 16px;
  transition: background-color 0.3s;
}

.registration-form button:hover {
  background-color: #00144c;
}

color-changing-container {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100vh;
  transition: background-color 1s ease; 
}

.color-changing-container::before {
  content: '';
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: -1;
  background: linear-gradient(to right, #338bff, #2ae639); 
  animation: gradientAnimation 10s infinite linear; 
}

@keyframes gradientAnimation {
  0% {
    background-position: 0% 50%;
  }
  50% {
    background-position: 100% 50%;
  }
  100% {
    background-position: 0% 50%;
  }
}

</style> -->
