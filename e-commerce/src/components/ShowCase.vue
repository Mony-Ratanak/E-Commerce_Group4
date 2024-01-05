<template>
    <div class="flex flex-col w-screen relative">
        <div class="flex flex-col w-screen bg-white p-12">
            <div style="background-color: #212844;" class="flex pl-40 rounded-3xl h-[500px] justify-between items-center pr-40">
                <div class="flex flex-col">
                    <p class="text-7xl font-semibold text-white">Best deal online on smart watches</p>
                    <p class="text-3xl text-white">Smart Wearable</p>
                    <p class="text-3xl text-white">Up to 80% off</p>
                </div>
                <img src="../assets/watchlogo.png" class="w-fit h-fit" >
            </div>
        </div>
        <div style="background-color: #212844;" class="w-[80px] h-[80px] absolute left-1 top-[260px] rounded-full flex items-center justify-center border-8 border-white">
            <fa icon="angle-left" class="text-white"></fa>
        </div>
        <div style="background-color: #212844;" class="w-[80px] h-[80px] absolute right-1 top-[260px] rounded-full flex items-center justify-center border-8 border-white">
            <fa icon="angle-right" class="text-white"></fa>
        </div>
    </div>

</template>


<script>
    export default {
        name: "ShowCase"
    }
</script>