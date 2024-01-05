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
        title: "Coupon Savings",
        description: "Up to 60% off everyday essentials",
        bg: "bg-green-300",
        color:"bg-[#D6A9CC]",
        btn: "Shop Coupon",
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
  }),
});
