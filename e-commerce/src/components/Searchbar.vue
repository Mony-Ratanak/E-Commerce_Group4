<template>
    <div class="w-100 h-fit border-2 rounded-lg items-center flex bg-white" style="border-color: #0099FF;">
        <div style="background-color: #212844;" class="flex h-full items-center p-4 gap-2 rounded-l-md">
            <div class="text-center font-medium text-lg w-10 text-white">All</div>
            <img src="../assets/dropdown.png" class="h-[7px] w-[12px] translate-y-[2px]" alt="">
        </div>
        <div>
            <input type="text" placeholder="Search for items" class=" w-[500px] h-[60px] outline-none border-l max-h-full pl-2">
        </div>
        <fa icon="search" class="text-lg bg-white pr-3" style="color: black;"></fa>
    </div>
   

</template>

<script>
    export default{
        name: 'Searchbar'
    }

</script>