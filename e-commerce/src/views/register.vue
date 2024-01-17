<template>
  <div class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="max-w-md w-full p-6 bg-white rounded-md shadow-md">
      <div class="text-2xl font-semibold mb-4">Register Form</div>
      
      <form @submit.prevent="handleRegister">
        <div class="mb-4">
          <label for="name" class="block text-gray-700">First Name</label>
          <input type="text" v-model="form.name" name="name" id="name" class="form-input mt-1 block w-full" />
        </div>
        
        <div class="mb-4">
          <label for="email" class="block text-gray-700">Email</label>
          <input type="email" v-model="form.email" name="email" id="email" class="form-input mt-1 block w-full" />
        </div>
        
        <div class="mb-4">
          <label for="password" class="block text-gray-700">Password</label>
          <input type="password" v-model="form.password" name="password" id="password" class="form-input mt-1 block w-full" />
        </div>

        <div class="mb-4">
          <label for="password_confirmation" class="block text-gray-700">Confirm Password</label>
          <input type="password" v-model="form.password_confirmation" name="password_confirmation" id="password_confirmation" class="form-input mt-1 block w-full" />
        </div>

        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Save</button>
      </form>
    </div>
  </div>
</template>

<script setup>
import { ref } from "vue";
import axios from "axios";
import { useRouter } from "vue-router";

const router = useRouter();

const form = ref({
  name: "",
  password: "",
  email: "",
  password_confirmation: "",
});

const handleRegister = async () => {
  const formData = new FormData();
  formData.append("name", form.value.name);
  formData.append("email", form.value.email);
  formData.append("password", form.value.password);
  formData.append("password_confirmation", form.value.password_confirmation);

  await axios.post("http://localhost/register", formData);
  router.push("/");
};
</script>
