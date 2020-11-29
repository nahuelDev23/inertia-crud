<template>
    <App-Layout>
        <div class="card__container">
            <card-component
                v-for="(sexualidad,index) in sexualidad.data"
                :key="index"
                :post="sexualidad"
                >
            </card-component>
        </div>
    </App-Layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import CardComponent from "@/Components/CardComponent";
export default {
    props:{
      sexualidad:Object,
    },
    name: "Sexualidad",
    components:{
        AppLayout,
        CardComponent
    },
    data(){
        return{

        }
    }
}
</script>

<style scoped lang="scss">
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
</style>
