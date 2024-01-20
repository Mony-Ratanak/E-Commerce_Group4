<template>
  <div class="card">
    <div class="card-header">Register Form</div>
    <div class="card-body">
      <form @submit.prevent="handleRegister">

        <label>First username</label>
        <input type="text" v-model="form.username" username="username" id="username" class="form-control"/>

        <label>Email</label>
        <input type="email" v-model="form.email" username="email" id="email" class="form-control"/>

        <label>Password</label>
        <input type="password" v-model="form.password" username="password" id="password" class="form-control"/>

        <label>Confirm Password</label>
        <input type="password" v-model="form.confirm_password" username="confirm_password" id="confirm_password" class="form-control"/>

        <input type="submit" value="Save" class="btn btn-success"/>

      </form>
    </div>
  </div>
</template>

<script setup>
import { ref } from "vue";
import axios from "axios";
import { useRouter } from "vue-router";

const router = useRouter();

const form = ref({
  username: "",
  password: "",
  email: "",
  confirm_password: "",
});

    const handleRegister = async () => {
      try {
        // Explicitly include confirm_password field in the request payload
        const response = await axios.post("http://localhost/api/register", {
          username: form.value.username,
          password: form.value.password,
          email: form.value.email,
          confirm_password: form.value.confirm_password,
        }, {
          headers: {
            'Content-Type': 'application/json',
          },
        });

        // Assuming the server returns a success message or data
        console.log("Registration successful:", response.data);

        // Redirect to a success page or perform other actions
        router.push("/login");
      } catch (error) {
        console.error("Registration error:", error);
        console.dir(error.response); // Log the detailed response

        // Handle error (e.g., display an error message to the user)
        // For example, you can check for specific validation errors
        if (error.response && error.response.data && error.response.data.message) {
          alert(error.response.data.message);
        } else {
          alert("An error occurred during registration.");
        }
      }
    };
</script>
