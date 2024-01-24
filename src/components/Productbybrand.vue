<template>
    <div class="flex gap-4">
      <div v-for="product in products" :key="product.id" class="flex flex-col w-[220px] bg-white border-[2px] border-blue-300 rounded-lg my-2 items-center justify-between">
        <div class="flex items-center justify-between w-[220px] pl-4">
            <div class="font-bold text-xl">{{ product.brand_name }}</div>
            <div v-if="product.discount_percent !== 0" class="flex w-[60px] h-[60px] text-white justify-center items-center rounded-tr-lg rounded-bl-lg text-center" :class="color">{{ product.discount_percent }}% OFF</div>
            <div v-else class="flex w-[60px] h-[60px]"></div>
          </div>
          <div class="flex justify-center w-[200px]">
            <img :src="'http://localhost/storage/' + product.images" alt="Product Image">
          </div>
          <div class="flex flex-col bg-white justify-between w-full px-4 h-fit">
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
      };
    },
    created() {
      const brandId = this.getBrandIdFromUrl();
      console.log("brandId:", brandId);
      this.fetchProducts(brandId);
    },
    methods: {
      async fetchProducts(brandId) {
        const numericBrandId = +brandId;
        try {
          console.log('Fetching products for brandId:', brandId);
          const response = await axios.get('http://localhost/api/getallproductsbybrand', {
            params: {
              brand_id: numericBrandId,
            },
          });
          this.products = response.data;
        } catch (error) {
          console.error('Error fetching products:', error);
        }
      },
      getBrandIdFromUrl() {
        const pathArray = window.location.pathname.split('/');
        const brandId = pathArray[pathArray.length - 1];
        return brandId || null;
      },
    },
    
  };
  </script>
  
  <style scoped>
  /* Add your component-specific styles here */
  </style>
  