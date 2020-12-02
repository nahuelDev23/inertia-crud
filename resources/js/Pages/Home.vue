<template>
    <App-Layout>
        <div v-if="$page.flash.success">{{$page.flash.success}}</div>
        <div class="card__container">
            <!-- hacer paginacion con scroll -->
            <card-component
                v-for="(post,index) in list.data"
                :key="index"
                :post="post"></card-component>
        </div>
    </App-Layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import CardComponent from "@/Components/CardComponent";
import {debounce} from "lodash";

export default {
    props:{
        posts:Object
    },
    name: "Home",
    components:{
        AppLayout,
        CardComponent,
    },
    data(){
        return{
            list: this.posts,
            page: 0,
        }
    },
    mounted() {
        /**
         * ver como era lo de ...response
         */
        window.addEventListener('scroll',debounce((e)=>{
            let pixelFromBottom = document.documentElement.offsetHeight - document.documentElement.scrollTop - window.innerHeight;
            if(pixelFromBottom < 200){
                axios.get(this.list.next_page_url)
                    .then(response => {
                        console.log(response)
                        this.list = {
                            ...response.data,
                            data: [...this.list.data,...response.data.data]
                        }
                    })
            }
        },100))
    }
}
</script>

<style  lang="scss">
.card__container{
    display: grid;
    grid-template-columns: repeat(1,1fr);
    grid-gap: 1rem;
    margin: 0 1rem;
    margin-top: 1rem;

    @media (min-width: 640px) {
        grid-template-columns: repeat(2,1fr);
    }
    @media (min-width: 980px) {
        grid-template-columns: repeat(3,1fr);
    }
}
:root{
    --primary-color:#575965;
    --text-color:#f8f8f6;
    --secondary-color:#72d2e3;
    --lgbt-color:#FEBAC6;
    --sexualidad-color:#FF6F5E;
    --consejo-color:#EFD2BC;
    --videojuegos-color:#AADCCA;
    --series-color:#F57B51;
    --paranormal-color:#8D89A3;
    --musica-color:#0096D1;
    --gastronomia-color:#444251;
    --noticias-color:#BC2C3D;
    --politica-color:#2C2627;
}
</style>
