<template>
    <App-Layout>
        <form-post-component class="bg-blue max-width-edit m-auto" @send-post="updatePost"  :categories=$page.categories :form="form">
            <template #buttons>
                <loading-button-component
                    :loading="processing"
                    class="btn-indigo"
                    type="submit"
                >
                   Editar post
                </loading-button-component>
            </template>
        </form-post-component>
    </App-Layout>
</template>

<script>
import AppLayout from '../../Layouts/AppLayout.vue'
import LoadingButtonComponent from "@/Components/LoadingButtonComponent";
import {mapValues} from "lodash";
import FormPostComponent from "@/Components/FormPostComponent";


export default {
    name: "edit",
    components:{
        FormPostComponent,
        LoadingButtonComponent,
        AppLayout
    },
    props:{
        post:Object,
        categories:Array,
    },
    data(){
        return{
            processing:false,
            form:{
                title:this.post.title,
                description:this.post.description,
                body:this.post.body,
                image:this.post.image,
                is_anon:this.post.is_anon,
                category_id:this.post.category_id,
            }
        }
    },
    methods:{
        updatePost(){
           this.$inertia.put(this.route('post.update',this.post.id),this.form).then(()=>{
               this.processing = false
           })
        }
    },


}
</script>

<style scoped lang="scss">
.max-width-edit{
    max-width: 80vw;
    @media (min-width: 768px) {
        max-width: 60vw;
    }
    @media (min-width: 1024px) {
        max-width: 40vw;
    }
}
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
}
</style>
