<template>
    <div class="card">
        <div class="card__heading">
            <slot name="heading"></slot>
        </div>
        <div class="card__body">
            <slot name="body"></slot>
        </div>
        <!-- <div class="card__footer">
            <slot name="footer"></slot>
        </div> -->
    </div>
</template>

<script>
export default {
    
}
</script>

<style lang="postcss" scoped>

.card {
    @apply bg-white rounded shadow;
}

.card__heading {
    @apply uppercase text-xl text-blue-darker font-bold;
}

.card__heading, .card__body {
    
}

.card > div {
    @apply p-4;
}

</style>


