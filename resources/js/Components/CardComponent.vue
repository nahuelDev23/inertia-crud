<template>
 <inertia-link class="card" :href="route('post.show',post.id)">
        <div class="card__top">
            <div class="card__image">
                <img v-if="!post.is_anon && post.image == null" src="img/no-image.jpg" alt="">
                <img v-if="!post.is_anon" :src="post.image" alt="">
                <img v-if="post.is_anon" src="img/anon_image.jpg" alt="">
            </div>
            <div :class="post.category.category.toLowerCase()+'class'" class="card__category">{{post.category.category}}</div>  
        </div>
        <div class="card__mid">
           <div class="card__title">{{ post.title.slice(0,60) }}...</div> 
            <div class="card__description">{{ post.description }}</div>
            
        </div>
        <div class="card__bottom">
            <div class="card__date">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 8V12L15 15M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="#4A5568" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                {{ post.formateado }}
            </div>
            <div class="card__comments">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                </svg>
                {{ post.comment.length }} comentarios
            </div>
        </div>
 </inertia-link>
</template>

<script>
export default {
props:{
    post:Object,
    clase:String,
},
name: "CardComponent",
}

</script>

<style  lang="scss">

.card{
    background-color: #fff;
    display: grid;
    grid-template-rows: 50% 40% 5%;
    grid-gap:.5rem;
    min-height: 500px;

    @media (min-width: 640px) {
        //display: flex;
    }
&__top{
     display: flex;
     align-items: flex-end;
     position: relative;
    height: 100%;
 }
&__image{
     position: absolute;
     min-width: 100%;
     height: 100%;
& > img {
      object-fit: cover;
    min-width: 100%;
      height: 100%;
  }
}
&__category{
     position: relative;
     margin-bottom: 1rem;
     margin-left: 1rem;
     padding: .5rem;
     background-color: var(--secondary-color);
     color:var(--primary-color);
     font-weight: 600;
 }

&__mid{
    height: 100%;
    margin: 0 1rem;
 }
&__title{
    margin-bottom: 1rem;
     font-size: 1.5rem;
     font-weight: 600;
     color:rgba(0,0,0,.8);
    @media (min-width: 640px) {
        font-size: 1rem;
    }
 }
&__bottom{
     display: flex;
     justify-content: space-between;
     align-items: center;
    height: 100%;
    margin: 0 1rem;
 }
&__date,
&__comments{
     display: flex;
     align-items: center;
    @media (min-width: 640px) {
        font-size: .9rem;
    }
    & > svg {
        font-size: 1rem;
        padding-right: .5rem;
        @media (min-width: 640px) {
            font-size: .9rem;
        }
      }
}
    &__comments{
        & > svg{
            width: 1.5rem;
        }
    }
}

.lgbtqclass{
    background-color: var(--lgbt-color);
}
.sexualidadclass{
    color:var(--text-color);
    background-color: var(--sexualidad-color);
}
.consejoclass{
    background-color: var(--consejo-color);
}
.videojuegosclass{
    background-color: var(--videojuegos-color);
}
.seriesclass{
    color:var(--text-color);
    background-color: var(--series-color);
}
.paranormalclass{
    color:var(--text-color);
    background-color: var(--paranormal-color);
}
.musicaclass{
    color:var(--text-color);
    background-color: var(--musica-color);
}
.gastronomiaclass{
    color:var(--text-color);
    background-color: var(--gastronomia-color);
}
.noticiasclass{
    color:var(--text-color);
    background-color: var(--noticias-color);
}
.politicaclass{
    color:var(--text-color);
    background-color: var(--politica-color);
}
</style>
