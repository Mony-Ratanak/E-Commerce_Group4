<template>
    <div class="flex gap-4 flex-col">
      <div v-for="brandId in brandIds" :key="brandId" class="flex gap-4">
        <div  v-for="product in getProductsByBrand(brandId)" :key="product.id" class="flex flex-col w-[220px] bg-white border-[2px] border-blue-300 rounded-lg my-2 items-center">
          <div class="flex items-center justify-between w-[220px] pl-4">
            <div class="font-bold text-xl">{{ product.brand_name }}</div>
            <div class="flex w-[60px] h-[60px] text-white justify-center items-center rounded-tr-lg rounded-bl-lg text-center" :class="color">{{ tag }}</div>
          </div>
          <div class="flex justify-center w-[215px]">
            <img :src="'http://localhost/storage/' + product.images" alt="Product Image">
          </div>
          <div class="flex flex-col bg-white justify-between w-full px-4 h-full">
            <div class="mt-4 bg-white">
              <p class="font font-bold text-[18px]">{{ product.name }}</p>
              <p class="mt-2 text-gray-600 font-semibold">{{ product.description }}</p>
            </div>
            <div class="flex w-full flex-col gap-4 pb-2">
              <div class="border-b-2 border-gray-300 w-full"></div>
              <div class="flex w-full justify-between">
                <p class="text-black">${{ product.pricing }}</p>
                <p class="text-green-500">{{ product.buy }}</p>
              </div>
            </div>
          </div>
        </div>
      </div> 
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    name: "Product",
    props: {
      tag: String,
      color: String,
    },
    data() {
      return {
        products: [],
        brandIds: [], // Add brandIds array
      };
    },
    mounted() {
      this.fetchBrandIds(); // Fetch brand IDs
      this.fetchData(); // Use mounted instead of created
    },
    methods: {
      async fetchBrandIds() {
        try {
          const response = await axios.get('http://localhost/api/getbrandid');
          this.brandIds = response.data;
        } catch (error) {
          console.error('Error fetching brand IDs:', error);
        }
      },
      async fetchProducts(categoryId) {
        const numericcategoryId = +categoryId;
        try {
          this.products = [];
          for (let brandId of this.brandIds) {
            console.log('Fetching products for categoryId:', categoryId);
            const response = await axios.get('http://localhost/api/getproductbycategoryandbrand', {
              params: {
                category_id: numericcategoryId,
                brand_id: brandId,
              },
            });
            this.products = this.products.concat(response.data);
          }
        } catch (error) {
          console.error('Error fetching products:', error);
        }
      },
        getCategoryIdFromUrl() {
            const pathArray = window.location.pathname.split('/');
            const categoryId = pathArray[pathArray.length - 1];
            return categoryId || null;
        },
        async fetchData() {
          await this.fetchBrandIds(); // Wait for brand IDs to be fetched
          const categoryId = this.getCategoryIdFromUrl();
          console.log("categoryId:", categoryId);
          await this.fetchProducts(categoryId);
        },
        getProductsByBrand(brandId) {
          // Filter products based on the current brand_id
          return this.products.filter(product => product.brand_id === brandId);
        },
    },
    watch: {
            $route(to, from) {
            this.fetchData();
            },
        },
  };
  </script>
  
  <style scoped>
  /* Add your component-specific styles here */
  </style>
  