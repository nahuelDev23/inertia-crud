<template>
    <App-Layout>
        <h1>Register</h1>
        <div>
            <div v-for="(erro,index) in errors" :key="index">
                {{ erro }}
            </div>
            <form @submit.prevent="register">
                <label>
                    nombre
                    <input type="text" v-model="form.name">
                </label>
                <label>
                    email
                    <input type="email" v-model="form.email">
                </label>
                <label>
                    password
                    <input type="password" v-model="form.password">
                </label>
                <label>
                    repetir password
                    <input type="password" v-model="form.password_confirmation">
                </label>
                ya tenes cuenta? <InertiaLink :href="route('login')">Login</InertiaLink>
                <button type="submit">send</button>
                <div v-if="procesing">Cargando...</div>
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
            procesing:false,
            form:{
                name: null,
                email: null,
                password: null,
                password_confirmation: null,
            }
        }
    },
    methods:{
        register()
        {
            this.procesing = true
           this.$inertia.post(this.route('register'),this.form).then(()=>{
               this.processng = false;
           });
        }
    }
}
</script>

<style scoped>

</style>
