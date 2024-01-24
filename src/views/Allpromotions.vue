<style>
  .scroll {
    overflow-y: scroll;
    overflow-x: hidden;
    margin: 0;
    height: 75vh;
  }

  .scroll::-webkit-scrollbar {
    width: 4px;
  }

  .scroll::-webkit-scrollbar-thumb {
    background-color: #000000;
    border-radius: 6px;
  }

  .scroll::-webkit-scrollbar-track {
    background-color: #f1f1f1;
  }
  .horizontalscroll {
    overflow-y: hidden;
    overflow-x: scroll;
    margin: 0;
  }

  .horizontalscroll::-webkit-scrollbar {
    height: 6px;
  }

  .horizontalscroll::-webkit-scrollbar-thumb {
    background-color: #000000;
    border-radius: 6px;
  }

  .horizontalscroll::-webkit-scrollbar-track {
    background-color: white;
  }
  body{
    overflow: hidden;
  }
</style>


<template>
    <topbar></topbar>
    <div class="flex gap-4 scroll flex-col">
        <div class="flex p-4 gap-4">
            <div v-for="product in filteredProducts" :key="product.id" class="flex flex-col w-[220px] bg-white border-[2px] border-blue-300 rounded-lg my-2 items-center justify-between">
                <div class="flex justify-end w-[220px]">
                    <div class="flex w-[50px] h-[50px] text-white justify-center items-center rounded-tr-lg rounded-bl-lg text-center bg-blue-300">{{ product.discount_percent }} % OFF</div>
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
        <Footer></Footer>
    </div>
  </template>
  


<script>
import axios from 'axios';
import Topbar from '../components/Topbar.vue';
import Footer from '../components/Footer.vue';

export default {
    data() {
        return {
        products: [],
        };
    },
    components: {
        Topbar,
        Footer,
      },
    mounted() {
        this.fetchProducts();
    },
    computed: {
        filteredProducts() {
        return this.products.filter(product => product.discount_percent !== 0);
        }
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
    },
};
</script>