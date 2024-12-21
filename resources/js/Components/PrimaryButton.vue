<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
    <button :type="type" class="btn btn-lg btn-block btn-light lift text-uppercase">
        <slot />
    </button>
</template>
