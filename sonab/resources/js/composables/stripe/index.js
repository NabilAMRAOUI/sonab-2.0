import axios from "axios";
import { ref } from "vue";
export default function useStripe() {

    const elements = ref(null);
    
    const initialize = async () => {
        const stripe = Stripe('pk_live_51MhcPxEgqaa7KeGCIy9YjvXmTAAbsrynupazjnp7jNpOdMY12ODcRgRL443Sh7ZDoxMrMGjJncSCIkrvdpzqKeU900AKtQNq3e');

        const clientSecret = await axios.post('/paymentIntent')
        .then(r => r.data.clientSecret)
        .catch(err => console.log(err))
   
        elements.value = stripe.elements({ clientSecret });
        
        const paymentElement = elements.value.create("payment");
        paymentElement.mount("#payment-element");
    }

    return {
        initialize
    }
}