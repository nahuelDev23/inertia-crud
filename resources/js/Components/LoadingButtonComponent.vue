<template>
    <button :disabled="loading" class="flex items-center ">
        <div v-if="loading" class="btn-spinner mr-2" />
        <slot/>
    </button>
</template>

<script>
export default {
    name: "LoadingButton",
    props:{
        loading:Boolean
    }
}
</script>

<style scoped>
</style>
