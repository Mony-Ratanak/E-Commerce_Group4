<template>
    <div v-if="category.length > 0" class="flex justify-center items-center w-screen h-screen p-4">
      <form class="flex flex-col border-4 border-[#212844] w-[900px]">
        <h2 class="text-2xl font-bold text-center mb-4">Edit Category</h2>
        <div class="flex flex-col px-5">
          <label for="editedName">Name:</label>
          <input v-model="category[0].name" class="border-[1px] border-[#212844] h-fit rounded-lg p-2" id="editedName" />
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
         category: [],
      };
    },
    created() {
      const categoryId = this.getcategoryIdFromUrl();
      this.fetchCategory(categoryId);
    },
    methods: {
      async fetchCategory(categoryId) {
        const numericCategoryId = +categoryId;
        try {
          console.log('Fetching category for ID:', categoryId);
          const response = await axios.get('http://localhost/api/getcategorybyid', {
                params: {
                id: numericCategoryId,
                },
            });
          this.category = response.data;
        } catch (error) {
          console.error('Error fetching category:', error);
        }
      },
      getcategoryIdFromUrl() {
        const pathArray = window.location.pathname.split('/');
        const categoryId = pathArray[pathArray.length - 1];
        return categoryId || null;
      },
      async updateCategoryOnServer(category) {
        const apiUrl = `http://localhost/api/categories/${category.id}`;
        await axios.patch(apiUrl, category);
      },
      async saveChanges() {
        try {
          await this.updateCategoryOnServer(this.category[0]);
          console.log('Category updated successfully!');
        } catch (error) {
          console.error('Error updating category:', error);
        }
  
        // Navigate to the category table or another route
        this.$router.push("/categorytable");
      },
    },
  };
  </script>
  
  <style scoped>
  /* Add your styles for the edit view */
  </style>
  