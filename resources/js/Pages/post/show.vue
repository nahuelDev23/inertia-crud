<template>
    <App-Layout>
            <div class="show__container">
            <div class="post" v-for="p in post">
                <div v-if="$page.user" class="text-center mt-4 mb-4 sm:mt-0">
                    <inertia-link class="mr-4 bg-green-100 rounded px-4 py-1 shadow" :href="route('post.edit',$page.post[0].id)" v-if=" $page.user.id == $page.post[0].user_id && $page.user.score >= 500 ">Editar</inertia-link>
                    <button class=" bg-pink-300 rounded px-4 shadow"  @click="deletePost($page.post[0].id)" v-if=" $page.user.id == $page.post[0].user_id && $page.user.score >= 1000 ">Eliminar</button>
                </div>
                <div class="post__top" v-if="p.image">
                    <div class="post__image" >
                        <img :src="p.image" alt="">
                    </div>
                </div>

                <div class="post__mid">
                    <div class="post__title">{{p.title}}</div>
                    <div class="post__by mb-4 flex justify-center">Por <span class="ml-4 text-green-600 bold" >{{p.user.name}}</span></div>
                    <div class="post__body" v-html="p.body"></div>
                </div>
            </div>

            <div class="comment">
                <FormCommentComponent @send-comment="submitComment" :form="form" v-if="$page.user">
                    <template #buttons>
                        <loading-button-component
                            :loading="processing"
                            class="btn-indigo mt-2"
                            type="submit"
                        >
                            Comentar
                        </loading-button-component>
                    </template>
                </FormCommentComponent>
                <div v-else>Tenés que estar <inertia-link :href="route('login')" class="text-purple-600">logeadx</inertia-link> para comentar</div>
                <div class="comment__box" v-for="comment in comments">
                    <div class="comment__comment shadow" :class="comment.is_anon ? 'comment__anon' : '' ">
                        <div class="comment__perfil">
                            <div class="comment__left" v-if="!comment.is_anon">
                                <span >{{comment.user.name}}</span>
                                <span class="alert-danger p-1" v-if="comment.user_id == $page.post[0].user_id && !$page.post[0].is_anon">Autor</span>
                                <span v-else></span>
                            </div>
                            <div v-else>Anonimo</div>
                           <div class="comment__right">
                               {{comment.formateado}}
                           </div>
                        </div>
                        <div v-html="comment.comment"></div>
                    </div>
                </div>
            </div>
        </div>
    </App-Layout>
</template>

<script>
import AppLayout from '../../Layouts/AppLayout.vue'
import FormCommentComponent from "@/Components/FormCommentComponent";
import LoadingButtonComponent from "@/Components/LoadingButtonComponent";
import {mapValues} from "lodash";

export default {
    name: "show",
    components:{
        LoadingButtonComponent,
        FormCommentComponent,
        AppLayout
    },
    props:{
        post:Array,
        categories:Array,
        comments:Array,
    },
    data(){
        return{
            processing:false,
            form:{
                comment:null,
                is_anon:false,
                user_id_del_post:this.post[0].user_id ,
                post_id:this.route().params.post,
            }
        }
    },
    methods:{
        submitComment(){
            this.processing = true;
            this.$inertia.post(this.route('comment.store'),this.form,{
                    onSuccess:() => {
                        this.processing = false;
                       this.resetComment();
                }
            })
        },
        resetComment(){
            this.form.comment = null
            this.form.is_anon = null
        },
        deletePost(id){
            this.$inertia.delete(this.route('post.destroy',id));
        }
    },


}
</script>

<style scoped lang="scss">
    .show__container{
        display: grid;
        grid-template-columns:repeat(1,1fr);
        grid-gap:1rem;
        @media (min-width: 640px) {
            margin-top: 1rem;
            grid-template-columns:repeat(2,1fr);
        }
    }
    .post{
        .bold{
            font-weight: bold;
        }
        &__top{
            height: 40vh;
        }
        &__image{
            background-color:var(--primary-color);
            height: 100%;
            & > img{
                object-fit: cover;
                max-height: 100%;
                min-height: 100%;
                width: 100%;
            }
        }
        &__mid{
            margin:0 1rem;
        }
        &__title{
            margin-top: 1rem;
            margin-bottom: 1rem;
            font-weight: bold;
            text-align: center;
            font-size: 1.3rem;
            color:rgba(0,0,0,.8);
        }
        &__body{
            text-align: justify;
        }
    }

    .comment{
        text-align: center;

        &__comment{
            background-color: rgba(255,255,255,.6);
            margin-bottom: 1rem;
            margin-top: 1rem;
            padding: 1rem;
            text-align: justify;
            border-radius:4px;
        }
        &__perfil{
            display: flex;
            justify-content: space-between;
            margin-bottom: 1rem;
        }
        &__anon{
            color:var(--text-color);
            background-color: var(--primary-color);
        }
    }
</style>
