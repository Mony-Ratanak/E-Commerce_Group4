<template>
  <div>
    <h2>Login</h2>
    <form @submit.prevent="login">
      <label for="email">Email:</label>
      <input type="email" v-model="email" required>

      <label for="password">Password:</label>
      <input type="password" v-model="password" required>

      <button type="submit">Login</button>
      <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
              <input id="remember_me" type="checkbox" v-model="rememberMe" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
              <span class="ms-2 text-sm text-gray-600">Remember Me</span>
          </label>
        </div>
    </form>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      email: '',
      password: '',
      rememberMe: false,
    };
  },
  methods: {
  login() {
    axios.post("http://localhost/api/login", {
      email: this.email,
      password: this.password,
      remember_me: this.rememberMe,
    })
    .then(response => {
      localStorage.setItem('token', response.data.token);

      if (this.rememberMe) {
        // Set a cookie for remember-me functionality
        document.cookie = `remember_token=${response.data.remember_token}; expires=${new Date(response.data.user.remember_token_expiry)}; path=/`;
      }

      // Set the Authorization header for Axios requests
      axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('token');

      this.$router.push('/home/welcome');
    })
    .catch(error => {
      console.error(error);
    });
  },
},
};
</script>