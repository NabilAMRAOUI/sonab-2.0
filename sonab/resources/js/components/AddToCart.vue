<template>
    <div class="flex items-center justify-between py-4">
        <button class="focus:outline-none text-white rounded-md cursor-pointer text-xs font-semibold px-3 py-2 bg-indigo-700"
        v-on:click.prevent="AddToCart">Ajouter au panier</button>
    </div>
</template>

<script setup>
    import { inject } from 'vue';
    import useProduct from '../composables/products';
    import emitter from 'tiny-emitter/instance';

    const { add } = useProduct();
    const productId = defineProps(['productId']); 
    const toast = inject('toast');

    const AddToCart = async() => {
        await axios.get('/sanctum/csrf-cookie');
        await axios.get('/api/user')
        
        .then(async(res) => {
           let cartCount = await add(productId);
           emitter.emit('cartCountUpdated', cartCount);
           toast.success('produit ajouté au panier');

        })
        .catch(() => {
            toast.error('merci de vous connecter pour ajouter un produit');
        });
    }   
    
    
</script> 
