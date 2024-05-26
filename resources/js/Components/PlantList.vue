<template>
 <div class="grid-container">
    <div v-if="plants && plants.length">
      <div v-for="plant in plants" :key="plant.id" class="grid-item">
        <div class="card position-relative">
          <div class="row g-0">
            <div class="col-md-4">
              <div class="card-body">
                <div class="m-2">
                  <img :src="plant.imageUrl" alt="Plant Image" class="w-full rounded" style="height: 160px;">
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title fw-bold mt-[2%]">{{ plant.name }}</h5>
                <p class="card-text">Price: {{ plant.price }}</p>
              </div>
              </div>
            </div>
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
.grid-container {
  display: grid;
  grid-template-columns: repeat(3, 2fr);
  gap: 2rem;
}

.grid-item {
  display: flex;
  flex-direction: column;
}

.card-body {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
}

  </style>
  