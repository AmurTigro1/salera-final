<template>
    <div class="container mx-auto flex justify-center items-center h-screen">
      <div class="card border border-gray-300 rounded-lg bg-gray-100 shadow-2xl bg-gradient-to-br from-green-200 to-green-400">
        <div class="card-body p-8">
          <div v-if="showEdit">
            <form @submit.prevent="submit" class="space-y-4">
              <div class="flex flex-col">
                <label for="name" class="text-white font-bold mb-2 label-shadow">Name</label>
                <input type="text" id="name" class="form-input" v-model="form.name">
              </div>
              <div class="flex flex-col">
                <label for="price" class="text-white font-bold mb-2 label-shadow">Price</label>
                <input type="text" id="price" class="form-input" v-model="form.price">
              </div>
              <div class="flex flex-col">
                <label for="imageUrl" class="text-white font-bold mb-2 label-shadow">Image URL</label>
                <input type="text" id="imageUrl" class="form-input" v-model="form.imageUrl">
              </div>
              <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded">Save</button>
            </form>
          </div>
          <div v-else>
            <div class="flex flex-col items-center">
              <img :src="plants.imageUrl" alt="Plant Image" class="w-64 h-auto mb-4">
              <p class="text-white font-bold mb-2 label-shadow ">{{ plants.name }}</p>
              <p class="text-white font-bold mb-2 label-shadow">$ {{ plants.price }}</p>
            </div>
          </div>
          <div class="flex justify-center mt-8">
            <button onclick="window.history.back()" class="btn bg-green-700 mr-4">Back</button>
            <button class="btn bg-blue-700 mr-4" @click="toggleEdit">{{ showEdit ? 'Cancel' : 'Edit' }}</button>
            <button class="btn bg-red-700" @click="delplant">Delete</button>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  import { ref } from 'vue';
  import { useForm } from '@inertiajs/vue3';
  import MyLayout from '@/Layouts/MyLayout.vue';
  
  export default {
    layout: MyLayout,
    props: {
      plants: Object
    },
    setup(props) {
      const showEdit = ref(false);
  
      const form = useForm({
        name: props.plants.name,
        price: props.plants.price,
        imageUrl: props.plants.imageUrl,
      });
  
      const submit = async () => {
        await form.put(`/plants/${props.plants.id}`);
      };
  
      const toggleEdit = () => {
        showEdit.value = !showEdit.value;
      };
  
      const delplant = () => {
        const del = confirm('Are you sure you want to delete this plant?');
        if (del) {
          form.submit('delete', `/plants/${props.plants.id}`);
        }
      };
  
      return { showEdit, form, submit, toggleEdit, delplant };
    }
  }
  </script>
  
  <style scoped>
  .container {
    background-color: #38a169;
    max-width: 100%;

  }
  
/* @keyframes zoomIn {
  from {
    transform: scale(0.9);
    opacity: 0;
  }
  to {
    transform: scale(20);
    opacity: 100;
  }
} */
  .btn {
    padding: 8px 16px;
    border-radius: 4px;
    color: white;
    text-decoration: none;
  }
  
  .card {
    border-radius: 20px;
    width: 500px;
    background-color: #38a169;

  }
  
  .form-input {
    border: 1px solid #cbd5e0;
    border-radius: 4px;
    padding: 8px;
    width: 100%;
  }
  
  .btn:hover {
    filter: brightness(0.9);
  }
  </style>
  