<template>
    <div class="flex flex-col w-screen relative p-10">
      <transition name="fade" mode="out-in">
        <div v-if="changeblock" key="green" style="background-color: #000000;" class="flex pl-40 rounded-3xl h-[500px] justify-between items-center pr-40">
          <div class="flex flex-col">
            <p class="text-3xl font-semibold text-white">Best deal online on the new MACBOOK</p>
            <p class="text-7xl text-white">MACBOOK PRO 2023</p>
            <p class="text-3xl text-white">Up to 25% off</p>
          </div>
          <img src="../assets/macbooklogo.png" class="w-[400px] h-[400px]">
        </div>
        <div v-else key="white"  style="background-color: #212844;" class="flex pl-40 rounded-3xl h-[500px] justify-between items-center pr-40">
          <div class="flex flex-col">
            <p class="text-3xl font-semibold text-white">Best deal online on smart watches</p>
            <p class="text-7xl text-white">Smart Wearable</p>
            <p class="text-3xl text-white">Up to 80% off</p>
          </div>
          <img src="../assets/watchlogo.png" class="w-fit h-fit">
        </div>
      </transition>
  
      <div style="background-color: #212844;" @click="toggleBlock" class="w-[80px] h-[80px] absolute left-1 top-[260px] rounded-full flex items-center justify-center border-8 border-white">
        <fa icon="angle-left" class="text-white"></fa>
      </div>
      <div style="background-color: #212844;" @click="toggleBlock" class="w-[80px] h-[80px] absolute right-1 top-[260px] rounded-full flex items-center justify-center border-8 border-white">
        <fa icon="angle-right" class="text-white"></fa>
      </div>
    </div>
  </template>
  
  <style>
  .fade-enter-active, .fade-leave-active {
    transition: opacity 0.5s, transform 0.5s;
  }
  .fade-enter, .fade-leave-to {
    opacity: 0;
    transform: translateX(100px);
  }
  </style>
  
  <script>
  export default {
    name: "ShowCase",
    data() {
      return {
        changeblock: false,
      };
    },
    methods: {
      toggleBlock() {
        this.changeblock = !this.changeblock;
      },
    },
  };
  </script>
  