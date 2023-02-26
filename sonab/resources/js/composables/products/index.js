import { ref } from "vue";

export default function useProduct() {
const products = ref([]);

    const getproducts = async() => {
        let response = await axios.get('/api/products');
        products.value = response.data.cartContent;
    }

    const add = async(productId) => {
        let response = await axios.post('/api/products', {
            productId: productId
        });

        return response.data.count;
    }

    const getCount = async() => {
        let response = await axios.get('/api/products/count');
        return response.data.count;
    }


    return {
        add,
        getCount,
        products,
        getproducts
    }
}