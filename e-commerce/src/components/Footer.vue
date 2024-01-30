<template>
    <div class="flex w-full flex-col h-[500px] p-10 bg-[#212844] justify-between items-center mt-4">
        <div class="flex w-full">
            <div class="flex p-8 m-auto">
                <div class="flex flex-col">
                    <h1 class="text-3xl font-bold text-white">O-QUANTRE</h1>
                    <h1 class="text-3xl font-bold text-white">Contact us</h1>
                    <div class="flex mt-4 justify-center items-center text-white gap-2">
                        <img src="@/assets/Call.png" alt="Call Us" class="w-8 h-8 rounded-full">
                        <div class="flex flex-col">
                            <p class="text-center">Call Us</p>
                            <p class="text-center">+855 1234 567</p>
                        </div>
                    </div>
                    <div class="flex mt-4 justify-center items-center text-white gap-2">
                        <img src="@/assets/whatsapp.png" alt="Call Us" class="w-8 h-8 rounded-full">
                        <div class="flex flex-col">
                            <p class="text-center">Telegram</p>
                            <p class="text-center">+855 1234 567</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col px-4 h-fit m-auto">
                <div class="flex text-white">
                    <div class="w-full pr-4">
                        <h2 class="text-2xl font-bold mb-2">Most Popular Categories</h2>
                        <div class="border-b-4 border-white"></div>
                        <ul class="list-disc">
                            <li @click="nextRoute('/Laptop/1')" class="mb-2 mt-2">Laptops</li>
                            <li @click="nextRoute('/Phone/2')" class="mb-2">Phones</li>
                            <li @click="nextRoute('/Laptop%20accessories/4')" class="mb-2">Laptop Accessories</li>
                            <li @click="nextRoute('/Phone%20accessories/5')" class="mb-2">Phone Accessories</li>
                            <li @click="nextRoute('/Smart%20Watch/3')" class="mb-2">Smart Watches</li>
                            <li @click="nextRoute('/Laptop%20accessories/4')" class="mb-2">Watch Accessories</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="flex flex-col px-4 h-fit m-auto">
                <div class="flex text-white">
                    <div class="w-full pr-4">
                        <h2 class="text-2xl font-bold mb-2">Customer Services</h2>
                        <div class="border-b-4 border-white"></div>
                        <ul class="list-disc">
                            <li class="mt-2 mb-2">About us</li>
                            <li class="mb-2">Terms & Conditions</li>
                            <li class="mb-2">Privacy Policy</li>
                            <li class="mb-2">Cancellation & Return Policy</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="border-b-2 border-white w-full"></div>
        <p class="text-xl font-semibold text-white mb-10">© 2023 All rights reserved. G-Quatre-2023.</p>
    </div>
  </template>
  
  <script>
    export default {
        name: 'Footer',
        methods: {
            nextRoute(route) {
                this.$router.push(route)
            },
        },
    };
    
  </script>
  