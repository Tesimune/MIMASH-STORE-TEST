<template>
    <div class="product">

        <div class="thumbnail-wrapper">
            <a href="">
                <img :src="product.image" :alt="product.name"/>
            </a>
        </div>

        <div class="content">

            <span class="discount">{{ discount }}%</span>
            <h3 class="product-name">{{ product.name }}</h3>

            <p class="product-price">
                <span class="new-price">₦{{ newPrice.toLocaleString() }}</span>
                <span class="old-price">₦{{ product.selling_price.toLocaleString() }}</span>
            </p>

            <div v-if="false" class="admin-actions">
                <button class="btn">Edit</button>
                <button class="btn delete-btn">Delete</button>
            </div>

            <div class="">
                <button v-if="cartStore.inCart(product.id)"
                        @click="cartStore.remove(product.id)" class="cart-remove">
                    Remove
                </button>
                <button v-else @click="cartStore.add(product)" class="cart-add">
                    Add to Cart
                </button>
            </div>
        </div>

    </div>
</template>

<script>
import useCartStore from "../../../stores/cart";
    export default {
        setup(){
          const cartStore = useCartStore();
          return { cartStore }
        },
        props: ['product'],
        computed: {
            newPrice(){
                return this.product.selling_price - this.product.discount
            },
            discount(){
               return Math.floor((this.product.discount * 100) / this.product.selling_price)
            }
        }
    }
</script>
