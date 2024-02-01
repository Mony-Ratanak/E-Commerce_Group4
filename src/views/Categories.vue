<style scoped>
.category{
  height:72vh;
}
</style>

<template>
  <topbar></topbar>
  <div class="category flex">
    <div class="flex flex-col h-fit p-4">
        <div class="flex p-2 font-bold text-[#212844] border-b-2 border-gray-600">Category</div>
        <div v-for="category in categories" @click="setCurrentCategory(category.id)" :key="category.id" class="flex flex-col p-2 rounded-lg font-bold hover:bg-[#0abab5] hover:text-white">
            <div>{{ category.name }}</div>
        </div>
    </div>
    <div class="flex flex-col overflow-y-auto w-full border-l-gray-400 border-[2px] px-4">
        <div v-for="brandId in brandIds" :key="brandId" class="flex gap-4">
            <div @click="nextproductRoute(product)" v-for="product in getProductsByBrand(brandId)" :key="product.id" class="flex flex-col w-[220px] bg-white border-[2px] border-blue-300 rounded-lg my-2 items-center justify-between hover:bg-[#0abab5] hover:text-white">
                <div class="flex items-center justify-between w-[220px] pl-4">
                    <div class="font-bold text-xl">{{ product.brand_name }}</div>
                    <div v-if="product.discount_percent !== 0" class="flex w-[60px] h-[60px] text-white justify-center items-center rounded-tr-lg rounded-bl-lg text-center" :class="color">{{ product.discount_percent }}% OFF</div>
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
                    <div class="flex w-full flex-col gap-4 pb-2">
                        <div class="border-b-2 border-gray-300 w-full"></div>
                        <div class="flex w-full justify-between">
                            <p class="text-green-500">${{ product.discounted_price }}</p>
                            <div v-if="product.discount_percent !== 0"><p class="text-red-500 line-through">${{ product.pricing }}</p></div>
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
import Topbar from '../components/Topbar.vue';

export default {
  data() {
    return {
      categories: [],
      products: [],
      brandIds: [],
      currentCategoryId: null, // New property to store the current category ID
    };
  },
  mounted() {
    this.fetchCategories();
    this.fetchBrandIds();
    this.fetchData(); // Use mounted instead of created
  },
  components: {
    Topbar,
  },
  methods: {
    async fetchCategories() {
      try {
        const response = await axios.get('http://127.0.0.1:8000/api/categories');
        this.categories = response.data.categories;
      } catch (error) {
        console.error('Error fetching categories:', error);
      }
    },
    async fetchBrandIds() {
      try {
        const response = await axios.get('http://127.0.0.1:8000/api/getbrandid');
        this.brandIds = response.data;
      } catch (error) {
        console.error('Error fetching brand IDs:', error);
      }
    },
    async fetchProducts(categoryId) {
      const numericCategoryId = +categoryId;
      try {
        this.products = [];
        for (let brandId of this.brandIds) {
          const response = await axios.get('http://127.0.0.1:8000/api/getproductbycategoryandbrand', {
            params: {
              category_id: numericCategoryId,
              brand_id: brandId,
            },
          });
          this.products = this.products.concat(response.data);
        }
      } catch (error) {
        console.error('Error fetching products:', error);
      }
    },
    setCurrentCategory(categoryId) {
      this.fetchProducts(categoryId);
    },
    async fetchData() {
      await this.fetchBrandIds();
      // Default currentCategoryId for when the page first loaded
      if (this.categories.length > 0) {
        this.currentCategoryId = this.categories[0].id;
        console.log("currentcategoryid:", this.currentCategoryId);
        await this.fetchProducts(this.currentCategoryId);
      }
    },
    getProductsByBrand(brandId) {
      return this.products.filter(product => product.brand_id === brandId);
    },
    nextRoute(route) {
      this.$router.push(route);
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