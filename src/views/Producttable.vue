<template>
    <div class="flex flex-col p-4">
      <h2>Product Table</h2>
      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Category_id</th>
            <th>brand_id</th>
            <th>Description</th>
            <th>Pricing</th>
            <th>Discount_percent</th>
            <th>Discounted_price</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="product in products" :key="product.id">
            <td>{{ product.id }}</td>
            <td>{{ product.name }}</td>
            <td>{{ product.category_id }}</td>
            <td>{{ product.brand_id }}</td>
            <td>{{ product.description }}</td>
            <td>{{ product.pricing }}</td>
            <td>{{ product.discount_percent }}</td>
            <td>{{ product.discounted_price }}</td>
            <td>
              <button @click="editProduct(product.id)">Edit</button>
              <button @click="deleteProduct(product.id)">Delete</button>
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
  