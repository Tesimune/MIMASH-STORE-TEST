<template>
    <div class="flex items-center justify-between gap-5 py-3 px-5 md:px-24 bg-white h-[100px]">
        <a class="text-2xl font-bold text-gold" href="/">Mimash</a>

        <ul class="ml-auto hidden md:flex items-center gap-3 uppercase text-sm font-semibold">
            <a href="/">Home</a>
            <a href="/about">About</a>
            <a href="/contact">Contact</a>
            <a href="/contact">Help</a>
            <a href="/"></a>
        </ul>

        <div v-if="auth.user" class="relative">
            <button @click="open = !open" class="flex items-center gap-1 py-2">
                <div class="w-12 h-12 rounded-full bg-gray-100" />
            </button>
            <div :class="`dropdown z-10 ${open ? 'scale-y-100' : 'scale-y-0'}`">
                <a v-if="auth.user.role == 'admin'" class="link" href="/admin">Admin Panel</a>
                <a v-else class="link" href="/dashboard">Dashboard</a>
                <Link class="link hover:bg-red-100 text-red-500" href="/logout">Logout</Link>
            </div>
        </div>

        <div v-else class="capitalize flex items-center gap-3">
            <a href="/login">login</a>
            <a href="/register">register</a>
        </div>
    </div>
</template>

<script>
import {Link} from '@inertiajs/inertia-vue3';

export default {
    inject: ['auth'],
    components: {Link},
    data() {
        return{
            open: false,
        }
    },
    mounted() {
        console.log(this.auth)
    }
}
</script>

<style lang="scss" scoped>
    .dropdown{
        @apply absolute top-full right-0 w-40 p-3 bg-gray-50 shadow text-sm;

        .link {
            @apply hover:bg-gray-100 block px-3 py-1.5 rounded;
        }
    }
</style>
