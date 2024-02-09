<template>
  <h1>Conceptos</h1>

  <input v-model="searchText" @input="filterConcepts" placeholder="Buscar conceptos...">

  <button v-for="range in alphabetRanges" :key="range" @click="filterByAlphabet(range)">
    {{ range }}
  </button>

  <li v-for="concepto in filteredConcepts" :key="concepto.id">
    {{ concepto.name }}
  </li>
</template>

<script>
import axios from 'axios';
export default {
  data() {
    return {
      concepts: [],
      filteredConcepts: [],
      searchText: '',
      alphabetRanges: ['A-F', 'G-M', 'N-S', 'T-Z,Ñ'],
    };
  },
  methods: {
    filterConcepts() {
      if (this.searchText === '') {
        this.filteredConcepts = [...new Set(this.concepts)];
      } else {
        this.filteredConcepts = [...new Set(this.concepts.filter(concepto =>
          concepto.name.toLowerCase().includes(this.searchText.toLowerCase()) ||
          concepto.referencia.toLowerCase().includes(this.searchText.toLowerCase())
        ))];
      }
    },
    filterByAlphabet(range) {
      const [start, end] = range.split('-');
      this.filteredConcepts = [...new Set(this.concepts.filter(concepto => {
        const firstLetter = concepto.name[0].toUpperCase();
        return firstLetter >= start && firstLetter <= end;
      }))];
    },
  },
  mounted() {
    axios.get(`${this.$ruta.value}/index`)
      .then(response => {
        this.concepts = response.data.conceptos;
        this.filteredConcepts = [...new Set(this.concepts)];
      })
      .catch(error => {
        console.error(error);
      });
  },
};
</script>