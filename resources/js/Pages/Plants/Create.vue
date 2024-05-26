<template>
  <div class="flex justify-center items-center h-[100vh] contain ">
    <div class="flex max-w-2xl mx-auto p-8 bg-gradient-to-br from-green-400 to-green-600 rounded-lg relative card">
      <div class="w-1/2 pr-8 flex items-center">
        <img src="https://media3.giphy.com/media/LPB0Ewp33JK3GONgu6/giphy.gif" />
        <button onclick="window.history.back()" class="btn-back">Back</button>
      </div>
      <div class="w-1/2">
        <h1 class="text-3xl text-white font-bold mb-6 text-shadow">Create Plant</h1>
        <form @submit.prevent="submit">
          <div class="mb-4">
            <label for="name" class="block text-white font-bold mb-2 label-shadow">Name</label>
            <input type="text" id="name" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-green-500 input-shadow" v-model="form.name" placeholder="Enter plant name">
          </div>
          <div class="mb-4">
            <label for="price" class="block text-white font-bold mb-2 label-shadow">Price</label>
            <input type="text" id="price" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-green-500 input-shadow" v-model="form.price" placeholder="Enter price">
          </div>
          <div class="mb-4">
            <label for="imageUrl" class="block text-white font-bold mb-2 label-shadow">Image URL</label>
            <input type="text" id="imageUrl" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-green-500 input-shadow" v-model="form.imageUrl" placeholder="Enter image URL">
          </div>
          <button type="submit" class="w-full bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 focus:outline-none focus:bg-green-600 button-shadow">Save Plant</button>
        </form>
      </div>
    </div>
  </div>
</template>
  
  <script>
  import { useForm } from '@inertiajs/vue3';
  import MyLayout from '@/Layouts/MyLayout.vue';
  
  export default {
    layout: MyLayout,
    setup() {
      const form = useForm({
        name: '',
        price: '',
        imageUrl: '',
      });
  
      const submit = async () => {
        form.post('/plants');
      };
  
      return { form, submit };
    }
  };
  </script>
  
  
  
  <style scoped>
  .contain {
    background-color: #38a169;
    height: 100vh;
    overflow: hidden;
  }
  body {
  overflow: hidden;
}

  .flex {
    display: flex;
  }
  
  .justify-center {
    justify-content: center;
  }
  
  .items-center {
    align-items: center;
  }
  
  .h-screen {
    height: 100vh;
  }
  
  .bg-gradient {
    background: linear-gradient(45deg, #6000DD, #7000AA);
  }
  
  .max-w-2xl {
    max-width: 42rem; /* Adjust as needed */
  }
  
  .p-8 {
    padding: 2rem;
  }
  
 
  
  .border {
    border: 1px solid transparent;
  }
  
  .rounded-lg {
    border-radius: 0.75rem; /* Adjust as needed */
  }
  
  .shadow-3d {
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5), inset 0 1px 3px rgba(255, 255, 255, 0.2);
  }
  
  .text-shadow {
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);
  }
  
  .label-shadow {
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
  }
  
  .input-shadow {
    box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.2), 0 1px 2px rgba(0, 0, 0, 0.1);
  }
  
  .button-shadow {
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 2px 4px rgba(0, 0, 0, 0.06);
  }
  
  .hover\:scale-105:hover {
    transform: scale(1.05);
  }

  
  .text-white {
    color: white;
  }
  
  .font-bold {
    font-weight: bold;
  }
  
  .mb-2 {
    margin-bottom: 0.5rem;
  }
  
  .w-full {
    width: 100%;
  }
  
  .px-3 {
    padding-left: 0.75rem;
    padding-right: 0.75rem;
  }
  
  .py-2 {
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
  }
  
  .focus\:outline-none:focus {
    outline: none;
  }
  
  .focus\:border-green-500:focus {
    border-color: #48bb78;
  }
  
  .bg-green-500 {
    background-color: #48bb78;
  }
  
  .hover\:bg-green-600:hover {
    background-color: #38a169;
  }
  
  .hover\:text-white:hover {
    color: white;
  }
  
  .rounded-md {
    border-radius: 0.375rem; /* Adjust as needed */
  }
  
  .pr-8 {
    padding-right: 2rem;
  }
  
  .h-auto {
    height: auto;
  }
  
  .shadow-md {
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 2px 4px rgba(0, 0, 0, 0.06);
  }
  
  /* Custom Button Style */
  .btn-back {
    position: absolute;
    bottom: 2rem;
    left: 10%;
    transform: translateX(-50%);
    background-color: #48bb78; /* Green background color */
    color: white; /* White text color */
    padding: 0.5rem 2.5rem; /* Padding */
    border: none; /* No border */
    border-radius: 8.375rem; /* Rounded corners */
    cursor: pointer; /* Cursor style */
    transition: background-color 0.3s; /* Smooth background color transition */
  }
  
  .btn-back:hover {
    background-color: #38a169; /* Darker green background color on hover */
  }
  </style>
  