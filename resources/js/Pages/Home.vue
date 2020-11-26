<template>
    <App-Layout>
        <h1>Home</h1>
        <div v-if="$page.flash.success">{{$page.flash.success}}</div>
    </App-Layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
export default {
    name: "Home",
    components:{
        AppLayout
    }
}
</script>

<style scoped>

</style>
