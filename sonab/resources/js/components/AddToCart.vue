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

  /** on déclare add issu de notre api composition */
  const { add } = useProduct();
  /** on passe en props l'id du produit */
  const { productId } = defineProps(['productId']);
  /** on declare toast qu'on injecte pour créer un systeme de notification */
  const toast = inject('toast');

  const addToCart = async () => {
    try {
      /** on recupere le token csrf */
      await axios.get('/sanctum/csrf-cookie');
      /** on récuper la route de l'user pour savoir si on est connecté ou non */
      const res = await axios.get('/api/user');
      /** on déclare cartCount pour le compte du panier  */
      const cartCount = await add(productId);
      /** on déclare le raffraichissement du panier cartCountUpdated pour le compte du panier  */
      emitter.emit('cartCountUpdated', cartCount);
      /** en cas de succes */
      toast.success('Produit ajouté au panier');
    } catch (error) {
      /** en cas d'erreur */
      toast.error('Merci de vous inscrire ou vous connecter pour ajouter un produit');
    }
  };
</script>