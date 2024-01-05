import bigpic1 from '../assets/bigpic1.png'
import bigpic2 from '../assets/bigpic2.png'
import bigpic3 from '../assets/bigpic3.png'
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
        icon: 'chevron-down',
      },
      {
        title: 'Labtop',
        icon: 'chevron-down',
      },
      {
        title: 'Phone',
        icon: 'chevron-down',
      },
      {
        title: 'Smart Watch',
        icon: 'chevron-down',
      },
      {
        title: 'Laptop accessories',
        icon: 'chevron-down',
      },
      {
        title: 'Phone accessories',
        icon: 'chevron-down',
      },
    ],
    prom: [
      {
        name: "1",
        image: bigpic1,
        title: "Everyday Fresh & Clean with our Product",
        bg: "bg-green-300",
        color:"bg-[#F0E8D5]",
  
      },
      {
        name: "2",
        image: bigpic2,
        title: "Make your Breakfast Easy and Healthy",
        bg: "bg-green-300",
        color: "bg-[#F3E8E8]",
  
      },
      {
        name: "3",
        image: bigpic3,
        title: "The best Organic Product Online",
        bg: "bg-yellow-300",
        color: "bg-[#E7EAF3]",
  
      },
    ],
  }),
});
