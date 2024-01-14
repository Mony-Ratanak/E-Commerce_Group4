<style>
  .scroll {
    overflow-y: scroll;
    overflow-x: hidden;
    margin: 0;
    height: 78vh;
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
  <div class="flex flex-col gap-4">
      <topbar></topbar>
      <div class="scroll">
          <ShowCase></ShowCase>
          <div class="flex gap-10 px-10">
            <Promotion :class="promotion.color" :key="promotion.id" v-for="promotion in prom" :image="promotion.image" :name="promotion.name" :title="promotion.title" :bg="promotion.bg" :color="promotion.color" :description="promotion.description" :btn="promotion.btn" :btncolor="promotion.btncolor"></Promotion>
          </div>
          <div class="flex justify-between items-center px-8 mt-4">
            <p class="text-3xl">Grab the best deal on Laptops</p>
            <p class="text-3xl">View all</p>
          </div>
          <div class="border-b-2 border-black mx-8 mt-4"></div>
          <div class="px-10 w-100">
              <div class="horizontalscroll flex gap-4 w-full p-2">
                <ProductLaptop v-for="product in productlaptops" :key="product.id" :tag="product.tag" :color="product.color"
                ></ProductLaptop>
              </div>
          </div>
          <div class="flex justify-between items-center px-8 mt-4">
            <p class="text-3xl">Grab the best deal on SmartPhones</p>
            <p class="text-3xl">View all</p>
          </div>
          <div class="border-b-2 border-black mx-8 mt-4"></div>
          <div class="px-10 w-100">
              <div class="horizontalscroll flex gap-4 w-full">
                <ProductSmartphone v-for="product in productsmartphones" :key="product.id"
                ></ProductSmartphone>
              </div>
          </div>
          <div class="flex justify-between items-center px-8 mt-4">
            <p class="text-3xl">Top Brands</p>
            <p class="text-3xl">View all</p>
          </div>
          <div class="border-b-2 border-black mx-8 mt-4"></div>
          <div class="px-10 w-full justify-center items-center mt-4">
              <div class="horizontalscroll flex gap-4 w-full justify-between">
                <Brand @click="nextbrandRoute(brand)" :class="brand.color" :key="brand.id" v-for="brand in brands" :image="brand.image" :bigimage="brand.bigimage" :name="brand.name" :color="brand.color" :description="brand.description" :textcolor="brand.textcolor" :btncolor="brand.btncolor"></Brand>
              </div>
          </div>
          <div>
            <Footer></Footer>
          </div>
      </div>
  </div>
</template>


<script>
    import {useEStore} from '../stores/eStore';
    import {mapState} from 'pinia';
    import { RouterLink } from 'vue-router';

    import Productbycategory from '../components/Productbycategory.vue';
    import ProductLaptop from '../components/ProductLaptop.vue';
    import ProductSmartphone from '../components/ProductSmartphone.vue';
    import Topbar from '../components/Topbar.vue';
    import ShowCase from '../components/ShowCase.vue';
    import Promotion from '../components/Promotion.vue';
    import Brand from '../components/Brand.vue';
    import Footer from '../components/Footer.vue';
  
    export default {
      name: "app",
      components: {
        Topbar,
        ShowCase,
        Promotion,
        Productbycategory,
        ProductSmartphone,
        ProductLaptop,
        Brand,
        Footer,
      },
      computed: {
        ...mapState(useEStore,['prom']),
        ...mapState(useEStore,['brands']),
        // ...mapState(useEStore,['categories']),
        ...mapState(useEStore,['productbycategory']),
        ...mapState(useEStore,['productlaptops']),
        ...mapState(useEStore,['productsmartphones']),
      },
      methods: {
        nextbrandRoute(brand) {
          this.$router.push(`/${brand.name}/${brand.id}`);
        },
        nextproductRoute(product) {
          this.$router.push(`/${product.title}/${product.id}`);
        },
      },
    }
     
  </script>