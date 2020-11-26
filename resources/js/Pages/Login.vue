<template>
    <App-Layout>
        <h1>Login</h1>
        <div>
            <div v-for="(erro,index) in errors" :key="index">
                {{ erro }}
            </div>
            <form @submit.prevent="sendFormLogin">
                <label>
                    <input type="email" v-model="form.email">
                    {{form.email}}
                </label>
                <label>
                    <input type="password" v-model="form.password">
                </label>
                <button type="submit">send</button>
            </form>
        </div>
    </App-Layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
export default {
    name: "login",
    components:{
        AppLayout
    },
    props:{
        errors: Object,
    },
    data(){
        return{
            form:{
                email: null,
                password: null,
            }
        }
    },
    methods:{
        sendFormLogin()
        {
            this.$inertia.post('/auth',this.form);
        }
    }
}
</script>

<style scoped>

</style>
