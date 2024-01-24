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
  <div class="flex flex-col gap-4">
      <topbar></topbar>
      <div class="scroll">
          <div class="px-10 w-100">
              <div class="horizontalscroll flex gap-4 w-full p-2">
                <div class="horizontalscroll flex gap-4 w-full">
                  <ProductSmartphone v-for="product in productsmartphones" :key="product.id" :image= "product.image"
                  ></ProductSmartphone>
              </div>
              </div>
          </div>
      </div>
  </div>
</template>


<script>
    import {useEStore} from '../stores/eStore';
    import {mapState} from 'pinia';
    import { RouterLink } from 'vue-router';

    import ProductLaptop from '../components/ProductLaptop.vue';
    import ProductSmartphone from '../components/ProductSmartphone.vue';
    import Topbar from '../components/Topbar.vue';
    import ShowCase from '../components/ShowCase.vue';
    import Promotion from '../components/Promotion.vue';
    import Brand from '../components/Brand.vue';
  
    export default {
      name: "app",
      components: {
        Topbar,
        ShowCase,
        Promotion,
        ProductLaptop,
        ProductSmartphone,
        Brand,
      },
      computed: {
        ...mapState(useEStore,['prom']),
        ...mapState(useEStore,['brands']),
        // ...mapState(useEStore,['categories']),
        ...mapState(useEStore,['productlaptops']),
        ...mapState(useEStore,['productsmartphones'])
      },
    //   methods: {
    //     nextRoute(route) {
    //       this.$router.push(route)
    //     }
    //   }
    }
     
  </script>