<template>
    <div class="flex flex-col gap-4">
        <topbar></topbar>
        <ShowCase></ShowCase>
        <div class="flex gap-4 mb-3">
            <Promotion :class="promotion.color" v-for="promotion in prom" :image="promotion.image" :description="promotion.title" :bg="promotion.bg"></Promotion>
        </div>
    </div>
</template>

<script>
    import {useEStore} from '../stores/eStore';
    import {mapState} from 'pinia';
    import { RouterLink } from 'vue-router';
  
    import Topbar from '../components/Topbar.vue';
    import ShowCase from '../components/ShowCase.vue';
    import Promotion from '../components/Promotion.vue';
  
    export default {
      name: "app",
      components: {
        Topbar,
        ShowCase,
        Promotion,
      },
    //   computed: {
    //     ...mapState(useEStore,['prom']),
    //     ...mapState(useEStore,['categories']),
    //     ...mapState(useEStore,['products'])
    //   },
    //   methods: {
    //     nextRoute(route) {
    //       this.$router.push(route)
    //     }
    //   }
    }
     
  </script>