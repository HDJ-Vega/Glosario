<template>
    <button @click="logout">Cerrar Sesión</button>
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

<style></style>