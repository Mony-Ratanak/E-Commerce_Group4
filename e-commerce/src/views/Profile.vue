<template>
    <div>
      <h2>User Profile</h2>
      <div v-if="loading">Loading...</div>
      <div v-else>
        <p v-if="user">User ID: {{ user.id }}</p>
        <p v-if="user">Name: {{ user.name }}</p>
        <p v-if="user">Email: {{ user.email }}</p>
        <p v-if="!user">User not found</p>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        user: null,
        loading: true,
      };
    },
    mounted() {
      console.log('Component mounted');
  
      const token = localStorage.getItem('token');
      console.log('Token:', token);
  
      if (token) {
        console.log('Fetching data...');
        fetch('http://localhost/api/profile', {
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
            console.log('Data received from server:', data);
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
  };
  </script>
  
  <style scoped>
  /* Add your styles here if needed */
  </style>
  