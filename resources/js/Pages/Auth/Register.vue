<template>
    <default-layout>
        <div class="">
            <form class="shadow max-w-[800px] md:grid grid-cols-2
                    gap-3 mx-auto mt-12 p-5 rounded bg-white"
                  @submit.prevent="form.post($route('register'))">

                <h3 class="text-2xl mb-5 col-span-2">Register</h3>

                <form-input label="Full Name" :error="form?.errors?.name" v-model="form.name" />

                <form-input type="email" label="Email Address"
                            :error="form?.errors?.email" v-model="form.email" />

                <form-input label="Phone Number" :error="form?.errors?.tel" v-model="form.tel" />

                <form-input type="password"  label="Password" :error="form?.errors?.password"
                            v-model="form.password" />

                <form-input type="password" label="Confirm Password" :error="form?.errors?.password"
                            v-model="form.password_confirmation" />

                <form-textarea label="Contact Address"
                               :error="form?.errors?.address" v-model="form.address" />

                <button class="mt-3 bg-yellow-700 text-white px-5 py-2 rounded"
                        :disabled="form.processing">Register</button>

            </form>
        </div>
    </default-layout>
</template>

<script>
import DefaultLayout from "../../components/Layouts/DefaultLayout/Index";
import FormInput from '../../components/form/FormInput';
import {useForm} from "@inertiajs/inertia-vue3";
import FormTextarea from "../../components/form/FormTextarea";

    export default {
        components: {FormTextarea, DefaultLayout, FormInput},
        setup() {
            const form = useForm({
                name: null,
                email: null,
                tel: null,
                address: null,
                password: null,
                password_confirmation: null
            })
            return {form}
        },
    }
</script>
