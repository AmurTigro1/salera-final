<script setup>
import { defineProps } from 'vue';
import { Link, useForm } from '@inertiajs/vue3';
import MyLayout from '@/Layouts/MyLayout.vue';
import { Inertia } from '@inertiajs/inertia';

const props = defineProps({
  plant: Object,
  success: String
});
defineOptions({
        layout: MyLayout
    });


const deleteplant = (id) => {
  if (confirm('Are you sure you want to delete this plant?')) {
    Inertia.delete(`/plants/${id}`, {
      preserveScroll: true,
    });
  }
  return false;
}

</script>

<template>
    <div class="containerr mx-auto py-8">
    <div class="mb-8">
      <div class="flex items-center justify-between mb-4">
        <h2 class="text-3xl font-semibold text-green-800 animation-fade-in">List Of Plants</h2>
        <Link href="/plants/create" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Add a Plant</Link>
      </div>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        <div v-for="plant in plant" :key="plant.id" class="bg-white rounded-lg shadow-md overflow-hidden transition-all plant">
          <div class="p-4 shadow-lg">
            <h4 class="text-lg font-semibold mb-2 text-green-600">{{ plant.name }}</h4>
            <p class="text-sm text-gray-600"><strong>Price:</strong> {{ plant.price }}</p>
            <p class="text-sm text-gray-600"><strong>Image:</strong> ${{ plant.imageUrl }}</p>
          </div>
          <div class="flex items-center justify-end px-4 py-2 bg-gray-100 border-t border-gray-200">
            <Link :href="'/plants/' + plant.id" class="ml-auto text-purple-600 hover:text-purple-800">View Details</Link>
            <Link :href="'plants/toggle-featured/' + plant.id" method="post" preserve-scroll></Link>
          </div>
        </div>
      </div>
    </div>
  </div>
  </template>
  
<style>
.transition-all {
  transition-property: all;
  transition-duration: 0.5s;
  transition-timing-function: ease;
}
.hover\:bg-green-600:hover {
  background-color: #047857;
}
.hover\:text-purple-800:hover {
  color: #6b46c1;
}
.flex {
  display: flex;
}

.justify-end {
  justify-content: flex-end;
}

.items-center {
  align-items: center;
}
.containerr {
  max-width: 1200px;
  scroll-behavior: smooth;
}

/* Customizing colors */
.bg-green-500 {
  background-color: #68d391;
}

.bg-gray-100 {
  background-color: #f7fafc;
}

.text-green-600 {
  color: #68d391;
}

.text-blue-600 {
  color: #4299e1;
}

.text-purple-600 {
  color: #9f7aea;
}

.text-red-600 {
  color: #e53e3e;
}

.text-gray-600 {
  color: #4a5568;
}

.text-green-800 {
  color: #2f855a;
}

/* Button hover states */
.hover\:bg-green-600:hover {
  background-color: #48bb78;
}

.hover\:text-blue-800:hover {
  color: #2c5282;
}

.hover\:text-purple-800:hover {
  color: #805ad5;
}

.hover\:text-red-800:hover {
  color: #b91c1c;
}
.fade-enter-active, .fade-leave-active {
  transition: opacity 0.5s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active in <2.1.8 */ {
  opacity: 0;
}

</style>
