<template>
    <div>
        <h2>Iniciar Sesión</h2>
        <form @submit.prevent="login">
            <label for="email">Correo electrónico:</label>
            <input type="email" v-model="email" required>

            <label for="password">Contraseña:</label>
            <input type="password" v-model="password" required>

            <button type="submit">Iniciar Sesión</button>
        </form>
    </div>
</template>

<script>
import router from '@/router';
import axios from 'axios';
export default {
    data() {
        return {
            email: '',
            password: ''
        };
    },
    mounted() {
        if (!localStorage.getItem('isLogged')) {
            router.push('/')
        }
    }
    , methods: {
        login() {
            axios.post(`${this.$ruta.value}/login`, {
                email: this.email,
                password: this.password,

            })
                .then(response => {
                    console.log(response.data);
                    this.$token.value = response.data.accessToken;
                    localStorage.setItem('Token', response.data.accessToken);
                    localStorage.setItem('isLogged', "true");
                    router.push('/');
                })
                .catch(error => {
                    console.error(error);
                });
        }
    }
};
</script>

<style></style>