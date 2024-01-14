import { createRouter, createWebHistory } from 'vue-router'
// import homepage from '../views/homepage.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/home',
      name: 'home',
      component: ()=> import('../views/homepage.vue')
    },
    {
      path: '/Laptop',
      name: 'laptoppage',
      component: ()=> import('../views/Laptop.vue')
    },
    {
      path: '/Phone',
      name: 'phonepage',
      component: ()=> import('../views/Phone.vue')
    },
    {
      path: '/iphone',
      name: 'iphonepage',
      component: ()=> import('../views/Productbybrand.vue')
    },
    
  ]
})

export default router
