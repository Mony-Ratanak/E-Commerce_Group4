import bigpic1 from '../assets/bigpic1.png'
import bigpic2 from '../assets/bigpic2.png'
import bigpic3 from '../assets/bigpic3.png'
import macbook from '../assets/Macbook.png'
import iphonelogo from '../assets/iphonelogo.png'
import realmelogo from '../assets/realmelogo.png'
import xiaomilogo from '../assets/xiaomilogo.png'
import iphone from '../assets/iphone.png'
import realme from '../assets/realme.png'
import xiaomi from '../assets/xiaomi.png'

import { defineStore } from 'pinia';


export const useEStore = defineStore('todoList', {
  state: () => ({
    Menuitems: [
      {
        title: '',
        icon: 'bell',
        type: 'header',
      },
      {
        title: 'Sign Up',
        icon: 'user',
        type: 'header',
      },
      {
        title: 'Cart',
        icon: 'cart-shopping',
        type: 'header',
      },
    ],
    ListItem: [

      {
        title: 'Home',
        id: "welcome",
        icon: 'chevron-down',
      },
      {
        title: 'Laptop',
        id: 1,  
        icon: 'chevron-down',
      },
      {
        title: 'Phone',
        id: 2,  
        icon: 'chevron-down',
      },
      {
        title: 'Smart Watch',
        id: 3,  
        icon: 'chevron-down',
      },
      {
        title: 'Laptop accessories',
        id: 4,  
        icon: 'chevron-down',
      },
      {
        title: 'Phone accessories',
        id: 5,  
        icon: 'chevron-down',
      },
      
    ],
    prom: [
      {
        name: "1",
        image: bigpic1,
        title: "BIG Savings",
        description: "Up to 60% off on sale",
        bg: "bg-green-300",
        color:"bg-[#D6A9CC]",
        btn: "See promotions",
        btncolor:"bg-[#ED7171]"
  
      },
      {
        name: "2",
        image: bigpic2,
        title: "Free Delivery",
        description: "With selected items",
        bg: "bg-green-300",
        color: "bg-[#649EB1]",
        btn: "Deliver Now",
        btncolor:"bg-[#212844]"
      },
      {
        name: "3",
        image: bigpic3,
        title: "Gift Voucher",
        description: "With personal care items",
        bg: "bg-yellow-300",
        color: "bg-[#FC7E85]",
        btn: "Gift Now",
        btncolor:"bg-[#D6A9CC]"
      },
    ],
    productbycategory: [
      {        
        id: 1,        
        tag: "10% OFF",       
        color: "bg-blue-300",
      },
    ],
    productlaptops: [
      {        
        id: 1,        
        tag: "10% OFF",       
        color: "bg-blue-300",
      },
    ],
    productsmartphones: [
      {        
        id: 1,        
        tag: "10% OFF",       
        color: "bg-blue-300",     
      },
    ],
    brands: [
      {
        name: "iphone",
        id:1,
        image: iphonelogo,
        bigimage: iphone,
        description: "Up to 80% OFF",
        color:"bg-[#313131]",
        textcolor: "text-white",
        btncolor: "bg-[#494949]",
      },
      {
        name: "realme",
        id:2,
        image: realmelogo,
        bigimage: realme,
        description: "Up to 80% OFF",
        color: "bg-[#FFF3CC]",
        textcolor: "text-black",
        btncolor: "bg-[#F6DE8D]",
      },
      {
        name: "xiaomi",
        id:3,
        image: xiaomilogo,
        bigimage: xiaomi,
        description: "Up to 80% OFF",
        color: "bg-white",
        textcolor: "text-black",
        btncolor: "bg-[#FFD1B0]",
      },
      {
        name: "iphone",
        id:1,
        image: iphonelogo,
        bigimage: iphone,
        description: "Up to 80% OFF",
        color:"bg-[#313131]",
        textcolor: "text-white",
        btncolor: "bg-[#494949]",
      },
    ],
  }),
});
