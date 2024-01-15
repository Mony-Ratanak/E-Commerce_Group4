<template>
  <div class="flex gap-4">
    <div v-for="product in products" :key="product.id" class="flex flex-col w-[220px] bg-white border-[2px] border-blue-300 rounded-lg my-2 items-center">
      <div class="flex justify-end w-[220px]">
        <div class="flex w-[60px] h-fit text-white justify-center items-center rounded-tr-lg rounded-bl-lg text-center" :class="color">{{ tag }}</div>
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
</template>

<script>
import axios from 'axios';

export default {
  name: "Product",
  props: {
  },
  data() {
    return {
      products: [],
    };
  },
  created() {
    this.fetchProducts();
  },
  methods: {
    async fetchProducts() {
      try {
        const response = await axios.get('http://localhost/api/getproductbycategory', {
          params: {
            category_id: 2,
          },
        });
        this.products = response.data;
      } catch (error) {
        console.error('Error fetching products:', error);
      }
    },
  },
};
</script>

<style scoped>
/* Add your component-specific styles here */
</style>
