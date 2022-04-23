<template>
    <transition>
        <div v-if="open" :class="`overflow-hidden z-50 ${className}`"  @click.self="$emit('openSidenav')">
            <div class="border-r w-[250px] bg-white h-[100vh] fixed top-0">
                <div class="h-[100px] border-b p-10">
                    <a href="/" class="text-2xl font-black text-gold">Mimash</a>
                </div>
                <div class="flex flex-col p-3 transition-all duration-500">
                    <Link :href="$route('admin.dashboard')" class="link">Dashboard</Link>
                    <drop-down-link label="Products">
                        <Link class="link" :href="$route('product.index')">All Products</Link>
                        <Link class="link" :href="$route('product.create')">New Product</Link>
                    </drop-down-link>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
    import {Link} from '@inertiajs/inertia-vue3';
    import DropDownLink from "../../DropDownLink";
    export default {
        props: ['className', 'open', 'onOpenSidenav'],
        components: {DropDownLink, Link}
    }
</script>

<style scoped>
    .link{
        @apply px-5 py-1.5 hover:bg-blue-100 rounded;
    }

    .v-enter-active,
    .v-leave-active {
        transition: 0.5s ease;
    }

    .v-enter-from,
    .v-leave-to {
        opacity: 0;
    }
</style>
