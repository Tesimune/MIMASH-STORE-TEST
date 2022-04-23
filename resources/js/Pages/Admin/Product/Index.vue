<template>

    <admin-layout>
        <div class="flex flex-col gap-10">
            <div class="flex items-center justify-between">
                <h3>All Products</h3>
                <a :href="$route('product.create')" class="edit-btn">New</a>
            </div>

            <div v-if="selectedItems.length > 0" class="flex gap-3">
                <button v-if="selectedItems.length <= 1" class="edit-btn">Edit Item</button>
                <button class="delete-btn">Delete Selected</button>
            </div>

            <table class="w-full max-w-screen rounded-lg overflow-hidden bg-white shadow">
                <thead class="bg-slate-200">
                <tr>
                    <td></td>
                    <td>Image</td>
                    <td>Name</td>
                    <td class="hidden md:table-cell">Cost Price</td>
                    <td class="hidden md:table-cell">Selling Price</td>
                    <td class="hidden md:table-cell">Discount</td>
                    <td>Quantity</td>
                </tr>
                </thead>

                <tbody>
                <tr v-for="product in products">
                    <td>
                        <input type="checkbox" :value="product.uuid" v-model="selectedItems">
                    </td>
                    <td>
                        <img :src="`http://127.0.0.1:8000/${product.image}`"
                             class="w-12 h-12" :alt="product.name" />
                    </td>
                    <td class="text-sm md:text-base">{{ product.name }}</td>
                    <td class="hidden md:table-cell">{{ product.cost_price }}</td>
                    <td class="hidden md:table-cell">{{ product.selling_price }}</td>
                    <td class="hidden md:table-cell">{{ product.discount }}</td>
                    <td>{{ product.quantity }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </admin-layout>

</template>

<script>
import AdminLayout from "../../../components/Layouts/AdminLayout/Index";

    export default {
        props: ['products'],
        components: {AdminLayout},
        data(){
            return { selectedItems: [] }
        }
    }
</script>
<style lang="scss" scoped>
    td{@apply px-3 py-2;}
    .edit-btn, .delete-btn{@apply rounded shadow px-5 py-2 bg-gold text-white}
    .delete-btn{@apply bg-red-500}
    tbody{
        td{@apply md:px-5 py-1 md:py-2}
        tr{@apply border-y even:bg-gray-50}
    }
</style>
