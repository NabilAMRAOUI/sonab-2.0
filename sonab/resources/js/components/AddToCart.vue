<template>
    <div class="flex items-center justify-between py-4">
        <button class="focus:outline-none text-white rounded-md cursor-pointer text-xs font-semibold px-3 py-2 bg-indigo-700"
        X-on:click.prevent="AddToCart">Ajouter au panier</button>
    </div>
</template>

<script setup>
    import { onMounted } from 'vue';
    onMounted(() => console.log('hello panier'))
</script> 
