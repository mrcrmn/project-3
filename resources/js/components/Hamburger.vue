<template>
<div id="hamburger" @click="toggle" class="md:hidden" :class="{ 'open': isOpen }">
    <span></span>
    <span></span>
    <span></span>
    <span></span>
</div>
</template>

<script>
export default {
    data () {
        return {
            isOpen: false
        }
    },
    methods: {
        toggle () {
            this.isOpen = ! this.isOpen
            let el = document.querySelector('.offcanvas')

            el.classList.toggle('open')
        }
    }
}
</script>

<style lang="postcss" scoped>
    #hamburger {
        position: absolute;
        height: 40px;
        width: 40px;
        @apply p-2 text-center;
        bottom: 6px;
        right: 0;
    }

    span {
        height: 2px;
        width: 22px;
        @apply bg-blue-darker inline-block;
        position: absolute;
        left: 6px;
        transform-origin: center;
        transition: all .3s ease;
    }

    span:nth-child(1) {
        top: 12px;
    }

    span:nth-child(2) {
        top: 20px;
    }

    span:nth-child(3) {
        top: 20px;
    }

    span:nth-child(4) {
        top: 28px;
    }

    #hamburger.open > span:nth-child(1) {
        transform: scale(0);
        top: 20px;
    }

    #hamburger.open > span:nth-child(2) {
        transform: rotate(45deg);
    }

    #hamburger.open > span:nth-child(3) {
        transform: rotate(-45deg);        
    }

    #hamburger.open > span:nth-child(4) {
        transform: scale(0);
        top: 20px;        
    }
</style>


