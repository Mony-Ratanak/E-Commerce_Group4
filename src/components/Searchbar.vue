<template>
    <div class="w-100 h-fit border-2 rounded-lg items-center flex bg-white" style="border-color: #0099FF;">
      <div @click="toggleDropdown" style="background-color: #212844;" class="flex h-full items-center p-4 gap-2 rounded-l-md cursor-pointer">
        <div class="text-center font-medium text-lg w-10 text-white">All</div>
        <img src="../assets/dropdown.png" class="h-[7px] w-[12px] translate-y-[2px]" alt="">
      </div>
      
      <!-- Dropdown menu -->
      <div v-if="showDropdown" class="flex flex-col absolute bg-white border-2 rounded-lg mt-40">
        <div @click="selectOption('1')" class="px-4 py-2">All</div>
        <div @click="selectOption('2')" class="px-4 py-2">Trending</div>
        <div @click="selectOption('3')" class="px-4 py-2">Discount</div>
      </div>
  
      <div>
        <input type="text" placeholder="Search for items" class="w-[500px] h-[60px] outline-none border-l max-h-full pl-2">
      </div>
      <fa icon="search" class="text-lg bg-white pr-3" style="color: black;"></fa>
    </div>
  </template>

<script>
export default {
  data() {
    return {
      showDropdown: false,
    };
  },
  methods: {
    toggleDropdown() {
      this.showDropdown = !this.showDropdown;
    },
    selectOption(option) {
      this.showDropdown = false;
    },
  },
};
</script>