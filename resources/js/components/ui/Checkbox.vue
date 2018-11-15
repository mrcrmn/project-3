<template>
    <div class="checkbox">
        <input :id="name" type="checkbox">
        <label :for="name">{{ label }}</label>
    </div>
</template>

<script>
export default {
    props: {
        name: {},
        label: {}
    }
}
</script>

<style lang="postcss" scoped>
    .checkbox input {

    }

    .checkbox > label {
    @apply w-1/3 text-blue-darker font-bold;
}
</style>

