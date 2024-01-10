<template>
    
    <div class="flex flex-col w-[220px] bg-gray-200 border-[2px] border-blue-300 rounded-lg my-2 items-center ">
        <div class="flex justify-end w-[220px]">
            <div class="flex w-[60px] h-[60px] text-white justify-center items-center rounded-tr-lg rounded-bl-lg text-center" :class="color">{{tag}}</div>
        </div>
        <img class="w-fit mb-2" :src="image" :alt="image">
        <div class="flex flex-col bg-white w-full px-4">
            <div class="mt-4 bg-white">
                <p class="font font-bold text-[18px]">{{ name }}</p>
                <p class="mt-2 text-gray-400 line-through">{{ description}}</p>
            </div>
            <div class="flex w-full">
                <div class="border-b-2 border-gray-300 w-full"></div>
            </div>
            <div class="flex flex-row w-full py-2">
                <div class="flex w-full justify-between">
                    <p class="text-black">{{ discountPrice}}</p>
                    <p class="text-green-500">{{ buy }}</p>
                </div>
            </div> 
        </div>
    </div>
</template>
<script>
    export default {
        name: "Product",
        props: {
            image: String,
            name: String,
            description: String,
            tag: String,
            kg: String,
            discountPrice: String,
            rate: String,
            cost: String,
            color: String,
            bg1: String,
            buy: String,
        },
    }

</script>