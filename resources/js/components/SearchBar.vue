<template>
    <form :action="action" @submit.prevent>
        <ui-input @input="search" @blur="result = []" class="mb-0" name="q" type="search" icon="search" placeholder="Search for products..." vertical></ui-input>

        <div class="result absolute" v-show="result.length > 0">
            <ul class="p-0 list-reset w-full">
                <li class="block" v-for="item in result" :key="item.id">
                    <div class="flex justify-between items-center">
                        <div>
                            <h4 class="text-sm font-regular opacity-75">{{ item.brand.name }}</h4>
                            <h3>{{ item.name }}</h3>
                        </div>
                        <div class="font-bold text-red-light">
                            {{ item.formattedPrice }}
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </form>
</template>
<script>
export default {
    props: ['action'],
    data () {
        return {
            timeout: undefined,
            auth: false,
            query: "",
            result: []
        }
    },
    methods: {
        async search (value) {
            this.query = value
            clearTimeout(this.timeout)

            if (this.query !== '') {
                this.searching = true
                this.timeout = await setTimeout(() => {
                    let that = this
                    axios.get(this.action, {
                        params: {
                            q: this.query
                        }
                    }).then((res) => {
                        that.auth = res.data.auth
                        that.result = res.data.result
                    }).finally(() => {
                        that.searching = false
                    })
    
    
                }, 300)
            } else {
                this.result = []
            }
        }
    }
}
</script>

<style lang="postcss" scoped>
    form {
        @apply relative;
    }

    .result {
        width: 100%;
        z-index: 2;
        max-height: 400px;
        overflow-y: auto;
        @apply bg-white p-4 shadow-lg;
    }

    li {
        @apply mb-2 pb-2 border-b-2 border-grey-light;
    }

</style>



