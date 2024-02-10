<template>
    <div class="button-container">
    <img src="https://us.123rf.com/450wm/f1digitals/f1digitals1901/f1digitals190100116/115135822-ilustraci%C3%B3n-de-dibujos-animados-vector-de-p%C3%A1jaro-lindo-diciendo-adi%C3%B3s-aislado-sobre-fondo-blanco.jpg" alt="" srcset="">
      <button @click="logout" class="logout-button font-text">Cerrar Sesión</button>
    </div>
  </template>

<script>
import router from '@/router';
import axios from 'axios';

export default {
    mounted() {
        if (localStorage.getItem('isLogged') == "false") {
            router.push('/');
        }
    }
    , methods: {
        logout() {
            axios.get(`${this.$ruta.value}/logout`, {
                headers: {
                    Authorization: `Bearer ${this.$token.value}`
                }
            }).then(
                this.$token.value = 'null',
                localStorage.setItem('Token', 'null'),
                localStorage.setItem('isLogged', "false"),
                router.push('/')
            ).catch(error => {
                console.error(error);
            });
        }
    }
};
</script>

<style scoped>
.font-text {
  font-family: "Outfit", sans-serif;
  font-optical-sizing: auto;
  font-size: 15px;
  font-weight: 500;
  font-style: normal;
}

.button-container {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  height: 70vh;
}

.logout-button {
  display: block;
  padding: 10px;
  background-color: #e81a1a;
  color: #fff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  transition: background-color 0.3s;
}

.logout-button:hover {
  background-color: #a20c0c;
}
</style>