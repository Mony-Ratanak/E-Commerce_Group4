
<template>
    <div :class="color" class="flex rounded-xl shadow-md w-[420px] relative pl-4">
        <div class="flex flex-col gap-4 p-2 justify-between my-2">
            <div :class="btncolor" class="flex p-4 bg-black w-fit font-semibold text-2xl text-white rounded-xl">{{name}}</div>
            <img class="w-16" :src="image" >
            <h2 :class="textcolor" class="font-semibold text-2xl">{{description}}</h2>
        </div>
        <div class="w-[100px]">
            <img class="absolute top-[10px]" :src="bigimage" >
        </div>
    </div>
</template> 



<script>
    export default {
        name: "Brand",
        props: {
            image: String,
            bigimage: String,
            name: String,
            color: String,
            textcolor: String,
            btncolor: String,
            description: String,
        },
    }
</script>