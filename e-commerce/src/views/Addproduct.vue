<template>
    <div class="flex justify-center items-center h-screen bg-white">
      <form class="flex flex-col border-4 border-[#212844] p-4">
        <h2 class="mb-4 text-center text-bold text-2xl">Create Product</h2>
        <label for="editedName">Name:</label>
        <input class="border-[1px] border-[#212844] h-10 rounded-lg" v-model="product.name" id="editedName" />
  
        <label for="editedDescription">Description:</label>
        <textarea class="border-[1px] border-[#212844] h-20 rounded-lg" v-model="product.description" id="editedDescription"></textarea>
  
        <label for="editedCategory">Category:</label>
        <input class="border-[1px] border-[#212844] h-10 rounded-lg" v-model="product.category_id" id="editedCategory" />
  
        <label for="editedBrand">Brand:</label>
        <input class="border-[1px] border-[#212844] h-10 rounded-lg" v-model="product.brand_id" id="editedBrand" />
  
        <label for="editedPricing">Pricing:</label>
        <input class="border-[1px] border-[#212844] h-10 rounded-lg" v-model="product.pricing" id="editedPricing" />

        <label for="editedPricing">Discount_Percent</label>
        <input class="border-[1px] border-[#212844] h-10 rounded-lg" v-model="product.discount_percent" id="editedPricing" />
  
        <label for="imageInput">Image:</label>
        <input type="file" ref="imageInput" @change="handleImageChange" />
  
        <button class="bg-[#212844] text-white p-2 mt-4" @click.prevent="saveProduct" type="submit">Create Product</button>
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
            const apiUrl = 'http://localhost/api/createProduct';
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
  
  