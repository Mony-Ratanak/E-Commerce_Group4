<template>
  <div class="flex justify-center items-center h-screen w-screen">
    <div class="flex flex-col border-2 border-black px-4 w-fit h-[600px] justify-between">
        <form @submit.prevent="login" class="flex flex-col gap-2">
          <h2 class="text-xl font-bold mb-4">Sign in</h2>
          <label for="email">Email or phone number</label>
          <input class="w-[400px] h-[50px] border-2 border-[#0099FF] p-4" type="email" placeholder="Enter email or phone number" v-model="email">

          <label for="password">Password</label>
          <input class="w-[400px] h-[50px] border-2 border-[#0099FF] p-4" type="password" placeholder="Enter password" v-model="password">

          <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
              <input id="remember_me" type="checkbox" v-model="rememberMe" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
              <span class="ms-2 text-sm text-gray-600">Remember Me</span>
            </label>
          </div>
          <div class="flex">
              <p>By signing in, you agree to our</p>
              <p class="text-[#1D41CF] ml-1 underline">Terms of Service</p>
          </div>
          <button class="bg-[#212844] my-2 text-white p-4" type="submit">Sign in</button>
          <p class="text-[#1D41CF] mt-2">Forgot password?</p>
        </form>
        <div class="flex flex-col">
              <div class="flex mb-2">
                <div class="border-t border-black my-4 w-1/4"></div>
                <p class="flex w-1/2 text-center justify-center">Need a new account?</p>
                <div class="border-t border-black my-4 w-1/4"></div>
              </div>
              <div class="flex w-full px-10 justify-center mb-8">
                  <button @click="nextRoute()" class="flex justify-center items-center border-2 border-gray-300 text-black p-2 px-20 w-fit shadow-inner shadow-md" type="submit">Create new account</button>
              </div>
        </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      email: "",
      password: "",
      rememberMe: false,
    };
  },
  mounted() {
    // Check for remember_token in the cookie on component mount
    const rememberToken = this.getCookie("remember_token");
    if (rememberToken) {
      this.loginWithRememberToken(rememberToken);
    }
  },
  methods: {
    login() {
      // Standard login logic without immediate check for remember_token
      axios.post("http://localhost/api/login", {
        email: this.email,
        password: this.password,
        remember_me: this.rememberMe,
      })
      .then(response => {
        localStorage.setItem("token", response.data.token);

        // Set a cookie for remember-me functionality if rememberMe is checked
        if (this.rememberMe) {
          document.cookie = `remember_token=${response.data.remember_token}; expires=${new Date(response.data.user.remember_token_expiry)}; path=/`;
        }

        // Set the Authorization header for Axios requests
        axios.defaults.headers.common["Authorization"] = "Bearer " + localStorage.getItem("token");

        this.$router.push("/home/welcome");
      })
      .catch(error => {
        console.error(error);
      });
    },
    loginWithRememberToken(rememberToken) {
      // API call to login using remember_token
      axios.post("http://localhost/api/login", {
        remember_token: rememberToken,
      })
      .then(response => {
        localStorage.setItem("token", response.data.token);

        // Set the Authorization header for Axios requests
        axios.defaults.headers.common["Authorization"] = "Bearer " + localStorage.getItem("token");

        this.$router.push("/home/welcome");
      })
      .catch(error => {
        console.error(error);
      });
    },
    getCookie(name) {
      const value = `; ${document.cookie}`;
      const parts = value.split(`; ${name}=`);
      if (parts.length === 2) return parts.pop().split(";").shift();
    },
    nextRoute() {
      this.$router.push(`/register`);
    },
  },
};
</script>

