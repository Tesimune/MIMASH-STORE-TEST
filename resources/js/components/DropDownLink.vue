<template>
    <ul>
        <li @click="open = !open" class="px-5 py-1.5 hover:bg-blue-100 cursor-pointer rounded">
            {{ label ?? 'Dropdown' }}
        </li>

        <ul id="dropdown" :class="`pl-5 ${open ? 'scale-y-100' : 'scale-y-0 h-0'} dropdown-menu`">
            <slot></slot>
        </ul>

    </ul>
</template>

<script>
    export default {
        props: ['label'],
        data(){
            return {
                open: false
            }
        }
    }
</script>

<style>
    .dropdown-menu{
        @apply transition-all duration-300 flex flex-col overflow-hidden;
    }
</style>
