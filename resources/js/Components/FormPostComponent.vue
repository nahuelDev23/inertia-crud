<template>
  <form  @submit.prevent="$emit('send-post')">
    <label class="block">
      <span class="text-gray-700 ">Titulo</span>
      <div class="alert-danger p-2" v-if="$page.errors.title">{{$page.errors.title}}</div>
      <input class="form-input mt-1 block w-full" v-model="form.title"  />
    </label>
    <label class="block ">
      <span class="text-gray-700">Poné un resumen</span>
      <div class="alert-danger p-2" v-if="$page.errors.description">{{$page.errors.description}}</div>
      <input class="form-input mt-1 block w-full" v-model="form.description" />
    </label>
    <label class="block ">
      <span class="text-gray-700">Redacta el post</span>
       <div class="alert-danger p-2" v-if="$page.errors.body">{{$page.errors.body}}</div>
      <textarea class="form-input mt-1 block w-full" v-model="form.body" />
    </label>
    <label class="block ">
      <span class="text-gray-700">URL de la imagen</span>
      <input class="form-input mt-1 block w-full" v-model="form.image" />
    </label>
     <label class="block ">
        <div class="alert-danger p-2" v-if="$page.errors.category_id">{{$page.errors.category_id}}</div>
         <span>Selecciona una categoria</span>
       <select class="form__seclect" v-model="form.category_id">
         <option :value="category.id" v-for="category in categories" v-bind:key="category.id">
           {{category.category}}
          </option>
       </select>
    </label>
     <label class="block">
      <div class="alert-danger" v-if="$page.errors.is_anon">{{$page.errors.is_anon}}</div>
     <label class="inline-flex items-center ">
         <input type="checkbox" class="form-checkbox h-5 w-5 text-gray-600"  v-model="form.is_anon"><span class="ml-2 text-gray-700">Postear como anonimo</span>
     </label>
    </label>
     <div class="px-8 py-4 border-t border-gray-200 flex justify-center items-center">
          <slot name="buttons" />
      </div>

  </form>
</template>

<script>
export default {
  /**
    ! pasar user id por model
     */
    props:{
       errors:Object,
      categories:Array,
      form:Object,
    },
  name: "FormPost",
   data(){
        return {

        }
    },
};
</script>

<style scoped lang="scss">
.form__seclect{
    background-color: #e6e6e6;
    width: 100%;
    padding: .5rem;
}
</style>


