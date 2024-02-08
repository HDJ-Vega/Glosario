<template>
    <div class="color-changing-container">
   <div class="registration-container">
    <form @submit.prevent="register" ref="registrationForm" class="registration-form">
      <h2>¡Añade tu Palabra!</h2>
      <label for="palabra">Palabra clave:</label>
      <input type="palabra" v-model="palabra" required>

      <label for="concepto">Concepto:</label>
      <input type="concepto" v-model="concepto" required>

      <label for="referencias">Referencias:</label>
      <input type="referencias" v-model="referencias" required>

      <button type="submit">Guardar</button>
    </form>
  </div>
  </div>
</template>

<script>
import router from '@/router';
import axios from 'axios';

export default {
    data() {
        return {
            palabra: '',
            concepto: '',
            referencias: ''
        };
    },
    mounted() {
        if (localStorage.getItem('isLogged') == "false") {
            router.push('/');
        }
    },
    methods: {
        register() {
            axios.post(`${this.$ruta.value}/registerConcept`, {
                name: this.palabra,
                concepto: this.concepto,
                referencia: this.referencias,
            }, {
                headers: {
                    Authorization: `Bearer ${this.$token.value}`
                }
            })
                .then(
                    router.push('/'))
                .catch(error => {
                    console.error(error);
                });
        }
    }
};
</script>

<style>
.registration-container {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100vh; /* Ajusta la altura según tus necesidades */
}

.registration-form {
  max-width: 500px; /* Ajusta el ancho máximo del formulario */
  width: 100%;
  padding: 40px;
  border: 1px solid #ccc;
  border-radius: 12px;
  box-shadow: 0 4px 8px rgba(4, 14, 145, 0.1);
  background-color: #fff;
  text-align: center;
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
</style>