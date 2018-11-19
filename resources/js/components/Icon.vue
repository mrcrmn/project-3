<template>
    <font-awesome-icon class="icon" :size="size" :icon="getIcon"></font-awesome-icon>
</template>

<script>

import { faUser, faLock, faEnvelope, faShoppingCart, faAddressCard, faCreditCard, faCalendarAlt, faTrash, faSearch  } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

export default {
    props: ['icon', 'size'],
    data () {
        return {
            icons: {
                'user': faUser,
                'lock': faLock,
                'envelope': faEnvelope,
                'cart': faShoppingCart,
                'address': faAddressCard,
                'credit-card': faCreditCard,
                'calendar': faCalendarAlt,
                'trash': faTrash,
                'search': faSearch
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

