<template>
    <div v-if="type === 'header'" class="flex items-center justify-center gap-2">     
        <fa :icon="icon" class="h-[20px]" ></fa>
        <p class="font-semibold">{{title}}</p>
    </div>
    <div v-else class="flex items-center justify-center gap-2 bg-white px-4 py-2 rounded-xl">     
    <div class="font-semibold text-black">{{ title }}</div>
    <fa :icon="icon" class="text-sm" style="color: #0099FF;"></fa>
</div>

</template>

<script>
    export default{
        name:"MenuItem",
        props: {
            title: String,
            icon: String,
            type: String
        }
    }

</script>