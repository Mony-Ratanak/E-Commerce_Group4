<template>
  <div class="w-100 h-fit border-2 rounded-lg items-center flex bg-white" style="border-color: #0099FF;">
    <div @click="toggleDropdown" style="background-color: #212844;" class="flex h-full items-center p-4 gap-2 rounded-l-md cursor-pointer">
      <div class="text-center font-medium text-lg w-10 text-white">Filter</div>
      <img src="../assets/dropdown.png" class="h-[7px] w-[12px] translate-y-[2px]" alt="">
    </div>

    <!-- Dropdown menu -->
    <div v-if="showDropdown" class="flex flex-col absolute bg-white border-2 rounded-lg mt-40">
      <div @click="selectOption('1')" class="px-4 py-2 hover:bg-[#0abab5]">All</div>
      <div @click="selectOption('2')" class="px-4 py-2 hover:bg-[#0abab5]">Trending</div>
      <div @click="nextRoute('/allpromotions')" class="px-4 py-2 hover:bg-[#0abab5]">Discount</div>
    </div>

    <div>
      <input v-model="searchTerm" @input="searchProducts" type="text" placeholder="Search for items" class="relative w-[400px] h-[60px] outline-none border-l max-h-full pl-2">
      <div v-if="products.length > 0 && searchTerm !== ''" class="flex justify-center items-center absolute top-[60px] left-1 w-[515px]">
        <div class="flex bg-white w-full justify-between border-2 border-[#0099FF]">
          <div class="flex flex-col gap-2 w-full pr-2">
            <div @click="nextproductRoute(product)" v-for="product in products" :key="product.id" class="flex justify-between items-center w-full">
              <img :src="'http://localhost/storage/' + product.images" alt="Product Image" class="w-14 h-14">
              <div>{{ product.name }}</div>
              <div>${{ product.pricing }}</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <fa icon="search" class="text-lg bg-white pr-3" style="color: black;"></fa>
  </div>
      <!-- Display search results -->
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      showDropdown: false,
      searchTerm: '',
      products: [],
    };
  },
  methods: {
    toggleDropdown() {
      this.showDropdown = !this.showDropdown;
    },
    selectOption(option) {
      this.showDropdown = false;
      // Handle the selected option
    },
    searchProducts() {
      // Replace the URL with your actual backend API endpoint
      axios.get(`http://localhost/api/getproductbyname/${this.searchTerm}`)
        .then(response => {
          this.products = response.data;
        })
        .catch(error => {
          console.error('Error fetching products:', error);
        });
    },
    nextproductRoute(product) {
          this.$router.push({ path: `/productdetail/${product.id}` });
    },
    nextRoute(route) {
          this.$router.push(route)
    },
  },
};
</script>
