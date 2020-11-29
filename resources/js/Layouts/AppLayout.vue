<template>
    <main>
        <header class="header">
            <nav class="header__nav">
                <ul class="header__list relative">
                    <div class="relative inline-block text-left">
                        <li class="header__item flex items-center" @click="hidden = !hidden">
                            <span>Categorias</span>
                            <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </li>
                        <!--menu oculto-->
                        <div :class="hidden ? 'transform opacity-0 scale-95 hidden' : 'transform opacity-100 scale-100 block' " class="  border-color-secundary bg-primary mr-4 transition origin-top-right absolute right-0 mt-2 w-56 z-10 rounded-md shadow-lg ring-1 ring-black ring-opacity-5 ">
                            <div  class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                                <inertia-link :href="route('home')" :class="route().current('home') ? 'active_link' : ''" class="block px-4 py-2 text-sm header__item header__item hover-menu" role="menuitem">Home</inertia-link>
                                <div v-for="categories in $page.categories">
                                    <inertia-link :href="route(categories.category)" :class="route().current(categories.category) ? 'active_link' : ''" class="block px-4 py-2 text-sm header__item header__item hover-menu" role="menuitem">
                                        {{ categories.category }}</inertia-link>
                                </div>
                                <a v-if="$page.user" @click="logout" type="submit" class="hover-menu block w-full text-left px-4 py-2 text-sm header__item hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900" role="menuitem">
                                    Salir
                                </a>
                            </div>
                        </div>
                    </div>
                    <li class="header__item" v-if="!$page.user">
                        <inertia-link  :href="route('register')"
                         :class="route().current('register') ? 'active_link' : ''">Register</inertia-link>
                    </li>
                    <li class="header__item" v-if="!$page.user">
                        <inertia-link :href="route('login')"
                         :class="route().current('login') ? 'active_link' : ''">Login</inertia-link>
                    </li>
                </ul>
                <div class="header__user">
                    <span class="header__icon">🧠</span>
                    <div  class="header__name" v-if="$page.user">{{$page.user.name}}</div>
                </div>
            </nav>
        </header>

        <article class="main-wrap">
            <slot />
        </article>
    </main>
</template>
<script>
    export default {
        props:{
            categories:Object,
        },
        data(){
            return{
                hidden:true
            }

        },
        methods:{
            logout(){
                this.$inertia.post(this.route('logout'))
            }
        }
    }
</script>
<style lang="scss" >
:root{
    --primary-color:#575965;
    --text-color:#f8f8f6;
    --secondary-color:#72d2e3;
}
    ///* sm */
    //@media (min-width: 640px) { /* ... */ }
    ///* md */
    //@media (min-width: 768px) { /* ... */ }
    ///* lg */
    //@media (min-width: 1024px) { /* ... */ }
    ///* xl */
    //@media (min-width: 1280px) { /* ... */ }
    .hover-menu:hover{
        background-color: rgba(0,0,0,.4);
    }
    .transition{
        transition:all .5s;
    }
    .bg-primary{
        background-color: var(--primary-color);
    }
    .border-color-secundary{
        border:1px solid var(--secondary-color);
    }
    .main-wrap{
        max-width: 1200px;
        margin:auto;
        font-family: 'Inconsolata', monospace;
    }

    .header{
        background-color: var(--primary-color);
        border-bottom:2px solid var(--secondary-color);
        &__nav{
            display: flex;
            flex-direction: row-reverse;
            justify-content: space-between;
            align-items:center;
            max-width: 1200px;
            margin:0 auto;

        }
        &__list{
            display: flex;
            //display: none;
            /**
             * A PARTIR DE 600 SE MUESTRA
             */
            @media (min-width: 640px) {
                //display: flex;

            }
        }
        &__item{
            padding: 1rem;
            color:var(--text-color);
        }
        &__user{
            display: flex;
            align-items: center;
            padding-left: 1rem;
            color:#f8f8f6;
        }
        &__icon{
            font-size: 1.5rem;
        }
    }
    .active_link{
        color:#72d2e3;
        background-color: rgba(0,0,0,.4);
    }
</style>
