<style>
  .scroll {
    overflow-y: scroll;
    overflow-x: hidden;
    margin: 0;
    height: 80vh;
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
          <Promotion :class="promotion.color" v-for="promotion in prom" :image="promotion.image" :name="promotion.name" :title="promotion.title" :bg="promotion.bg" :color="promotion.color" :description="promotion.description" :btn="promotion.btn" :btncolor="promotion.btncolor"></Promotion>
        </div>
        <div class="flex justify-between items-center px-8 mt-4">
          <p class="text-3xl">Grab the best deal on Laptops</p>
          <p class="text-3xl">View all</p>
        </div>
        <div class="border-b-2 border-black mx-8 mt-4"></div>
        <div class="flex px-10 gap-4">
            <Product v-for="product in products" :image= "product.image" :name="product.name" :tag="product.tag" 
                  :rate="product.rate" :description="product.description" :discountPrice="product.discountPrice"
                  :cost="product.sellPrice" :buy="product.buy" :color="product.color"
          ></Product>
        </div>
      </div>
  </div>
</template>


<script>
    import {useEStore} from '../stores/eStore';
    import {mapState} from 'pinia';
    import { RouterLink } from 'vue-router';

    import Product from '../components/Product.vue';
    import Topbar from '../components/Topbar.vue';
    import ShowCase from '../components/ShowCase.vue';
    import Promotion from '../components/Promotion.vue';
  
    export default {
      name: "app",
      components: {
        Topbar,
        ShowCase,
        Promotion,
        Product,
      },
      computed: {
        ...mapState(useEStore,['prom']),
        // ...mapState(useEStore,['categories']),
        ...mapState(useEStore,['products'])
      },
    //   methods: {
    //     nextRoute(route) {
    //       this.$router.push(route)
    //     }
    //   }
    }
     
  </script>