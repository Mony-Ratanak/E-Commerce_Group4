<template>
  <div class="flex flex-col w-screen h-screen justify-center items-center">
    <div class="flex flex-col border-2 h-[700px] border-[#5FBFFF] p-4 px-6 justify-between">
      <form class="flex flex-col" @submit.prevent="handleRegister">
        <div class="font-bold text-lg">Create account</div>

        <label>Your name</label>
        <input class="w-[400px] h-[50px] border-2 border-[#0099FF] p-4" type="text" v-model="form.username" username="username" placeholder="Enter your name">

        <label class="mt-4">Email or phone number</label>
        <input class="w-[400px] h-[50px] border-2 border-[#0099FF] p-4" type="email" v-model="form.email" username="email" placeholder="Enter your email or phone number">

        <label class="mt-4">Password</label>
        <input class="w-[400px] h-[50px] border-2 border-[#0099FF] p-4" type="password" v-model="form.password" username="password" placeholder="Enter password">

        <label class="mt-4">Re-enter Password</label>
        <input class="w-[400px] h-[50px] border-2 border-[#0099FF] p-4" type="password" v-model="form.confirm_password" username="confirm_password" placeholder="Re-enter your password">

        <div class="flex my-4">
            <p>By creating an account, you agree to our</p>
            <p class="text-[#1D41CF] ml-1 underline">Terms of Service</p>
        </div>

        <input class="bg-[#212844] my-2 text-white p-4" type="submit" value="Sign up">

      </form>
      <div class="flex flex-col">
              <div class="flex mb-2">
                <div class="border-t border-black my-4 w-1/4"></div>
                <p class="flex w-1/2 text-center justify-center">Already have an account?</p>
                <div class="border-t border-black my-4 w-1/4"></div>
              </div>
              <div class="flex w-full px-10 justify-center mb-8">
                  <button @click="nextRoute()" class="flex justify-center items-center border-2 border-gray-300 text-black p-2 px-20 w-fit shadow-inner" type="submit">Sign in</button>
              </div>
        </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from "vue";
import axios from "axios";
import { useRouter } from "vue-router";

const router = useRouter();

const form = ref({
  username: "",
  password: "",
  email: "",
  confirm_password: "",
});

    const handleRegister = async () => {
      try {
        // Explicitly include confirm_password field in the request payload
        const response = await axios.post("http://localhost/api/register", {
          username: form.value.username,
          password: form.value.password,
          email: form.value.email,
          confirm_password: form.value.confirm_password,
        }, {
          headers: {
            'Content-Type': 'application/json',
          },
        });

        alert("Register successful, go to your email to verify your account");
        // Redirect to a success page or perform other actions
        router.push("/login");
      } catch (error) {
        console.error("Registration error:", error);
        console.dir(error.response); // Log the detailed response

        // Handle error (e.g., display an error message to the user)
        // For example, you can check for specific validation errors
        if (error.response && error.response.data && error.response.data.message) {
          alert(error.response.data.message);
        } else {
          alert("An error occurred during registration.");
        }
      }
    };
    const nextRoute = () => {
      router.push("/login");
    };
</script>
