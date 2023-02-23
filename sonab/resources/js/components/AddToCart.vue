<template>
    <div class="flex items-center justify-between py-4">
        <button class="focus:outline-none text-white rounded-md cursor-pointer text-xs font-semibold px-3 py-2 bg-indigo-700"
        v-on:click.prevent="AddToCart">Ajouter au panier</button>
    </div>
</template>

<script setup>
    
    const productId = defineProps (['productId']); 
    const AddToCart = async() => {
        await axios.get('/sanctum/csrf-cookie');
        await axios.get('/api/user')
            .then(async(res) => {
                let response = await axios.post('/api/products', {
                    productId: productId
                })
                console.log(response);
            })
            .catch(err => console.log(err));
        
    }
</script> 
