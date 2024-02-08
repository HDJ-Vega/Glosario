<template>
    <div>
        <h2>¡Añade tu Palabra!</h2>
        <form @submit.prevent="register">
            <label for="palabra">Palabra clave:</label>
            <input type="palabra" v-model="palabra" required>

            <label for="concepto">Concepto:</label>
            <input type="concepto" v-model="concepto" required>

            <label for="referencias">Referencias:</label>
            <input type="referencias" v-model="referencias" required>

            <button type="submit">Guardar</button>
        </form>
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

<style></style>