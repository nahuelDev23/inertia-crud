<template>
    <App-Layout>
        <pre>
            {{post}}
        </pre>
    </App-Layout>
</template>

<script>
import AppLayout from '../../Layouts/AppLayout.vue'


export default {
    name: "show",
    components:{
        AppLayout
    },
    props:{
        post:Object,
        AppLayoutpost:Object,
        categories:Array
    }
   
}
</script>

<style scoped lang="scss">

</style>
