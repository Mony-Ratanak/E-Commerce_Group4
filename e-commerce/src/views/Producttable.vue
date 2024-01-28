<template>
    <div class="flex flex-col p-8 items-center">
      <img class="mb-4 w-fit" @click="nextRoute('/home/welcome')" src="../assets/logo.png">
      <div class="flex w-full justify-end gap-2 text-white">
          <button @click="nextRoute('/addproduct')" class="flex p-2 bg-[#212844] rounded-lg">Create Product</button>
          <button @click="nextRoute('/categorytable')" class="flex p-2 bg-[#212844] rounded-lg">Category Table</button>
      </div>
      <h2 class="text-2xl font-bold">Product Table</h2>
      <table class="table">
        <thead>
          <tr>
            <th style="background-color: #212844; color: white;">ID</th>
            <th style="background-color: #212844; color: white;">Name</th>
            <th style="background-color: #212844; color: white;">Category_id</th>
            <th style="background-color: #212844; color: white;">brand_id</th>
            <th style="background-color: #212844; color: white;">Description</th>
            <th style="background-color: #212844; color: white;">Pricing</th>
            <th style="background-color: #212844; color: white;">Discount_percent</th>
            <th style="background-color: #212844; color: white;">Discounted_price</th>
            <th style="background-color: #212844; color: white;">UPDATE_OPTIONS</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="product in products" :key="product.id">
            <td>{{ product.id }}</td>
            <td>{{ product.name }}</td>
            <td>{{ product.category_id }}</td>
            <td>{{ product.brand_id }}</td>
            <td>{{ product.description }}</td>
            <td>${{ product.pricing }}</td>
            <td>{{ product.discount_percent }}%</td>
            <td>${{ product.discounted_price }}</td>
            <td class="flex justify-between">
              <button @click="editProduct(product.id)" class="text-blue-700 underline">Edit</button>
              <fa :icon="['fas', 'trash']" style="color: rgb(255, 92, 92);" @click="deleteProduct(product.id)"></fa>
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
        products: [],
      };
    },
    mounted() {
      this.fetchProducts();
    },
    methods: {
      async fetchProducts() {
        try {
          axios.defaults.headers.common["Authorization"] = "Bearer " + localStorage.getItem("token");
          const response = await axios.get('http://localhost/api/getallproducts');
          this.products = response.data;
        } catch (error) {
          console.error('Error fetching products:', error);
        }
      },
      async deleteProduct(productId) {
        try {
          await axios.delete(`http://localhost/api/products/${productId}`);
          this.fetchProducts();
        } catch (error) {
          console.error('Error deleting product:', error);
        }
      },
      editProduct(productId) {
        this.$router.push({ path: `/productedit/${productId}` });
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
  