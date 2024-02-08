<template>
    <div>
        <h2>¡Añade tu Palabra!</h2>
        <form @submit.prevent="palabras">
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
</script>

<style></style>