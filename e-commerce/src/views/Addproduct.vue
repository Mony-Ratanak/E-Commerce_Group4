<template>
    <div>
      <h2>Create Product</h2>
      <form class="flex flex-col">
        <label for="editedName">Name:</label>
        <input v-model="product.name" id="editedName" />
  
        <label for="editedDescription">Description:</label>
        <textarea v-model="product.description" id="editedDescription"></textarea>
  
        <label for="editedCategory">Category:</label>
        <input v-model="product.category_id" id="editedCategory" />
  
        <label for="editedBrand">Brand:</label>
        <input v-model="product.brand_id" id="editedBrand" />
  
        <label for="editedPricing">Pricing:</label>
        <input v-model="product.pricing" id="editedPricing" />
  
        <label for="imageInput">Image:</label>
        <input type="file" ref="imageInput" @change="handleImageChange" />
  
        <button @click.prevent="saveProduct" type="submit">Create Product</button>
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
  
  <style scoped>
  /* Add your styles for the create view */
  </style>
  