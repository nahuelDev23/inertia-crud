<template>
<div class="rounded-full p-4 bg-primary fixed right-4 bottom-4 z-40" id="show-modal" @click="$emit('open')">
    <svg class="w-10" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="white">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
    </svg>
</div>
</template>

<script>
export default {
props:{

},
name: "FixedButtonComponent",
}

</script>

<style  lang="scss">


</style>
