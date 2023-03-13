import axios from "axios";
import { ref } from "vue";

export default function useStripe() {

    const elements = ref(null);
    const stripe = ref(null);
    
    const initialize = async () => {
        stripe.value = Stripe('pk_live_51MhcPxEgqaa7KeGCIy9YjvXmTAAbsrynupazjnp7jNpOdMY12ODcRgRL443Sh7ZDoxMrMGjJncSCIkrvdpzqKeU900AKtQNq3e');

        const clientSecret = await axios.post('/paymentIntent')
        .then(r => r.data.clientSecret)
        .catch(err => console.log(err))
   
        elements.value = stripe.value.elements({ clientSecret });
        
        const paymentElement = elements.value.create("payment");
        paymentElement.mount("#payment-element");
    }
    
    const handleSubmit = async() => {
        e.preventDefault();
        setLoading(true);
      
        const { error } = await stripe.value.confirmPayment({
          element: elements.value,
            confirmParams: {
                // Make sure to change this to your payment completion page
                return_url: "http://localhost/checkout.html",
                receipt_email: emailAddress,
            },
        });
    }
    
    const checkStatus = async() => {
        const clientSecret = new URLSearchParams(window.location.search).get(
        "payment_intent_client_secret"
        );
    
        if (!clientSecret) {
        return;
        }
        
        const { paymentIntent } = await stripe.value.retrievePaymentIntent(clientSecret);
    
        switch (paymentIntent.status) {
            case "succeeded":
            showMessage("Payment succeeded!");
            break;
            case "processing":
            showMessage("Your payment is processing.");
            break;
            case "requires_payment_method":
            showMessage("Your payment was not successful, please try again.");
            break;
            default:
            showMessage("Something went wrong.");
            break;
        }
    };
    // ------- UI helpers -------

    const showMessage = (messageText) => {
        const messageContainer = document.querySelector("#payment-message");
    
        messageContainer.classList.remove("hidden");
        messageContainer.textContent = messageText;
    
        setTimeout(function () {
        messageContainer.classList.add("hidden");
        messageText.textContent = "";
        }, 4000);
    }
  
  // Show a spinner on payment submission
    const setLoading = (isLoading) => {
        if (isLoading) {
        // Disable the button and show a spinner
        document.querySelector("#submit").disabled = true;
        document.querySelector("#spinner").classList.remove("hidden");
        document.querySelector("#button-text").classList.add("hidden");
        } else {
        document.querySelector("#submit").disabled = false;
        document.querySelector("#spinner").classList.add("hidden");
        document.querySelector("#button-text").classList.remove("hidden");
        }
    }

    return {
        initialize,
        checkStatus
    }
}