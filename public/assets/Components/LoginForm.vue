<template>
  <div class="card">
    <div class="card-body">
      <h4>Login</h4>
      <form @submit.prevent="login">
        <div class="alert alert-danger" role="alert" v-if="errors">
          <ul class="m-0">
            <li v-for="error of errors">{{ error }}</li>
          </ul>
        </div>
        <div class="form-group">
          <label for="name">Username</label>
          <input type="text" class="form-control" id="name" v-model="username">
          <p class="text-danger" v-for="error of v$.username.$errors">{{ error.$message }}</p>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" v-model="password">
          <p class="text-danger" v-for="error of v$.password.$errors">{{ error.$message }}</p>
        </div>
        <div class="pt-3">
          <button type="submit" class="btn btn-primary w-100">Login</button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import useVuelidate from '@vuelidate/core'
import { required, minLength, helpers } from "@vuelidate/validators";
import axios from "axios";

export default {
  name: "Login",
  setup() {
    return {
      v$: useVuelidate()
    }
  },
  data() {
    return {
      username: null,
      password: null,
      errors: null
    }
  },
  methods: {
    login() {
      const isValid = this.v$.$validate();

      if(isValid) {
        axios.post('/api/auth/login', this.$data, {headers: {'Content-Type': 'multipart/form-data'}}).then(response => {

          if(response.data.authenticated) {
            this.$toast.success('Login succeeded.Redirecting...', {position: 'top-right'})
            setTimeout(() => {location.href = '/'}, 3000)
          }
        }).catch(errors => {
          this.errors = errors.response.data
        })
      }
    }
  },
  validations() {
    return {
      username: {
        required: helpers.withMessage('Field username is required', required),
        minLength: helpers.withMessage('Username must be at least 5 characters', minLength(5))
      },
      password: {
        required: helpers.withMessage('Field password is required', required),
        minLength: helpers.withMessage('Password must be at least 8 characters', minLength(8))
      }
    }
  }
}
</script>

<style scoped>

</style>