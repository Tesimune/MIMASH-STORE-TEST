<template>
    <default-layout>
        <div class="">
            <form class="shadow max-w-[400px] mx-auto mt-12 p-5 rounded bg-white"
                  @submit.prevent="form.post($route('login'))">

                <h3 class="text-2xl mb-5 col-span-2">Login</h3>

                <form-input type="email" label="Email Address"
                            :error="form?.errors?.email" v-model="form.email" />

                <form-input type="password"  label="Password" :error="form?.errors?.password"
                            v-model="form.password" />

                <button class="mt-3 bg-yellow-700 text-white px-5 py-2 rounded"
                        :disabled="form.processing">Login</button>

            </form>
        </div>
    </default-layout>
</template>

<script>
import DefaultLayout from "../../components/Layouts/DefaultLayout/Index";
import FormInput from '../../components/form/FormInput';
import {useForm} from "@inertiajs/inertia-vue3";

export default {
    components: {DefaultLayout, FormInput},
    setup() {
        const form = useForm({
            email: null,
            password: null
        })

        return {form}
    },
}
</script>
