<template>
  <div class="flex items-center justify-between py-4">
    <button
      class="focus:outline-none text-white rounded-md cursor-pointer text-xs font-semibold px-3 py-2 bg-indigo-700"
      @click.prevent="addToCart"
    >
      Ajouter au panier
    </button>
  </div>
</template>
  
<script setup>
  import { inject } from 'vue';
  import useProduct from '../composables/products';
  import emitter from 'tiny-emitter/instance';
  import axios from 'axios';

  const { add } = useProduct();
  const { productId } = defineProps(['productId']);
  const toast = inject('toast');

  const addToCart = async () => {
    try {
      await axios.get('/sanctum/csrf-cookie');
      const res = await axios.get('/api/user');
      const cartCount = await add(productId);
      emitter.emit('cartCountUpdated', cartCount);
      toast.success('Produit ajouté au panier');
    } catch (error) {
      toast.error('Merci de vous inscrire ou vous connecter pour ajouter un produit');
    }
  };
</script>