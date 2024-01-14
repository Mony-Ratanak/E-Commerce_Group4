<template>
    <div class="flex flex-col">
      <div v-for="brandId in [1, 2, 3, 4]" :key="brandId" class="flex gap-4">
      <!-- Inner loop for products with the current brand_id -->
        <div v-for="product in getProductsByBrand(brandId)" :key="product.id" class="flex gap-4 flex-col">
            <div class="flex flex-col w-[220px] bg-white border-[2px] border-blue-300 rounded-lg my-2 items-center">
                <div class="flex justify-between w-[220px]">
                    <div class="m-4 font-bold">{{ product.brand_name }}</div>
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
        laptops: [],
      };
    },
    created() {
      this.fetchProducts();
    },
    methods: {
      async fetchProducts() {
        try {
          for (let brandId of [1, 2, 3, 4]) {
            const response1 = await axios.get('http://localhost/api/products1', {
              params: {
                category_id: 1,
                brand_id: brandId,
              },
            });
            this.laptops = this.laptops.concat(response1.data);
          }
        } catch (error) {
          console.error('Error fetching products:', error);
        }
      },
      getProductsByBrand(brandId) {
        // Filter products based on the current brand_id
        return this.laptops.filter(product => product.brand_id === brandId);
      },
    },
  };
  </script>
  
  
  
  <style scoped>
  /* Add your component-specific styles here */
  </style>
  