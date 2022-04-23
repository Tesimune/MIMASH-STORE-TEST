<template>
    <div :class="`input-box ${className}`">
        <label :for="name">{{ label }}</label>
        <textarea :id="name" :value="modelValue"
                  @input="$emit('update:modelValue', $event.target.value)"
                  :class="` textarea ${error ? 'border-red-500': ''}`"/>
        <span class="input-error" v-if="error">{{ error }}</span>
    </div>
</template>

<script>
export default {
    props: ['name', 'label', 'error', 'modelValue', 'className'],
    emits: ['update:modelValue']
}
</script>

<style lang="scss" scoped>
.input-box{
    @apply flex flex-col gap-1;

    .textarea{
        @apply px-3 py-2 rounded outline-0 bg-transparent border
        focus:border-yellow-500 resize-none h-24;
    }

    .input-error{
        @apply text-sm font-semibold text-red-500;
    }
}
</style>
