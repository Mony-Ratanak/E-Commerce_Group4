import { createRouter, createWebHistory } from 'vue-router'
// import homepage from '../views/homepage.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/home/welcome',
      name: 'home',
      component: ()=> import('../views/homepage.vue')
    },
    {
      path: '/:itemTitle/:itemId',
      name: 'productbycategory',
      component: ()=> import('../views/Productbycategory.vue')
    },
    {
      path: '/:brandName/product/:brandId',
      name: 'brandPage',
      component: () => import('../views/Productbybrand.vue'),
      props: true  // Enables passing route params as props to your component
    },
    {
      path: '/producttable',
      name: 'producttable',
      component: () => import('../views/Producttable.vue'),
      props: true  
    },
    {
      path: '/addproduct',
      name: 'addproduct',
      component: () => import('../views/Addproduct.vue'),
      props: true  
    },
    {
      path: '/productedit/:productId',
      name: 'editproduct',
      component: () => import('../views/Editproduct.vue'),
      props: true  
    },
    {
      path: '/allpromotions',
      name: 'allpromotions',
      component: () => import('../views/Allpromotions.vue'),
      props: true  // Enables passing route params as props to your component
    },
    {
      path: '/register',
      name: 'allpromotion',
      component: () => import('../views/register.vue'),
      props: true  // Enables passing route params as props to your component
    },
  ]
})

export default router
