<template>
    <button type="submit" class="btn" :class="states">
        <slot></slot>
    </button>
</template>

<script>
export default {
    props: {
        href: {
            type: String
        },
        simple: {
            type: Boolean
        }
    },
    computed: {
        states () {
            return {
                'btn--simple': this.simple
            }
        }
    }
}
</script>

<style lang="postcss" scoped>

.btn {
    @apply inline-block rounded no-underline py-2 px-3 font-bold text-blue-darker border-2 border-blue-darker;
}

.btn:hover:not(.btn--simple) {
    @apply bg-blue-darker text-white;
}

.btn--simple {
    @apply border-transparent;
}

</style>


