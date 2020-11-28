<template>
        <app-Layout>
            <h1>ENVIAR EMAIL DE VALIDACION</h1>
            <div v-for="(erro,index) in errors" :key="index">
                {{ erro }}
            </div>
            <div v-if="$page.flash.status && open">
                Se envio un email
                <button @click="open = false">x</button>
            </div>
            <form @submit.prevent="sendVerificationEmail">
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            enviar mail para resetear
                        </button>
                    </div>
                </div>
            </form>
        </app-Layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
export default {
    name: "VerifyEmail",
    props:{
        errors: Object,
    },
    components:{
        AppLayout
    },
    data(){
        return{
            open:true,
        }
    },
    methods:{
        sendVerificationEmail(){
            this.$inertia.post(this.route('verification.send')).then(()=>{

            })
        }
    }
}
</script>

<style scoped>

</style>
