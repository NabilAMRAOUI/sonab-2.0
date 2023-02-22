import './bootstrap';
import Alpine from 'alpinejs';
import { createApp } from 'vue/dist/vue.esm-bundler';
import AddToCart from './components/AddToCart.vue';
import NavbarCart from './components/NavbarCart.vue';

window.Alpine = Alpine;

Alpine.start();

const app = createApp();

app.component('AddToCart', AddToCart);
app.component('NavbarCart', NavbarCart);

app.mount('#app');
