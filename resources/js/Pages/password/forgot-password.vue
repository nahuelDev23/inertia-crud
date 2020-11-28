<template>
    <app-Layout>
        <h1>forgot password</h1>
        <div v-for="(erro,index) in errors" :key="index">
            {{ erro }}
        </div>
        <form @submit.prevent="requestPasswordLink">
            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                <div class="col-md-6">
                    <input id="email" type="email"  autocomplete="email" autofocus v-model="form.email">
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        Send Password Reset Link
                    </button>
                </div>
            </div>
        </form>
    </app-Layout>

</template>

<script>
export default {
    name: "Email",
    props: {
        errors: Object,
        errorLogin: Object,
    },
}
</script>

<style scoped>

</style>
<script>
import AppLayout from "@/Layouts/AppLayout";
export default {
    name: "PasswordResetLink",
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
            }
        }
    },
    methods:{
        requestPasswordLink()
        {
            this.$inertia.post(this.route('password.email'),this.form).then(()=>{

            });
        }
    }
}
</script>
