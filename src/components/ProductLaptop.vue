<template>
  <div class="flex gap-4">
    <div @click="nextproductRoute(product)" v-for="product in products" :key="product.id" class="flex flex-col w-[220px] bg-white border-[2px] border-blue-300 rounded-lg my-2 items-center justify-between hover:bg-[#0abab5] hover:text-white">
      <div class="flex justify-end w-[220px]">
        <div v-if="product.discount_percent !== 0" class="flex w-[50px] h-[50px] text-white justify-center items-center rounded-tr-lg rounded-bl-lg text-center" :class="color">{{ product.discount_percent }} % OFF</div>
        <div v-else class="flex w-[60px] h-[60px]"></div>
      </div>
      <div class="flex justify-center w-[200px]">
        <img :src="'http://127.0.0.1:8000/storage/' + product.images" alt="Product Image">
      </div>
      <div class="flex flex-col justify-between w-full px-4 h-fit">
        <div class="mt-4">
          <p class="font font-bold text-[18px]">{{ product.name }}</p>
          <p class="mt-2 text-gray-600 font-semibold">{{ truncateDescription(product.description) }}</p>
        </div>
        <div class="flex w-full flex-col gap-4 pb-2 ">
          <div class="border-b-2 border-gray-300 w-full"></div>
          <div class="flex w-full justify-between">
            <p class="text-green-500">${{ product.discounted_price }}</p>
            <div v-if="product.discount_percent !== 0"><p class="text-red-500 line-through">${{ product.pricing }}</p></div>
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
    color: String,
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
        const response = await axios.get('http://127.0.0.1:8000/api/getproductbycategory', {
          params: {
            category_id: 1,
          },
        });
        this.products = response.data;
      } catch (error) {
        console.error('Error fetching products:', error);
      }
    },
    nextproductRoute(product) {
          this.$router.push({ path: `/productdetail/${product.id}` });
    },
    truncateDescription(description) {
      const maxLength = 60;
      if (description.length > maxLength) {
        return description.substring(0, maxLength) + '...';
      } else {
        return description;
      }
    },
  },
};
</script>

<style scoped>
/* Add your component-specific styles here */
</style>
