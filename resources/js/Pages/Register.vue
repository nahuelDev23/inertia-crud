<template>
    <App-Layout>
        <h1>Register</h1>
        <div>
            <div v-for="(erro,index) in errors" :key="index">
                {{ erro }}
            </div>
            <form @submit.prevent="sendForm">
                <label>
                    <input type="text" v-model="form.name">
                </label>
                <label>
                    <input type="email" v-model="form.email">
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
    name: "Register",
    components:{
        AppLayout
    },
    props:{
        errors: Object,
    },
    data(){
        return{
            form:{
                name: null,
                email: null,
                password: null,
            }
        }
    },
    methods:{
        sendForm()
        {
           this.$inertia.post('/register',this.form);
        }
    }
}
</script>

<style scoped>

</style>
