<template>

    <form @submit.prevent="form.post($route('product.store'))"
          class="md:grid grid-cols-2 gap-5 p-5 rounded bg-white shadow">
        <h3 class="text-2xl col-span-2">Create New Product</h3>
        <div class="">
            <form-input label="Product Name" :error="form.errors.name" v-model="form.name" />
            <form-input label="Cost Price" :error="form.errors.cost_price" v-model="form.cost_price" />
            <form-input label="Selling Price" :error="form.errors.selling_price" v-model="form.selling_price" />
            <form-input label="Discount" :error="form.errors.discount" v-model="form.discount" />
            <form-input label="Quantity" :error="form.errors.quantity" v-model="form.quantity" />
            <form-textarea label="Description" :error="form.errors.description" v-model="form.description" />
        </div>
        <div >
            <form-input type="file" label="Product Image"
                        :error="form.errors.image" @input="form.image = $event.target.files[0]" />
            <img v-if="form.image" class="max-w-96" :src="imagePreview" :alt="form.name">
        </div>
        <button class="mt-5 px-5 py-2 rounded bg-yellow-700 text-white">Create Product</button>
    </form>

</template>

<script>
import AdminLayout from "../../../components/Layouts/AdminLayout/Index";
import {useForm} from "@inertiajs/inertia-vue3";
import FormInput from "../../../components/form/FormInput";
import {v4 as uuid} from 'uuid';
import FormTextarea from "../../../components/form/FormTextarea";

export default {
    layout: AdminLayout,
    setup() {
        const form = useForm({
            name: null,
            uuid: uuid(),
            cost_price: null,
            selling_price: null,
            discount: null,
            quantity: null,
            description: null,
            image: null,
        })

        return { form }
    },
    computed: {
        imagePreview(){
            console.log(this.form)
            return this.form.image && URL.createObjectURL(this.form.image)
        }
    },
    components: {FormTextarea, FormInput, AdminLayout},
}
</script>
