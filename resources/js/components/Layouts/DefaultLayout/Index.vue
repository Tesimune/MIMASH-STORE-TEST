<template>
    <div class="bg-white min-h-screen">
        <navbar />
        <slot></slot>
        <bottom-bar />
    </div>
</template>


<script>
import Navbar from "./Navbar";
import BottomBar from "./BottomBar";


export default {
    components: { Navbar, BottomBar }
}
</script>
