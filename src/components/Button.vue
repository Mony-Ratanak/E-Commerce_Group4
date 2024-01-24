<template>
    <div class="w-[110px] h-[40px] flex gap-2 justify-evenly pr-3 items-center rounded-md shadow-md overflow-hidden">
      <p class="translate-x-3 translate-y-[-1px] text-center font-semibold text-white">{{ btn }}</p>
    </div>
  </template>
  
  <script>
  export default {
    name: "Button",
    props: {
            btn: String,
        },
  };
  </script>
  