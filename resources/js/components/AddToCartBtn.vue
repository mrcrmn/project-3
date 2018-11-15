<template>
    <button class="btn" @click="handle">
         <icon icon="cart" class="mr-1"></icon>Add to cart
    </button>
</template>

<script>
export default {
    props: ['action'],
    methods: {
        async handle () {
            let res = await axios.post(this.action)

            document.getElementById('total').textContent = res.data.newTotal
            document.getElementById('number-items').textContent = res.data.newItemsCount
        }
    }
}
</script>

<style lang="postcss" scoped>
    .btn {
        @apply w-full rounded relative text-blue-darker py-2 px-4 border-2 border-blue-darker font-bold flex justify-center bg-transparent overflow-hidden;
        transition: all .3s ease;
        z-index: 1;
    }

    .btn::before {
        content: " ";
        @apply pin bg-blue-darker absolute;
        transition: all .3s ease;
        transform: translateX(-100%);
        z-index: -1;
    }

    .btn:hover {
        @apply text-white;
    }

    .btn:hover::before {
        transform: translateX(0);
    }
</style>


