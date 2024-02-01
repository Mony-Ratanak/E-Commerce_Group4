<template>
    <div class="flex justify-center items-center h-screen bg-white">
      <form class="flex flex-col border-4 border-[#212844] p-4">
        <h2 class="mb-4 text-center text-bold text-2xl">Create Category</h2>
        <label for="categoryName">Name:</label>
        <input class="border-[1px] border-[#212844] h-10 rounded-lg" v-model="category.name" id="categoryName" />
  
        <button class="bg-[#212844] text-white p-2 mt-4" @click.prevent="saveCategory" type="submit">Create Category</button>
      </form>
    </div>
  </template>
  
  <script>
  import { ref } from 'vue';
  import { useRouter } from 'vue-router';
  import axios from 'axios';
  
  export default {
    setup() {
      const router = useRouter();
  
      const category = ref({
        name: '',
      });
  
      const saveCategory = async () => {
        try {
          await createCategoryOnServer(category.value);
  
          console.log('Category created successfully!');
          nextRoute("/categorytable");
        } catch (error) {
          console.error('Error creating category:', error);
        }
      };
  
      const createCategoryOnServer = async (category) => {
        // Set up your authorization headers if needed
        // axios.defaults.headers.common["Authorization"] = "Bearer " + localStorage.getItem("token");
  
        const apiUrl = 'http://127.0.0.1:8000/api/createcategory';
        await axios.post(apiUrl, category);
      };
  
      const nextRoute = (route) => {
        // Use router.push instead of this.$router.push
        router.push(route);
      };
  
      return {
        category,
        saveCategory,
      };
    },
  };
  </script>
  