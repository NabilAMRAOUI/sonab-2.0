/** import des composants  */
import './bootstrap';
import Alpine from 'alpinejs';
import { createApp } from 'vue/dist/vue.esm-bundler';
import AddToCart from './components/AddToCart.vue';
import NavbarCart from './components/NavbarCart.vue';
import ShoppingCart from './components/ShoppingCart.vue';
import StripeCheckout from './components/StripeCheckout.vue';
import Toaster from '@meforma/vue-toaster';

/** alpine utilisé pour laravel breeze authentification */
window.Alpine = Alpine;

Alpine.start();

/** Génerer une instance de vue */
const app = createApp();

/** pour utiliser le systeme de notification toast */
app.use(Toaster).provide('toast', app.config.globalProperties.$toast);

/** appel de mes composants */
app
    .component('AddToCart', AddToCart)
    .component('NavbarCart', NavbarCart)
    .component('ShoppingCart', ShoppingCart)
    .component('StripeCheckout', StripeCheckout);

/** Montage de l'app */
app.mount('#app');
