<template>
  <div class="card">
    <div class="card-body">
      <div class="mb-3">
        <a href="/" class="btn btn-secondary btn-sm">Back to products list</a>
      </div>
      <form @submit.prevent="addProduct">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" id="name" v-model="name">
          <div class="pt-1 text-danger" v-if="v$.name.$error">Field name is required</div>
        </div>
        <div class="form-group">
          <label for="price">Price</label>
          <input type="number" class="form-control" id="price" v-model="price">
          <div class="pt-1 text-danger" v-if="v$.price.$error">Field price is required</div>
        </div>
        <div class="form-group">
          <label for="image">Image (only relative link)</label>
          <input type="text" class="form-control" id="image" v-model="image" placeholder="/public/images/products/example.png">
          <div class="pt-1 text-danger" v-if="v$.price.$error">Field price is required</div>
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <textarea name="description" class="form-control" id="description" cols="30" rows="10" v-model="description"></textarea>
          <div class="pt-1 text-danger" v-if="v$.description.$error.required">Field description is required</div>
        </div>
        <div class="pt-3">
          <button type="submit" class="btn btn-success">Save</button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import useVuelidate from '@vuelidate/core'
import { required, numeric } from "@vuelidate/validators";
import axios from "axios";

export default {
  name: "addProduct",
  setup () {
    return {
      v$: useVuelidate()
    }
  },
  data() {
    return {
      name: null,
      price: null,
      image: null,
      description: null,
    }
  },
  methods: {
    addProduct() {
      const isValid = this.v$.$validate();

      if(isValid) {
        axios.post('/api/product/add', this.$data, {headers: {'Content-Type': 'multipart/form-data'}}
        ).then(response => {
          this.$toast.success(response.data.message, {position: 'top-right'})
          setTimeout(() => {location.href = '/product/' + response.data.productId}, 3000)
        })
      }
    }
  },
  validations() {
    return {
      name: { required },
      price: { required, numeric },
      description: { required }
    }
  }
}
</script>

<style scoped>

</style>