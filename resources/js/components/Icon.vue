<template>
    <font-awesome-icon class="icon" :size="size" :icon="getIcon"></font-awesome-icon>
</template>

<script>

import { faUser, faLock, faEnvelope, faShoppingCart  } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

export default {
    props: ['icon', 'size'],
    data () {
        return {
            icons: {
                'user': faUser,
                'lock': faLock,
                'envelope': faEnvelope,
                'cart': faShoppingCart
            }
        }
    },
    computed: {
        getIcon () {
            return this.icons[this.icon];
        }
    },
    components: {
        FontAwesomeIcon
    }
}
</script>

