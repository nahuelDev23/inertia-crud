<template>
        <app-Layout>
            <div class="flex items-center justify-center  py-12 px-4 sm:px-6 lg:px-8">
                <div class="max-w-md w-full space-y-8">
                    <div>
                        <h3 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                            Te enviamos a tu mail un link de validacion, asi podes acceder a todo el contenido de la web
                        </h3>
                    </div>
                    <div class="push-error" v-for="(erro,index) in errors" :key="index">
                        {{ erro }}
                    </div>
            <div v-if="$page.flash.status && open">
                Se envio un email
                <button @click="open = false">x</button>
            </div>
            <form @submit.prevent="sendVerificationEmail">
                <loading-button-component
                    :loading="processing"
                    class="btn-indigo w-full justify-center"
                    type="submit"
                > Enviar email de validacion</loading-button-component>
            </form>
                </div>
            </div>
        </app-Layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import LoadingButtonComponent from "@/Components/LoadingButtonComponent";
export default {
    name: "VerifyEmail",
    props:{
        errors: Object,
    },
    components:{
        AppLayout,
        LoadingButtonComponent
    },
    data(){
        return{
            processing:false,
            open:true,
        }
    },
    methods:{
        sendVerificationEmail(){
            this.processing = true
            this.$inertia.post(this.route('verification.send')).then(()=>{
                this.processing = false
            })
        }
    }
}
</script>

<style scoped>

</style>
