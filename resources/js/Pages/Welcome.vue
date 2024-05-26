<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});

const plants = [
    { id: 1, name: 'Fiddle Leaf Fig', price: 39.99, imageUrl: 'https://i.pinimg.com/236x/cf/e7/66/cfe7663285a258b59a2aed1d19494fa6.jpg' },
    { id: 2, name: 'Snake Plant', price: 24.99, imageUrl: 'https://i.pinimg.com/236x/71/57/21/715721cef5bcf33a255a0b5480e27d1e.jpg' },
    { id: 3, name: 'Monstera Deliciosa', price: 29.99, imageUrl: 'https://i.pinimg.com/236x/32/d3/15/32d3152fe8001067a558285c6ba722b6.jpg' },
    { id: 4, name: 'Peace Lily', price: 19.99, imageUrl: 'https://i.pinimg.com/236x/9c/5f/7a/9c5f7aa51ce1d21b4ad74f7d69a05dc8.jpg' },
    { id: 5, name: 'Succulent', price: 9.99, imageUrl: 'https://i.pinimg.com/236x/d9/92/34/d99234d89ab7cc572f4f954f7ea642c1.jpg' },
    { id: 6, name: 'Aloe Vera', price: 14.99, imageUrl: 'https://i.pinimg.com/236x/7c/d0/9d/7cd09d192dc9a6140816ef2f8b756845.jpg' },
];

function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}
</script>

<template>
    <Head title="Welcome" />
    <div class="bg-white dark:bg-black text-gray-800 dark:text-gray-200 min-h-screen flex flex-col">
        <header class="bg-gradient-to-r from-green-400 to-green-600 text-white py-6">
            <div class="container mx-auto flex justify-between items-center px-6">
                <h1 class="text-3xl font-bold">Plant Paradise</h1>
                <nav>
                    <Link v-if="$page.props.auth.user" :href="route('dashboard')" class="btn-nav">Dashboard</Link>
                    <template v-else>
                        <Link :href="route('login')" class="btn-nav">Log in</Link>
                        <Link v-if="canRegister" :href="route('register')" class="btn-nav ml-4">Register</Link>
                    </template>
                </nav>
            </div>
        </header>
        
        <main class="flex-grow container mx-auto px-6 py-12">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold mb-4">Welcome to Plant Paradise</h2>
                <p class="text-lg mb-8">Discover a variety of beautiful plants to adorn your home and garden.</p>
                <Link href="/login" class="btn-primary">Explore Plants</Link>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="plant-card" v-for="plant in plants" :key="plant.id">
                    <img :src="plant.imageUrl" alt="Plant Image" class="rounded-lg shadow-md mb-4" @error="handleImageError">
                    <h3 class="text-xl font-semibold mb-2 text-green-800 dark:text-green-500">{{ plant.name }}</h3>
                    <p class="text-green-800 dark:text-green-500 mb-4">Price: ${{ plant.price.toFixed(2) }}</p>
                    <Link href="#" class="btn-secondary">View Details</Link>
                </div>
            </div>
        </main>
        
        <footer class="bg-gray-800 text-gray-400 py-6">
            <div class="container mx-auto text-center">
                <p>&copy; 2024 Plant Paradise. All rights reserved.</p>
            </div>
        </footer>
    </div>
</template>

<style scoped>
/* General Styles */
body {
    font-family: 'Inter', sans-serif;
}

.btn-nav {
    background: rgba(255, 255, 255, 0.2);
    padding: 10px 20px;
    border-radius: 5px;
    text-decoration: none;
    color: white;
    transition: background 0.3s;
}

.btn-nav:hover {
    background: rgba(255, 255, 255, 0.4);
}

.btn-primary {
    background: #38b2ac;
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
    text-decoration: none;
    transition: background 0.3s;
}

.btn-primary:hover {
    background: #319795;
}

.btn-secondary {
    background: #48bb78;
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
    text-decoration: none;
    transition: background 0.3s;
}

.btn-secondary:hover {
    background: #38a169;
}

.plant-card {
    background: white;
    border-radius: 10px;
    box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
    padding: 20px;
    transition: transform 0.3s, box-shadow 0.3s;
}

.plant-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 25px rgba(0, 0, 0, 0.2);
}

.text-shadow {
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
}
</style>
