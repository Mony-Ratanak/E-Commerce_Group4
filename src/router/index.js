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
      path: '/:itemTitle/:categoryId',
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
      path: '/categorytable',
      name: 'categorytable',
      component: () => import('../views/Categorytable.vue'),
      props: true  
    },
    {
      path: '/addproduct',
      name: 'addproduct',
      component: () => import('../views/Addproduct.vue'),
      props: true  
    },
    {
      path: '/addcategory',
      name: 'addcategory',
      component: () => import('../views/Addcategory.vue'),
      props: true  
    },
    {
      path: '/productedit/:productId',
      name: 'editproduct',
      component: () => import('../views/Editproduct.vue'),
      props: true  
    },
    {
      path: '/categoryedit/:categoryId',
      name: 'editcategory',
      component: () => import('../views/Editcategory.vue'),
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
      name: 'register',
      component: () => import('../views/register.vue'),
      props: true  // Enables passing route params as props to your component
    },
    {
      path: '/login',
      name: 'login',
      component: () => import('../views/login.vue'),
      props: true  // Enables passing route params as props to your component
    },
    {
      path: '/profile',
      name: 'profile',
      component: () => import('../views/Profile.vue'),
      props: true  // Enables passing route params as props to your component
    },
    {
      path: '/productdetail/:productId',
      name: 'productdetail',
      component: () => import('../views/Productdetail.vue'),
      props: true  // Enables passing route params as props to your component
    },
    {
      path: '/categories',
      name: 'categories',
      component: () => import('../views/Categories.vue'),
      props: true  // Enables passing route params as props to your component
    },
  ]
})

export default router
