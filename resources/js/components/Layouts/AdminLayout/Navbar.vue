<template>
    <div class="flex items-center justify-between gap-3 sticky top-0 border-b h-[60px] bg-white px-5">
        <Link href="/">Mimash</Link>
        <button @click="$emit('openSidenav')">Menu</button>
    </div>
</template>

<script>
import {Link} from "@inertiajs/inertia-vue3";

export default {
    components: {Link},
    emits: ['openSidenav'],
}
</script>
