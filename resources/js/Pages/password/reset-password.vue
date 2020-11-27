<template>
    <app-Layout>
        <h1>Reset password</h1>
        <div v-for="(erro,index) in errors" :key="index">
            {{ erro }}
        </div>
        <form @submit.prevent="resetForm">
            <div class="form-group row">
                <input type="hidden" v-model="form.token">
                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                <div class="col-md-6">
                    <input id="email" type="email"  autocomplete="email" autofocus v-model="form.email" >
                    <input  type="password"  v-model="form.password">
                    <input  type="password"  v-model="form.password_confirmation">
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        Reset
                    </button>
                </div>
            </div>
        </form>
    </app-Layout>

</template>
<style scoped>

</style>
<script>
import AppLayout from "@/Layouts/AppLayout";
export default {
    name: "reset",
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
                token:route().params.token,
                password_confirmation:null
            }
        }
    },
    methods:{
        resetForm()
        {
            this.$inertia.post('forgot-password ',this.form);

            this.$inertia.post(this.route("password.update"), this.form);
        }
        
    }
}
</script>
