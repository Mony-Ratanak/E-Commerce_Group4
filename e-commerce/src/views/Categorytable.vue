<template>
    <div class="flex flex-col p-8 items-center">
      <img class="mb-4 w-fit" @click="nextRoute('/home/welcome')" src="../assets/logo.png">
      <div class="flex w-full justify-end gap-2 text-white">
          <button @click="nextRoute('/addcategory')" class="flex p-2 bg-[#212844] rounded-lg">Create Category</button>
          <button @click="nextRoute('/producttable')" class="flex p-2 bg-[#212844] rounded-lg">Product Table</button>
      </div>
      <h2 class="text-2xl font-bold">category Table</h2>
      <table class="table">
        <thead>
          <tr>
            <th style="background-color: #212844; color: white;">ID</th>
            <th style="background-color: #212844; color: white;">Name</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="category in categories" :key="category.id">
            <td>{{ category.id }}</td>
            <td>{{ category.name }}</td>
            <td class="flex justify-between">
              <button @click="editCategory(category.id)" class="text-blue-700 underline">Edit</button>
              <fa :icon="['fas', 'trash']" style="color: rgb(255, 92, 92);" @click="deleteCategory(category.id)"></fa>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        categories: [],
      };
    },
    mounted() {
      this.fetchCategories();
    },
    methods: {
      async fetchCategories() {
        try {
          axios.defaults.headers.common["Authorization"] = "Bearer " + localStorage.getItem("token");
          const response = await axios.get('http://localhost/api/categories');
          this.categories = response.data.categories;
        } catch (error) {
          console.error('Error fetching categories:', error);
        }
      },
      async deleteCategory(categoryId) {
        try {
          await axios.delete(`http://localhost/api/category/${categoryId}`);
          await this.fetchCategories();
        } catch (error) {
          console.error('Error deleting category:', error);
        }
      },
      editCategory(categoryId) {
        this.$router.push({ path: `/categoryedit/${categoryId}` });
      },
      nextRoute(route) {
        this.$router.push(route)
      },
    },
  };
  </script>
  
  <style scoped>
  /* Add your component-specific styles here */
  .table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
  }
  
  .table th, .table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
  }
  
  .table th {
    background-color: #f2f2f2;
  }
  </style>
  