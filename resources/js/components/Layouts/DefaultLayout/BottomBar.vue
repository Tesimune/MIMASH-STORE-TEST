<template>
    <div class="fixed bottom-0 left-0 w-screen h-[60px] bg-gray-50 border-t flex gap-5 items-center justify-center">
        <Cart />
        <Search />
    </div>
</template>

<script>
import Cart from "./Cart";
import Search from "./Search";

    export default {
        components: {Cart, Search}
    }
</script>
