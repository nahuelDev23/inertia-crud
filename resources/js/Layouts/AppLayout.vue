<template>
    <main>
        <header class="header">
            <nav class="header__nav">
                <ul class="header__list">
                    <li class="header__item">
                        <inertia-link :href="route('home')"
                          :class="route().current('home') ? 'active_link' : ''">Home</inertia-link>
                    </li>
                    <li class="header__item">
                        <inertia-link :href="route('about')"
                        :class="route().current('about') ? 'active_link' : ''">About</inertia-link>
                    </li>
                    <li class="header__item" v-if="!$page.user">
                        <inertia-link  :href="route('register')"
                         :class="route().current('register') ? 'active_link' : ''">Register</inertia-link>
                    </li>
                    <li class="header__item" v-if="!$page.user">
                        <inertia-link :href="route('login')"
                         :class="route().current('login') ? 'active_link' : ''">Login</inertia-link>
                    </li>
                    <li class="header__item" v-if="$page.user">
                        <inertia-link  href="/logout">Logout</inertia-link>
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

    }
</script>
<style lang="scss" scoped>
    .main-wrap{
        max-width: 1200px;
        margin:auto;
        font-family: 'Inconsolata', monospace;
    }
    .active_link{
        color:#72d2e3;
    }
    .header{
        background-color: #575965;
        border-bottom:2px solid #72d2e3;
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
        }
        &__item{
            padding: 1rem;
            color:#f8f8f6;
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
</style>
