<template>
    <form @submit.prevent="$emit('send-comment')">
        <label class="block ">
            <textarea class="form-textarea mt-1 block w-full mt-4" rows="3" placeholder="Subila con tu comentario" v-model="form.comment"></textarea>
            <div class="flex justify-end">
              <slot name="buttons"></slot>
            </div>
        </label>
    </form>
</template>

<script>
import LoadingButton from "@/Components/LoadingButtonComponent";
export default {
props:{
    form:Object
},
name: "FormCommentComponent",
    components: {LoadingButton}
}
</script>

<style scoped>

</style>
