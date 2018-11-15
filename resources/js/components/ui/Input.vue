<template>
    <div class="input" :class="{ 'has-error': hasError, 'vertical': vertical }">
        <label :for="name">{{ label }}</label>
        <div class="input-wrapper" :class="{ 'has-icon': hasIcon }">
            <icon v-if="hasIcon" :icon="icon"></icon>
            <input :id="name" :name="name" :type="type" :required="required" :placeholder="placeholder" :value="value">
        </div>
        <div v-if="hasError" class="error-msg">
            {{ error }}
        </div>
    </div>
</template>

<script>
export default {
    props: {
        label: {},
        type: {},
        name: {},
        error: {
            type: String
        },
        value: {
            type: String
        },
        icon: {
            type: String
        },
        required: {
            type: Boolean
        },
        placeholder: {
            type: String
        },
        vertical: {
            type: Boolean
        }
    },
    computed: {
        hasIcon() {
            return this.icon !== undefined;
        },
        hasError() {
            return this.error !== undefined;
        }
    },
}
</script>

<style lang="postcss" scoped>

.input {
    @apply flex flex-wrap justify-end items-center mb-2;
}

.input.has-error > label {
    @apply text-red;
}

.input > label {
    @apply w-1/3 text-blue-darker font-bold;
}

.input-wrapper {
    @apply w-2/3 flex text-blue-darker items-center rounded bg-grey-light border-2 border-grey-light;
}

.icon {
    @apply fill-current text-grey-darker ml-2;
}

.input-wrapper:focus-within {
    @apply bg-white;
}

.input.has-error .input-wrapper {
    @apply border-red;
}

input {
    @apply flex-1 w-full bg-transparent p-2;
}

input:focus {
    outline: none;
}

.error-msg {
    @apply mt-2 text-red font-bold w-2/3;
}

.input.vertical label {
    @apply mb-2;
}

.input.vertical label, .input.vertical .input-wrapper {
    @apply w-full;
}

</style>


