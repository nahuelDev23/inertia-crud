<template>
    <app-Layout>
        <div class="flex items-center justify-center  py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-md w-full space-y-8">
                <div>
                    <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                        Recuperar Contraseña
                    </h2>
                </div>
        <div class="push-error" v-for="(erro,index) in errors" :key="index">
            {{ erro }}
        </div>
        <form @submit.prevent="requestPasswordLink">
            <div class="form-group row mb-4">
                <label for="email-address" class="sr-only">Email address</label>
                <input v-model="form.email" id="email-address" name="email" type="email" required
                       class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                       placeholder="EMAIL CON EL QUE TE REGISTRASTE">
            </div>

            <loading-button-component
                :loading="processing"
                class="btn-indigo w-full justify-center"
                type="submit"
            > Enviar email de recuperacion</loading-button-component>
        </form>
            </div>
        </div>
    </app-Layout>

</template>

<style scoped lang="scss">
.push-error{
    font-weight: 500;
    text-align: center;
    padding: .5rem;
    color: #721c24;
    background-color: #f8d7da;
    border:2px solid #f5c6cb;
}
.main-color-button{
    background-color: #575965;
    &:hover{
        background-color: lighten(#575965,5%);
    }
}

</style>
<script>
import LoadingButtonComponent from '../../Components/LoadingButtonComponent.vue';
import AppLayout from "@/Layouts/AppLayout";
export default {
    name: "PasswordResetLink",
    components:{
        AppLayout,
        LoadingButtonComponent
    },
    props:{
        errors: Object,
    },
    data(){
        return{
            processing:false,
            form:{
                email: null,
            }
        }
    },
    methods:{
        requestPasswordLink()
        {
            this.processing = true
            this.$inertia.post(this.route('password.email'),this.form).then(()=>{
                this.processing = false
            });
        }
    }
}
</script>
