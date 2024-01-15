<template>
    <div v-if="product.length > 0">
      <h2>Edit Product</h2>
      <form class="flex flex-col">
        <!-- Display the fetched fields -->
        <label for="editedName">Name:</label>
        <input v-model="product[0].name" id="editedName" />
  
        <label for="editedDescription">Description:</label>
        <textarea v-model="product[0].description" id="editedDescription"></textarea>
  
        <label for="editedCategory">Category:</label>
        <input v-model="product[0].category_id" id="editedCategory" />
  
        <label for="editedBrand">Brand:</label>
        <input v-model="product[0].brand_id" id="editedBrand" />
  
        <label for="editedPricing">Pricing:</label>
        <input v-model="product[0].pricing" id="editedPricing" />

        <label for="editedImage">Image:</label>
        <input v-model="product[0].images" id="editedImage" />
        <img :src="'http://localhost/storage/' + product[0].images" alt="Product Image" class="w-10 h-10">


        
        <label for="imageInput">Image:</label>
        <input type="file" ref="imageInput" @change="handleImageChange" />

        <button @click.prevent="saveChanges" type="submit">Save Changes</button>
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
            const response = await axios.get('http://localhost/api/getproductbyid', {
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
  