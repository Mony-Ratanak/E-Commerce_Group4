<template>
    <div class="flex flex-col w-screen">
         <div class=" flex items-center justify-between border-b border-gray-300 p-8">
             <div class="w-fit h-fit flex gap-6 items-center">
                 <img src="../assets/logo.png" class="w-fit" >
                 <Searchbar class=" translate-y-[4px]"></Searchbar>
             </div>
             <div class="flex gap-4 text-black pr-6">
                 <MenuItem v-for="menu in Menuitems" :title="menu.title" :icon="menu.icon" :type="menu.type" ></MenuItem>
             </div>
     
         </div>
         <div style="background-color: #212844;" class="flex items-center py-2 pl-8">
             <div class="flex gap-8 p-4">
                 <div class="flex w-fit gap-10 rounded-lg">
                     <!-- <div @click="nextRoute('/categories/category')" class="flex items-center h-full gap-3 ">
                         <p class="font-semibold">Hot Deals</p>  
                     </div> -->
                     <MenuItem @click="nextRoute('/')" v-for="item in ListItem" :title="item.title" :icon="item.icon"></MenuItem>
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
         nextRoute(route) {
           this.$router.push(route)
         }
       }
     }
 
 </script>