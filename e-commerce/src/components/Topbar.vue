<style scoped>
.topbar {
    height: 25vh;
  }


</style>


<template>
    <div class="flex flex-col w-screen">
         <div class=" flex items-center justify-between border-b border-gray-300 p-8">
             <div class="w-fit h-fit flex gap-6 items-center">
                 <img @click="nextRoute('/home/welcome')" src="../assets/logo.png" class="w-fit" >
                 <Searchbar class=" translate-y-[4px]"></Searchbar>
             </div>
             <div class="flex gap-4 text-black pr-6">
                 <MenuItem @click="nextRoute('/profile')" v-for="menu in Menuitems" :key="menu.title" :title="menu.title" :icon="menu.icon" :type="menu.type" ></MenuItem>
             </div>
         </div>
         <div style="background-color: #212844;" class="flex items-center py-2 pl-8">
             <div class="flex gap-8 p-4">
                 <div class="category flex w-fit gap-10 rounded-lg">
                     <MenuItem @click="nextRoutecategory(item)" :key="item.id" v-for="item in ListItem" :title="item.title" :icon="item.icon"></MenuItem>
                 </div>
             </div>
         </div>
    </div>
 
 </template>
 
 <script>
     import {useEStore} from '../stores/eStore';
     import {mapState} from 'pinia';
 
     import Searchbar from './Searchbar.vue'
     import MenuItem from './MenuItem.vue';
     export default{
         name: "Topbar",
         components: {
             Searchbar,
             MenuItem
         },
         computed: {
             ...mapState(useEStore,['Menuitems']),
             ...mapState(useEStore,['ListItem'])
         },
         methods: {
            nextRoutecategory(item) {
                console.log('Clicked item:', item);
                this.$router.push(`/${item.title}/${item.id}`);
                
            },
            nextRoute(route) {
                this.$router.push(route)
            },
        },

    }
     
 
 </script>