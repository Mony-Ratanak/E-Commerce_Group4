

<template>
  <div class="flex flex-col gap-4 overflow-x-hidden">
      <topbar></topbar>
      <div class="flex flex-col scroll">
          <div class="flex w-full">
              <div class="flex gap-4 p-2 w-full pl-8">
                <Productbybrand v-for="product in productbycategory" :key="product.id" :tag="product.tag" :color="product.color"></Productbybrand>
              </div>
          </div>
          <Footer></Footer>
      </div>
  </div>
</template>
<style scoped>
  .scroll {
    overflow-y: scroll;
    overflow-x: hidden;
    height: 72vh;
  }
</style>


<script>
    import {useEStore} from '../stores/eStore';
    import {mapState} from 'pinia';
    import { RouterLink } from 'vue-router';

    import Productbybrand from '../components/Productbybrand.vue';
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
        Productbybrand,
        Brand,
        Footer,
      },
      computed: {
        ...mapState(useEStore,['prom']),
        ...mapState(useEStore,['brands']),
        // ...mapState(useEStore,['categories']),
        ...mapState(useEStore,['productbycategory']),
      },
    }
     
  </script>