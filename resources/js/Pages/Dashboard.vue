<script setup>
import MyLayout from '@/Layouts/MyLayout.vue';
import { Head } from '@inertiajs/vue3';
import PlantList from '@/Components/PlantList.vue';
import { ref, onMounted } from 'vue';

const props = defineProps({
  plants: Array
});

const image = ref(null);
const imageContainer = ref(null);
const content = ref(null);
onMounted(() => {
  // Delay revealing the content and sliding it to the center
  setTimeout(() => {
    // Fade in the image
    image.value.style.opacity = 1;
    
    // Slide in the content to the center
    content.value.classList.remove('hidden');
    content.value.classList.add('slide-in');
  }, 500); // Adjust the delay as needed
});
// Sample data for plants
const plants = [
  {
    id: 1,
    name: 'Montera',
    price: '$10',
    imageUrl: 'https://i.pinimg.com/236x/4d/04/ad/4d04adedfc1d58150b1e20090bc3c10f.jpg'
  },
  {
    id: 2,
    name: 'Aloe Vera',
    price: '$15',
    imageUrl: 'https://i.pinimg.com/236x/bb/d3/18/bbd318adddfd0388baf298222dd6e643.jpg'
  },
  {
    id: 3,
    name: 'Calathea',
    price: '$50',
    imageUrl: 'https://i.pinimg.com/236x/cf/e7/66/cfe7663285a258b59a2aed1d19494fa6.jpg'
  },
  {
    id: 4,
    name: 'Ficus Lyrata',
    price: '$5',
    imageUrl: 'https://i.pinimg.com/236x/e6/3c/e0/e63ce0932e1a09569aa6baa6ba0e5c24.jpg'
  }
];
</script>

<template>
    <Head title="Dashboard" />
  
    <MyLayout>
      <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
      </template>
  
      <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm rounded-lg p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
              <div ref="content" class="hidden md:block">
                <h1 class="text-4xl font-bold text-gray-800 mb-4">Discover Our Plants</h1>
                <p class="text-lg text-gray-600 mb-6">Lorem ipsum dolor sit amet consectetur adipisicing elit. In, et!</p>
                <a href="#" class="inline-block px-6 py-3 bg-primary-600 text-white font-semibold rounded-md shadow-md hover:bg-primary-700 transition-colors duration-300">Explore Now</a>
              </div>
              <div class="relative" ref="imageContainer">
                <img
                  ref="image"
                  src="https://images.unsplash.com/photo-1543459176-4426b37223ba?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTJ8fHBsYW50c3xlbnwwfHwwfHx8MA%3D%3D"
                  alt="Monstera"
                  class="w-full h-auto rounded-md shadow-lg transition-opacity duration-1000 opacity-0"
                />
                <div class="absolute inset-0 bg-black opacity-0 transition-opacity duration-1000"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </MyLayout>
  </template>
   
   
   <style scoped>
   .bg-primary-600 {
     background-color: #3182ce;
   }
   
   .bg-primary-700 {
     background-color: #2c5282;
   }
   
   .text-primary-600 {
     color: #3182ce;
   }
   
   .container {
     padding-top: 100px;
     padding-bottom: 100px;
   }
   
   .text-4xl {
     font-size: 2.25rem;
     line-height: 2.5rem;
   }
   
   .text-lg {
     font-size: 1.125rem;
     line-height: 1.75rem;
   }
   
   .font-bold {
     font-weight: 700;
   }
   
   .rounded-md {
     border-radius: 0.375rem;
   }
   
   .shadow-md {
     box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
   }
   
   .hover\:bg-primary-700:hover {
     background-color: #2c5282;
   }
   
   .transition {
     transition: all 0.2s;
   }
   .slide-in {
  animation: slideIn 1s ease-in-out forwards;
}

@keyframes slideIn {
  from {
    opacity: 0;
    transform: translateY(-50px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}
   </style>
   