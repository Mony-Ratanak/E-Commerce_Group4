<template>
    <div class="flex justify-center items-center h-screen bg-white">
      <form class="flex flex-col border-4 border-[#212844] p-4 ">
        <h2 class="mb-4 text-center text-bold  text-2xl">Create Product</h2>

        <hr class="h-0.5 mb-3 bg-black">

        <div class="mb-3">
            <label for="editedName" >Name:</label>
            <input class="border-[1px] border-[#212844] h-10 ml-12 pl-2 rounded-lg w-60 " v-model="product.name" id="editedName" placeholder="enter name product"/>
        </div>
  
        <div class="flex ">
          <label for="editedDescription" class="mt-3">Description:</label>
          <textarea class="border-[1px] border-[#212844] ml-2 h-15 w-60 mb-3 rounded-lg" v-model="product.description" id="editedDescription"></textarea>
        </div>

        <div class="">
            <label for="editedCategory">Category:</label>
            <input class="border-[1px] border-[#212844] h-10 ml-6 w-60 mb-3 rounded-lg" v-model="product.category_id" id="editedCategory" />

        </div>

       <div>
          <label for="editedBrand">Brand:</label>
          <input class="border-[1px] ml-12 w-60 mb-3  border-[#212844] h-10 rounded-lg" v-model="product.brand_id" id="editedBrand" />
  
       </div>

        <div>
          <label for="editedPricing">Pricing:</label>
          <input class="border-[1px] border-[#212844] ml-10 w-60 mb-3 h-10 rounded-lg" v-model="product.pricing" id="editedPricing" />

        </div>

        <div>
          <label for="editedPricing">Discount_Percent:</label>
          <input class="border-[1px] border-[#212844] h-10 ml-5 mb-3 w-55 rounded-lg" v-model="product.discount_percent" id="editedPricing" />
  
        </div> 

        <div class="flex">
          <label class="mr-2"  for="imageInput">Image:</label>
          <input class="-ml-[55px] mt-7  " type="file" ref="imageInput" @change="handleImageChange" />
  
        </div>
        <button class="bg-[#212844] text-white p-2 mt-9 " @click.prevent="saveProduct" type="submit">Create Product</button>
      </form>
    </div>
  </template>
  
  <script>
    import { ref } from 'vue';
    import { useRouter } from 'vue-router';
    import axios from 'axios';

    export default {
    setup() {
        const router = useRouter();

        const product = ref({
        name: '',
        description: '',
        category_id: '',
        brand_id: '',
        pricing: '',
        discount_percent: '',
        images: [],
        });

        const saveProduct = async () => {
        try {
            if (product.value.images.length > 0) {
            await convertImagesToBase64();
            }

            await createProductOnServer(product.value);

            console.log('Product created successfully!');
            nextRoute("/producttable");
        } catch (error) {
            console.error('Error creating product:', error);
        }
        };

        const createProductOnServer = async (product) => {
            axios.defaults.headers.common["Authorization"] = "Bearer " + localStorage.getItem("token");
            const apiUrl = 'http://127.0.0.1:8000/api/createProduct';
            await axios.post(apiUrl, product);
        };

        const convertImagesToBase64 = async () => {
        await Promise.all(
            product.value.images.map(async (imageObj, index) => {
            return new Promise((resolve) => {
                const reader = new FileReader();
                reader.onloadend = () => {
                // Use ref.value to update reactive properties in Vue 3
                product.value.images[index] = { data: reader.result };
                resolve();
                };
                reader.readAsDataURL(imageObj.file);
            });
            })
        );
        };

        const handleImageChange = (event) => {
        const file = event.target.files[0];
        product.value.images.push({ file });
        };

        const nextRoute = (route) => {
        // Use router.push instead of this.$router.push
        router.push(route);
        };

        return {
        product,
        saveProduct,
        handleImageChange,
        };
    },
    };


  </script>
  
  