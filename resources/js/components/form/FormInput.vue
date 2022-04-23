<template>
    <div class="input-box">
        <label class="font-extralight" :for="name">{{ label }}</label>
        <input :id="name" :type="type ?? 'text'" :value="modelValue"
               @input="$emit('update:modelValue', $event.target.value)"
               :class="`input ${error ? 'border-red-500': ''}`"  />
        <span :class="className + ' input-error'" v-if="error">{{ error }}</span>
    </div>
</template>

<script>
    export default {
        props: ['name', 'type', 'label', 'error', 'modelValue', 'className'],
        emits: ['update:modelValue']
    }
</script>

<style lang="scss" scoped>
.input-box{
    @apply flex flex-col gap-1 mb-2;

    .input{
        @apply px-3 py-2 rounded outline-0 bg-transparent border focus:border-yellow-500;
    }

    .input-error{
        @apply text-sm font-semibold text-red-500;
    }
}
</style>
