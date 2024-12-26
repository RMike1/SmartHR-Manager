<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
    <button :type="type" class="btn btn-md btn-block btn-light lift">
        <slot />
    </button>
</template>
