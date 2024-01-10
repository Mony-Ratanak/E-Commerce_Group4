
<template>
    <div :class="color" class="h-[300px] w-screen relative rounded-md shadow-md overflow-hidden">
        <img class="absolute bottom-0 right-6 w-[250px]" :src="image" >
        
        <div class="w-[271px] h-[160px] flex flex-col m-auto justify-between gap-6 absolute items-between left-10 top-14 ">
            <div class="flex flex-col">
                <h2 class="font-semibold text-2xl text-white">{{title}}</h2>
                <h2 class="font-semibold text-2xl text-white">{{description}}</h2>
            </div>
            <div :class="btncolor" class="w-[170px] h-[40px] flex gap-2 justify-center items-center rounded-md shadow-md overflow-hidden">
                <p class="flex text-center font-semibold text-white">{{ btn }}</p>
            </div>
        </div>  
    </div>
</template> 



<script>
    import Button from './Button.vue';
    export default {
        name: "Brand",
        props: {
            image: String,
            name: String,
            title: String,
            bg: String,
            color: String,
            description: String,
            btn: String,
            btncolor: String,
        },
    }
</script>