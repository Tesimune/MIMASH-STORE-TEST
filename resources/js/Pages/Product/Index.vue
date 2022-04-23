<template>
    <default-layout>
        <div class="grid grid-cols-2 gap-3 md:grid-cols-3 lg:grid-cols-4 md:gap-9 p-3
                md:p-5 lg:p-10 md:mx-9 mb-20">
            <Product v-for="product in products" :product="product" />
        </div>
    </default-layout>
</template>

<script>
    import Product from "../../components/product/index/Product";
    import DefaultLayout from "../../components/Layouts/DefaultLayout/Index";
    export default {
        props: ['products'],
        components: {Product, DefaultLayout},
    }
</script>
