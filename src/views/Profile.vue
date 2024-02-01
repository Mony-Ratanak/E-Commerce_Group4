<template>
  <topbar></topbar>
  <div>
    <div v-if="loading">Loading...</div>
    <div class="profile flex flex-col w-screen p-10" v-else>
      <img class="mb-4 w-48 h-48" @click="nextRoute('/home/welcome')" src="../assets/profile.png">
      <h2 class="text-xl font-bold">User Profile</h2>
      <p class="text-xl font-bold" v-if="user">User ID: {{ user.id }}</p>
      <p class="text-xl font-bold" v-if="user">Name: {{ user.name }}</p>
      <p class="text-xl font-bold" v-if="user">Email: {{ user.email }}</p>
      <p class="text-xl font-bold" v-if="!user">User not found</p>
      <div class="flex gap-2">
        <button @click="logout" class="mt-4 bg-white px-4 p-2 rounded border-2 border-blue-300">Logout</button>
        <button @click="deleteUser" class="mt-4 bg-red-500 text-white px-4 p-2 rounded">Delete Account</button>
      </div>
    </div>
  </div>
</template>

<script>
import Topbar from '../components/Topbar.vue';

export default {
  data() {
    return {
      user: null,
      loading: true,
    };
  },
  components: {
    Topbar,
  },
  mounted() {
    const token = localStorage.getItem('token');

    if (token) {
      fetch('http://127.0.0.1:8000/api/profile', {
        method: 'GET',
        headers: {
          'Authorization': `Bearer ${token}`,
          'Content-Type': 'application/json',
        },
      })
        .then(response => {
          if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
          }
          return response.json();
        })
        .then(data => {
          this.user = data;
        })
        .catch(error => {
          console.error('Error fetching profile:', error);
        })
        .finally(() => {
          this.loading = false;
        });
    } else {
      console.error('No token found in local storage');
      this.loading = false;
    }
  },
  methods: {
    nextRoute(route) {
      this.$router.push(route);
    },
    logout() {
      localStorage.removeItem('token');
      document.cookie = "remember_token=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
      this.$router.push('/login');
    },
    deleteUser() {
      const token = localStorage.getItem('token');

      if (token) {
        if (confirm('Are you sure you want to delete your account?')) {
          fetch('http://127.0.0.1:8000/api/deleteuser', {
            method: 'DELETE',
            headers: {
              'Authorization': `Bearer ${token}`,
              'Content-Type': 'application/json',
            },
          })
            .then(response => {
              if (response.ok) {
                console.log('User deleted successfully');
                this.logout(); // Redirect to logout or another route
              } else {
                console.error('Error deleting user:', response.status);
              }
            })
            .catch(error => {
              console.error('Error deleting user:', error);
            });
        }
      } else {
        console.error('No token found in local storage');
        this.loading = false;
      }
    },
  },
};
</script>

<style scoped>
/* Add your styles here if needed */
</style>
