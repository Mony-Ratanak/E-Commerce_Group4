
<template>
    <div class="div">
        <topbar></topbar>
    </div>
    <div class="scroll flex flex-col">
      <div class="flex justify-center items-center pl-8 gap-96">
          <div class="product-detail">
            <h1 style="color: grey; margin-bottom: 10px;font-size: 25px;">Product Detail</h1>
        
            <!-- Star Rating and User Feedback -->
            <div class="rating-section">
              <p class="star-rating">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <h style="color: #000;margin-left: 15px;margin-right: 10px; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">4.7 Star Rating</h> (21,671 User feedback)</p>
            </div>
        
            <!-- Product Information -->
            <div class="product-info">
              <h2>{{ product.name }}</h2>
              <div class="div" style="display: flex;justify-content: space-between;">
                  <p class="sku">Sku {{ producttmp.sku }}</p>
                  <p class="availability">Availability: {{ producttmp.availability }}</p>
              </div>
              <div class="div" style="display: flex; justify-content: space-between;">
                  <p class="brand">Brand: {{ product.brand.name }}</p>
                  <p class="category">Category: {{ product.category.name }}</p>
              </div>
            </div>
        
            <!-- Price Information -->
            <div class="price-section" style="display: flex;">
              <p class="discounted-price" >${{ product.discounted_price }}</p>
              <p class="original-price">${{ product.pricing }}</p>
              <p class="discount-percentage">{{ product.discount_percent }}% OFF</p>
            </div>
        
            <!-- Color and Storage Options -->
            <div class="options-section">
              <div class="color-option">
                <label for="color">Color:</label>
                <select id="color" v-model="selectedColor">
                  <option v-for="color in producttmp.colors" :key="color.id" :value="color.id">{{ color.name }}</option>
                </select>
              </div>
        
              <div class="storage-option">
                <label for="storage">Storage:</label>
                <select id="storage" v-model="selectedStorage">
                  <option v-for="storageOption in producttmp.storageOptions" :key="storageOption.id" :value="storageOption.id">{{ storageOption.name }}</option>
                </select>
              </div>
            </div>
        
            <!-- Add to Cart and Buy Now Buttons -->
            <div class="action-buttons">
              <!-- <button @click="addToCart">ADD TO CART</button>
              <button @click="buyNow">BUY NOW</button> -->
                  <button1 class="increase-button" @click="increaseQuantity">
                  <i class="fas fa-plus"></i> <!-- Increase icon -->
                  </button1>
                  <button2 @click="addToCart">
                      ADD TO CART
                  <i1 class="fas fa-shopping-cart" ></i1> <!-- Shopping cart icon -->
                  </button2>
                  <button3 @click="buyNow">BUY NOW</button3>
            </div>
        </div>
        <div class="flex justify-center border-[1px] border-[#0099FF] p-8 hover:bg-gray-200">
            <img class="w-fit h-96" :src="'http://localhost/storage/' + product.images" alt="Product Image">
        </div>
      </div>
      <div class="Decription border-2 border-[#0099FF]" >
              <!-- DESCRIPTION Section -->
              <section class="section border-b border-[#0099FF]" style="display: flex;justify-content: space-between;padding-left: 400px;padding-right: 400px;">
                  <h2>DESCRIPTION</h2>
                  <h2>ADDITIONAL INFORMATION</h2>
                  <h2>SPECIFICATION</h2>
                  <h2>REVIEW</h2>
              </section>
          <div class="center" style="display: flex;margin-left: 100px;">
                  <!-- ADDITIONAL INFORMATION Section -->
              <section class="section" style="width: 45%;">
                  <h2>Description</h2>
                  <ul>
                    <p>{{ product.description }}</p>
                  </ul>
              </section>

              <!-- SPECIFICATION Section -->
              <section class="section" style="margin-left: 70px;">
                  <h2>Feature</h2>
                  <ul>
                      <li>Free 1 Year Warranty</li>
                      <li>Free Shipping & Fasted Delivery</li>
                      <li>100% Money-back guarantee</li>
                      <li>24/7 Customer support</li>
                      <li>Secure payment method</li>
                      
                  </ul>
              </section>

              <!-- Shipping Information Section -->
              <section class="section border-l border-[#0099FF] my-2" style="margin-left: 100px;">
                  <h2>Shipping Information</h2>
                  <p>Courier: 2-4 days, free shipping</p>
                  <p>Local Shipping up to one week, $19.00</p>
                  <p>UPS Ground Shipping: 4-6 days. $29.00</p>
                  <p>Unishop Global Export: 3-4 days, $39.00</p>
                  
              </section>
          </div> 
        </div>
        <Footer></Footer>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  import Topbar from '../components/Topbar.vue';
  import Footer from '../components/Footer.vue';
  import '@fortawesome/fontawesome-free/css/all.min.css';
  
  export default {
    name: "app",
    components: {
      Topbar,
      Footer,
    },
    data() {
      return {
        product: null,
        producttmp: {
          name: "2020 Apple MacBook Pro with Apple M1 Chip (13-inch, 8GB RAM, 256GB SSD Storage)-Space Gray",
          description: "The most powerful MacBook Pro ever is here. With the blazing-fast MI Pro or Mi Max chip...",
          sku: "A264671",
          availability: "In Stock",
          brand: "Apple",
          category: "Electronics Devices",
          originalPrice: 1999.00,
          discountedPrice: 1699.00,
          discountPercentage: 21,
          colors: [
            { id: 1, name: "Space Gray" },
            // Add more colors if needed
          ],
          storageOptions: [
            { id: 1, name: "256GB SSD Storage" },
            { id: 2, name: "1TB SSD Storage" },
            // Add more storage options if needed
          ],
        },
        selectedColor: 1,
        selectedStorage: 1,
      };
    },
    created() {
        const productId = this.getProductIdFromUrl();
        console.log("productId:", productId);
        this.fetchProduct(productId);
    },
    methods: {
        async fetchProduct(productId) {
            const numericProductId = +productId;
            try {
                console.log('Fetching product for productId:', productId);
                const response = await axios.get('http://localhost/api/getproductbyid', {
                    params: {
                        id: numericProductId,
                    },
                });
                this.product = response.data;  // Corrected from this.products to this.product
            } catch (error) {
                console.error('Error fetching product:', error);
            }
        },
      increaseQuantity() {
        // Implement your logic to increase the quantity
        console.log("Quantity increased!");
      },
      addToCart() {
        // Implement your logic to add the product to the cart
        console.log("Product added to cart!");
      },
      buyNow() {
        // Implement your logic for the "Buy Now" action
        console.log("Buy Now clicked!");
      },
      getProductIdFromUrl() {
        const pathArray = window.location.pathname.split('/');
        const productId = pathArray[pathArray.length - 1];
        return productId || null;
        },
    },
    watch: {
      $route(to, from) {
        const productId = this.getProductIdFromUrl();
        this.fetchProduct(productId);
      },
    },
  };
  </script>
  
  
  <style scoped>
    .scroll {
    overflow-y: scroll;
    overflow-x: hidden;
    margin: 0;
    height: 75vh;
  }

  .scroll::-webkit-scrollbar {
    width: 4px;
  }

  .scroll::-webkit-scrollbar-thumb {
    background-color: #000000;
    border-radius: 6px;
  }

  .scroll::-webkit-scrollbar-track {
    background-color: #f1f1f1;
  }
  /* Add styles specific to this component */
  .product-detail {
    max-width: 800px;
    /* margin: 0 auto; */
    margin-top: 50px;
    padding: 20px;
    background-color: #fff;
    /* border: 1px solid #ddd;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); */
  }
  
  h1 {
    color: #333;
  }
  i{
    font-size: 15px;
    color: #f39c12;
  }
  i1{
    color: whitesmoke;
    margin-left: 15px;
  }
  .rating-section {
    margin-bottom: 20px;
  }
  
  .star-rating {
    color: #858382;
    font-size: 18px;
  }
  
  .product-info {
    margin-bottom: 20px;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
  }
  
  h2 {
    color: #333;
  }
  
  .sku,
  .availability,
  .brand,
  .category {
    color: #555;
  }
  
  .price-section {
    margin-bottom: 20px;
  }
  
  .discounted-price {
    color: #4174ec;
    font-size: 24px;
    font-weight: bold;
    margin-right: 15px;
  }
  
  .original-price {
    text-decoration: line-through;
    color: #777;
    margin-right: 15px;
    margin-top: 5px;
  }
  
  .discount-percentage {
    color: #27ae60;
    background-color: yellow;
    padding: 5px;
    border-radius: 5px;
  }
  
  .options-section {
    /* display: flex;
    justify-content: space-between; */
    margin-bottom: 20px;
  }
  
  .color-option,
  .storage-option {
    flex: 1;
    margin-right: 10px;
    width: 250px;
  }
  
  label {
    display: block;
    margin-bottom: 5px;
    color: #333;
  }
  
  select {
    width: 100%;
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 5px;
  }
  
  .action-buttons {
    display: flex;
    margin-bottom: 20px;
  }
  
  button1 {
    padding: 10px 20px;
    font-size: 16px;
    background-color: #ffffff;
    color: hsl(0, 0%, 0%);
    border: 2px solid #88817E;
    border-radius: 5px;
    cursor: pointer;
    margin-right: 25px;
  }
  button2 {
    padding: 10px 20px;
    font-size: 16px;
    background-color: #fb7942;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-right: 25px;
  }
  button3 {
    padding: 10px 20px;
    font-size: 16px;
    background-color: #feffff;
    color: #f38353;
    border: none;
    border: 2px solid #f38353;
    border-radius: 5px;
    cursor: pointer;
    margin-right: 25px;
  }
  
  .description,
  .additional-info,
  .shipping-info {
    margin-bottom: 20px;
  }
  
  .description h2,
  .additional-info h2,
  .shipping-info h2 {
    color: #333;
    margin-bottom: 10px;
  }
  
  ul {
    list-style-type: none;
    padding: 0;
  }
  
  ul li {
    margin-bottom: 5px;
    color: #555;
  }
  .Description {
  max-width: 800px;
  margin: 0 auto;
  border-collapse: collapse;
  width: 100%;
  display: flex;
}

.section {
  /* border: 1px solid #ddd; */
  padding: 10px;
}

h2 {
  color: #333;
  font-size: 20px;
  margin-bottom: 10px;
}

p {
  color: #555;
}

ul {
  list-style-type: none;
  padding: 0;
  color: #555;
}

li {
  margin-bottom: 5px;
}

li::before {
  content: '\2022'; /* Bullet point */
  color: #333;
  display: inline-block;
  width: 1em;
  margin-left: -1em;
}
  </style>