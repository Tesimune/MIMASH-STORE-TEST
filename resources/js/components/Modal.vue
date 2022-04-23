<template>
    <div class="">
        <button @click="open = true">Open Modal</button>
        <transition>
            <div v-if="open" @click.self="open = false"
                 class="z-[99] fixed top-0 left-0 w-screen h-screen bg-black/30 flex items-center justify-center">
                <div class="rounded-lg bg-white min-w-[300px]">
                    <div class="px-3 py-2 text-lg border-b flex gap-10 items-center justify-between">
                        <slot name="title">Modal</slot>
                        <button class="text-2xl" @click="open = false">&times;</button>
                    </div>
                    <div class="p-3">
                        <slot>Content</slot>
                    </div>
                </div>
            </div>
        </transition>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                open: false
            }
        }
    }
</script>

<style>
.v-enter-active,
.v-leave-active {
    transition: opacity 0.5s ease;
}

.v-enter-from,
.v-leave-to {
    opacity: 0;
}
</style>
