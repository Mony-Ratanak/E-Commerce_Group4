
  <template>
    <div class="div">
        <topbar></topbar>
    </div>
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
            <p class="sku">Sku {{ product.sku }}</p>
            <p class="availability">Availability: {{ product.availability }}</p>
        </div>
        <div class="div" style="display: flex; justify-content: space-between;">
            <p class="brand">Brand: {{ product.brand }}</p>
            <p class="category">Category: {{ product.category }}</p>
        </div>
        
      </div>
  
      <!-- Price Information -->
      <div class="price-section" style="display: flex;">
        <p class="discounted-price" >${{ product.discountedPrice }}</p>
        <p class="original-price">${{ product.originalPrice }}</p>
        <p class="discount-percentage">{{ product.discountPercentage }}% OFF</p>
      </div>
  
      <!-- Color and Storage Options -->
      <div class="options-section">
        <div class="color-option">
          <label for="color">Color:</label>
          <select id="color" v-model="selectedColor">
            <option v-for="color in product.colors" :key="color.id" :value="color.id">{{ color.name }}</option>
          </select>
        </div>
  
        <div class="storage-option">
          <label for="storage">Storage:</label>
          <select id="storage" v-model="selectedStorage">
            <option v-for="storageOption in product.storageOptions" :key="storageOption.id" :value="storageOption.id">{{ storageOption.name }}</option>
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
    <div class="Decription" >
            <!-- DESCRIPTION Section -->
            <section class="section" style="display: flex;justify-content: space-between;padding-left: 400px;padding-right: 400px;">
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
                    <p>The most powerful MacBook Pro ever is here. With the blazing-fast MI Pro or Mi Max chip-the 
                    first Apple silicon designed for pros-you get groundbreaking performance and amazing battery life. 
                    Add to that a stunning Liquid Retina XDR display, the best camera and audio ever in a Mac notebook, 
                    and all the parts you need. The first notebook of its kind, this MacBook Pro is a beast. M1 Pro takes 
                    the exceptional performance of the MI architecture to a whole new level for pro users.</p>
                    <p>Even the most ambitious projects are easily handled with up to 10 CPU cores, up to 16 GPU cores, 
                        a 16-core Neural Engine, and dedicated encode and decode media engines that support H.264, HEVC. 
                        and ProRes codecs.</p>
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
            <section class="section" style="margin-left: 100px;">
                <h2>Shipping Information</h2>
                <p>Courier: 2-4 days, free shipping</p>
                <p>Local Shipping up to one week, $19.00</p>
                <p>UPS Ground Shipping: 4-6 days. $29.00</p>
                <p>Unishop Global Export: 3-4 days, $39.00</p>
                
            </section>
        </div>
            
      </div>
    <div>
        <Footer></Footer>
    </div>
  </template>
  
  <script>
    import Topbar from '../components/Topbar.vue';
    import Footer from '../components/Footer.vue';
    import '@fortawesome/fontawesome-free/css/all.css';
  export default {
    name: "app",
      components: {
        Topbar,
        Footer,
      },
  data() {
    return {
      product: {
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
  methods: {
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
  },
};
  </script>
  
  <style scoped>
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
  