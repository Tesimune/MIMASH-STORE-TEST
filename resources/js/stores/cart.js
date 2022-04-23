import {defineStore} from 'pinia'
import toast from "../utils/toast";

const useCartStore = defineStore('cart', {

    state: () => {
        const items = JSON.parse(localStorage.getItem('cart')) || [];
        return{open: false, items}
    },
    getters: {
        totalAmount: (state) => state.items.reduce((total, item) => {
            return (total + (item.quantity * item.price))
        }, 0),
        count: (state) => state.items.length
    },
    actions: {
        increment(id){
            let item = this.items.find(item => item.id === id);
            item.quantity++;
            this.updateItems()
        },
        decrement(id){
            let item = this.items.find(item => item.id === id);
            item.quantity <= 1 ? item.quantity = 1 : item.quantity--;
            this.updateItems()
        },
        remove(id){
            this.items = this.items.filter(item => item.id !== id);
            this.updateItems()
            toast('Item removed from cart', 'danger');
        },
        add(data){
            let item = this.items.find(item => item.id === data.id);
            if (!item) this.items.push({...data,
                price: data.selling_price - data.discount,
                quantity: 1
            });
            this.updateItems();
            toast('Item Added to Cart Successfully');
        },
        inCart(id){
            return this.items.find(item => item.id === id);
        },
        updateItems(){
            localStorage.setItem('cart', JSON.stringify(this.items));
        }
    }
})

export default useCartStore;
