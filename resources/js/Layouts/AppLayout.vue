<template>
    <main>
        <header>
            <inertia-link href="/">Home</inertia-link>
            <inertia-link href="/about">About</inertia-link>
            <inertia-link href="/register">Register</inertia-link>
            <inertia-link href="/login">Login</inertia-link>
            <div v-if="$page.user">Bienvenido {{$page.user.name}}</div>
        </header>
        <article>
            <slot />
        </article>
    </main>
</template>
<script>
export default {
}
</script>
