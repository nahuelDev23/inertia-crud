<template>
    <div class="card">
        <div class="card__top">
            <div class="card__image">
                <img :src="post.image" alt="">
            </div>
            <div class="card__category">{{post.category.category}}</div>
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
                39 comentarios
            </div>
        </div>
    </div>
</template>

<script>
export default {
props:{
    post:Object
},
name: "CardComponent"
}
</script>

<style scoped lang="scss">
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
</style>
