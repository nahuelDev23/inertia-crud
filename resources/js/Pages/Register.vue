<template>
    <App-Layout>
        <div class="flex items-center justify-center  py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-md w-full space-y-8">
                <div>
                    <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                        Registrate
                    </h2>
                </div>
                <div class="push-error"v-for="(erro,index) in errors" :key="index">
                    {{ erro }}
                </div>
                <form @submit.prevent="register" class="mt-8 space-y-6">
                    <div class="rounded-md shadow-sm -space-y-px">
                        <div>
                            <label for="name" class="sr-only">Usuario</label>
                            <input v-model="form.name" id="name" name="name" type="text" required
                                   class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                   placeholder="Nombre de usuario">
                        </div>
                        <div>
                            <label for="email-address" class="sr-only">Email address</label>
                            <input v-model="form.email" id="email-address" name="email" type="email" required
                                   class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                   placeholder="Email address">
                        </div>

                        <div>
                            <label for="password" class="sr-only">Password</label>
                            <input v-model="form.password" id="password" name="password" type="password" required
                                   class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                   placeholder="Password">
                        </div>
                        <div>
                            <label for="password" class="sr-only">Password</label>
                            <input v-model="form.password_confirmation" id="repeat-password" name="password" type="password" required
                                   class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                   placeholder="Repetir Password">
                        </div>
                    </div>

                    <button type="submit"
                            class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white main-color-button focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                      <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        <!-- Heroicon name: lock-closed -->
                        <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400"
                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                             aria-hidden="true">
                          <path fill-rule="evenodd"
                                d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                clip-rule="evenodd"/>
                        </svg>
                      </span>
                        registrate
                    </button>
                </form>
            </div>

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
