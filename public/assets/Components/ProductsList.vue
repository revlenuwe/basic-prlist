<template>
    <div class="col-lg-4 col-12 col-md-12 col-sm-12">
      <input type="text" v-model="searchText" class="form-control mb-4" placeholder="Search...">
    </div>
    <div class="row">
      <div v-for="product in products" class="col-lg-3 pb-2">
        <div class="card">
          <img v-if="product.image" :src="product.image" class="card-img-top" alt="4ws">
          <img v-else src="/public/images/placeholder.png" class="card-img-top" alt="placeholder">
          <div class="card-body">
            <h5 class="card-title">{{ product.name }}</h5>
            <a :href="'/product/' + product.id" class="btn btn-success mt-2 w-100">Go to</a>
          </div>
        </div>
      </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
  name: "ProductsList",
  data() {
    return {
      products: null,
      searchText: null
    }
  },
  created() {
    this.getProducts()
  },
  methods: {
    getProducts() {
      axios.get('/api/products', {params: {name: this.searchText}}).then(response => {
          this.products = response.data
      })
    },
    //without lodash
    debounceSearch() {
      clearTimeout(this.debounce)
      this.debounce = setTimeout(() => {
        this.getProducts()
      }, 300)
    }
  },
  watch: {
    searchText() {
      this.debounceSearch()
    }
  }
}
</script>

<style scoped>

</style>