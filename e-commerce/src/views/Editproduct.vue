<template>
    <div v-if="product.length > 0" class="flex justify-center items-center w-screen h-screen p-4">
      <form class="flex flex-col border-4 border-[#212844] w-[900px]">
        <h2 class="text-2xl font-bold text-center mb-4">Edit Product</h2>
        <div class="flex flex-col px-5">
            <label for="editedName">Name:</label>
            <input v-model="product[0].name" class="border-[1px] border-[#212844] h-fit rounded-lg p-2" id="editedName" />
      
            <label for="editedDescription">Description:</label>
            <textarea v-model="product[0].description" class="border-[1px] border-[#212844] h-fit rounded-lg p-2" id="editedDescription"></textarea>
      
            <label for="editedCategory">Category:</label>
            <input v-model="product[0].category_id" class="border-[1px] border-[#212844] h-fit rounded-lg p-2" id="editedCategory" />
      
            <label for="editedBrand">Brand:</label>
            <input v-model="product[0].brand_id" class="border-[1px] border-[#212844] h-fit rounded-lg p-2" id="editedBrand" />
      
            <label for="editedPricing">Pricing:</label>
            <input v-model="product[0].pricing" class="border-[1px] border-[#212844] h-fit rounded-lg p-2" id="editedPricing" />

            <label for="editedDiscount_percent">Discount_percent:</label>
            <input v-model="product[0].discount_percent" class="border-[1px] border-[#212844] h-fit rounded-lg p-2" id="editedDiscount_percent" />

            <label for="editedDiscounted_price">Discounted_price:</label>
            <input v-model="product[0].discounted_price" class="border-[1px] border-[#212844] h-fit rounded-lg p-2" id="editedDiscounted_price" />

            <label for="editedImage">Image:</label>
            <!-- <input v-model="product[0].images" id="editedImage" /> -->
            <img :src="'http://localhost/storage/' + product[0].images" alt="Product Image" class="w-[250px] h-fit">
            
            <label for="imageInput">Image:</label>
            <input type="file" ref="imageInput" @change="handleImageChange" />
        </div>

        <button @click.prevent="saveChanges" type="submit" class="p-3 bg-[#212844] text-white mt-2">Save Changes</button>
      </form>
    </div>
  </template>
  
  
  
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        product: [],
      };
    },
    created() {
      const Id = this.getIdFromUrl();
      this.fetchproduct(Id);
    },
    methods: {
        async fetchproduct(Id) {
            const numericId = +Id;
            try {
            console.log('Fetching product for Id:', Id);
            const response = await axios.get('http://localhost/api/getproductbyidwithoutcategory', {
                params: {
                id: numericId,
                },
            });
            this.product = response.data;
            } catch (error) {
            console.error('Error fetching product:', error);
            }
        },
        getIdFromUrl() {
            const pathArray = window.location.pathname.split('/');
            const Id = pathArray[pathArray.length - 1];
            return Id || null;
        },
        async updateProductOnServer(product) {
        const apiUrl = `http://localhost/api/products/${product.id}`;
        await axios.patch(apiUrl, product);
        },
        nextRoute(route) {
          this.$router.push(route)
        },
        handleImageChange(event) {
            this.imageFile = event.target.files[0];
            this.convertImageToBase64();
        },
        convertImageToBase64() {
            const reader = new FileReader();
            reader.onloadend = () => {
                this.base64Image = reader.result;
            };
            if (this.imageFile) {
                reader.readAsDataURL(this.imageFile);
            }
        },
        async saveChanges() {
        try {
            // Assuming you want to update the product with the base64 image data
            await this.updateProductOnServer(this.product[0]);
            this.product[0].images = this.base64Image;

            // Now, you can update the base64 image in the database (call your API endpoint for updating)
            await this.updateBase64ImageInDatabase(this.base64Image);

            console.log('Base64 image updated in the database successfully!');
        } catch (error) {
            console.error('Error updating base64 image:', error);
        }

        this.nextRoute("/producttable")
        },
        // Add this method to your Vue component
        async updateBase64ImageInDatabase(base64Image) {
        try {
            const productId = this.product[0].id; // Assuming product id is needed for the update
            await axios.patch(`http://localhost/api/products/${productId}`, { base64Image });
            console.log('Base64 image updated in the database successfully!');
        } catch (error) {
            console.error('Error updating base64 image in the database:', error);
        }
        },

  },
}; 
 </script>
  
  <style scoped>
  /* Add your styles for the edit view */
  </style>
  