<template>
    <App-Layout>
        <div class="flex items-center justify-center  py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-md w-full space-y-8">
                <div>
                    <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                        Iniciar Sesion
                    </h2>
                </div>
                <div class="push-error" v-if="errorLogin.errorLogin">
                    {{ errorLogin.errorLogin }}
                </div>
                <form @submit.prevent="sendFormLogin" class="mt-8 space-y-6">
                    <div class="rounded-md shadow-sm -space-y-px">
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
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember_me" type="checkbox"
                                   class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                            <label for="remember_me" class="ml-2 block text-sm text-gray-900">
                                Remember me
                            </label>
                        </div>

                        <div class="text-sm">
                            <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">
                                <inertia-link :href="route('password.request')">Olvidaste la contraseña? xdddd</inertia-link>
                            </a>
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
                        Iniciar
                    </button>
                </form>
            </div>

        </div>
    </App-Layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";

export default {
    name: "login",
    components: {
        AppLayout
    },
    props: {
        errors: Object,
        errorLogin: Object,
    },
    data() {
        return {
            form: {
                email: null,
                password: null,
            }
        }
    },
    methods: {
        sendFormLogin() {
            this.$inertia.post(this.route('login'), this.form);
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
