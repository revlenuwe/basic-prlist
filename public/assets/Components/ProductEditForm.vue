<template>
  <div class="card">
    <div class="card-body">
      <form @submit.prevent="editProduct">
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
          <label for="description">Description</label>
          <textarea name="description" class="form-control" id="description" cols="30" rows="10" v-model="description"></textarea>
          <div class="pt-1 text-danger" v-if="v$.description.$error.required">Field description is required</div>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
      </form>
    </div>
  </div>
</template>

<script>
import useVuelidate from '@vuelidate/core'
import { required, numeric } from "@vuelidate/validators";
import axios from "axios";

export default {
  name: "ProductEditForm",
  setup () {
    return {
      v$: useVuelidate()
    }
  },
  props: {
    id: {
      type: String,
      required: true
    },
    name: {
      type: String,
      required: true
    },
    price: {
      type: String,
      required: true
    },
    description: {
      type: String,
      required: true
    },
  },
  data() {
    return {
      //
    }
  },
  methods: {
    editProduct() {
      const isValid = this.v$.$validate();

      if(isValid) {

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