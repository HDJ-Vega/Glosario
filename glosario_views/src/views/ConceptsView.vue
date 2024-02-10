<template>
  <div class="search-container">
    <input
      class="search-input"
      v-model="searchText"
      @input="filterConcepts"
      placeholder="Buscar conceptos..."
    />

    <div class="alphabet-buttons">
      <button
        class="alphabet-button"
        v-for="range in alphabetRanges"
        :key="range"
        @click="filterByAlphabet(range)"
        :class="{ 'button-selected': selectedButton === range }"
      >
        {{ range }}
      </button>
    </div>

    <div v-if="!hasResults && searchText" class="no-results">
      No hay ningún concepto
    </div>
    
  </div>

  <div class="card-container">
    <div class="card" v-for="concepto in filteredConcepts" :key="concepto.id">
      <h2 class="card-title font"> <b>{{ concepto.name }}</b></h2>
      <p class="card-content font-concepto">{{ concepto.concepto }}</p>
      <p class="card-reference font-referencia"><b>Referencia: </b> <i>{{ concepto.referencia }}</i></p>
    </div>
  </div>
</template>

<style>
@import url("https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap");

.font {
  font-family: "Outfit", sans-serif;
  font-optical-sizing: auto;
  font-size: 20px;
  font-weight: 500;
  font-style: normal;
  color: blue;
}

.font-concepto {
  font-family: "Outfit", sans-serif;
  font-optical-sizing: auto;
  font-size: 15px;
  font-weight: 500;
  font-style: normal;
}

.font-referencia {
  font-family: "Outfit", sans-serif;
  font-optical-sizing: auto;
  font-size: 15px;
  font-weight: 500;
  font-style: normal;
}

/* Estilos del buscador */
.search-container {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 20px;
  margin-bottom: 10px;
}

.search-input {
  padding: 10px;
  font-size: 16px;
  width: 50%;
  border-radius: 5px;
  border: 1px solid #ccc;
}

.search-input:focus {
  outline: none;
  box-shadow: 0 0 5px rgba(81, 203, 238, 1);
}

.alphabet-buttons {
  display: flex;
  gap: 10px;
}

.alphabet-button {
  padding: 10px;
  font-size: 16px;
  border-radius: 5px;
  border: 1px solid #ccc;
  background-color: #f8f9fa;
  cursor: pointer;
}

.alphabet-button:hover {
  background-color: #e2e6ea;
}

.alphabet-button:active {
  background-color: #ced4da;
}

/* Estilos de las cartas */
.card-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: flex-start;
  gap: 15px;
  padding-left: 20px;
}

.card {
  flex: 0 0 calc(33.3333% - 20px);
  border: 1px solid #ccc;
  box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.2);
  margin-bottom: 20px;
  padding: 20px;
  box-sizing: border-box;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.card-title {
  margin-bottom: 10px;
}

.card-content {
  flex-grow: 1;
}

.card-reference {
  margin-top: 10px;
}

.no-results {
  text-align: center;
  margin-top: 20px;
}

.button-selected {
  background-color: #ced4da;
}

@media (max-width: 768px) {
  .card {
    flex: 0 0 100%;
  }
}
</style>

<script>
import axios from "axios";
export default {
  data() {
    return {
      concepts: [],
      filteredConcepts: [],
      searchText: "",
      alphabetRanges: ["A-F", "G-M", "N-S", "T-Z,Ñ"],
      hasResults: true,
      selectedButton: null,
    };
  },
  methods: {
    filterConcepts() {
      if (this.searchText === "") {
        this.filteredConcepts = [...new Set(this.concepts)];
      } else {
        this.filteredConcepts = [
          ...new Set(
            this.concepts.filter(
              (concepto) =>
                concepto.name
                  .toLowerCase()
                  .includes(this.searchText.toLowerCase()) ||
                concepto.referencia
                  .toLowerCase()
                  .includes(this.searchText.toLowerCase())
            )
          ),
        ];
      }
      this.hasResults = false;
      this.selectedButton = null;
    },
    filterByAlphabet(range) {
      const [start, end] = range.split("-");
      this.filteredConcepts = [
        ...new Set(
          this.concepts.filter((concepto) => {
            const firstLetter = concepto.name[0].toUpperCase();
            return firstLetter >= start && firstLetter <= end;
          })
        ),
      ];
      this.hasResults = false;
      this.selectedButton = range;

    },
  },
  mounted() {
    axios
      .get(`${this.$ruta.value}/index`)
      .then((response) => {
        this.concepts = response.data.conceptos;
        this.filteredConcepts = [...new Set(this.concepts)];
      })
      .catch((error) => {
        console.error(error);
      });
  },
};
</script>
