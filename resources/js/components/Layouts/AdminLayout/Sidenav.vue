<template>
    <div :class="className" >
        <div class="w-full border-r max-w-[250px] bg-white h-[100vh]">
            <div class="h-[100px] border-b"></div>
            <div class="flex flex-col p-3 transition-all duration-500">
                <Link href="/dashboard" class="link">Dashboard</Link>
                <drop-down-link label="Products">
                    <Link class="link">All Products</Link>
                    <Link class="link">New Product</Link>
                </drop-down-link>
                <Link href="/dashboard" class="link">Dashboard</Link>
                <Link href="/dashboard" class="link">Dashboard</Link>
                <Link href="/dashboard" class="link">Dashboard</Link>
                <Link href="/dashboard" class="link">Dashboard</Link>
            </div>
        </div>
    </div>
</template>

<script>
    import {Link} from '@inertiajs/inertia-vue3';
    import DropDownLink from "../../DropDownLink";
    export default {
        props: ['className'],
        components: {DropDownLink, Link}
    }
</script>

<style scoped>
    .link{
        @apply px-5 py-1.5 hover:bg-blue-100 rounded;
    }
</style>
