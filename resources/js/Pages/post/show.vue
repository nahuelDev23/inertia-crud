<template>
    <App-Layout>
        <div class="show__container">
            <div class="post"  v-for="p in post">
                <div class="post__top">
                    <div class="post__image">
                        <img :src="p.image" alt="">
                    </div>
                </div>
                <div class="post__mid">
                    <div class="post__title">{{p.title}}</div>
                    <div class="post__body">{{p.body}}</div>
                </div>
            </div>
            <div class="comment">

            </div>
        </div>

    </App-Layout>
</template>

<script>
import AppLayout from '../../Layouts/AppLayout.vue'


export default {
    name: "show",
    components:{
        AppLayout
    },
    props:{
        post:Object,
        AppLayoutpost:Object,
        categories:Array
    }

}
</script>

<style scoped lang="scss">
    .show__container{
        display: grid;
        margin-top: 1rem;
        grid-template-columns:repeat(1,1fr);
        @media (min-width: 640px) {
            grid-template-columns:repeat(2,1fr);
        }
    }
    .post{
        &__top{
            max-height: 20vh;
            &__image{
                height: 100%;
                & > img{
                    height: 100%;
                    width: 100%;
                }
            }
        }
    }
</style>
