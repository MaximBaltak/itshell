<template>
    <div class="card">
        <img @click="click" class="card_cover" :src="video.img" alt="">
        <p class="card_title">{{video.title}}</p>
        <button @click="toDelete">
            <v-icon color="red">mdi-delete</v-icon>
        </button>
        <confirm-delete v-model="state.isDelete" :video="video" @close="close"></confirm-delete>
        <player v-model="state.openPlayer" :video="video"></player>
    </div>
</template>
<script setup>
import {defineProps, reactive} from 'vue'
import Player from "@/components/modal/Player.vue";
import {useVideosState} from "@/store/videos";
import ConfirmDelete from "@/components/modal/ConfirmDelete.vue";
const videoStore = useVideosState()
   const props = defineProps({
        video: {
            type: Object,
            default: ()=> {}
        }
    })
const state = reactive({
    openPlayer: false,
    isDelete: false
})
const click = () => {
    state.openPlayer = !state.openPlayer
}
const toDelete = () => {
    state.isDelete = true
}
const close = (value) => {
    state.isDelete = false
}
</script>

<style lang="scss" scoped>
    .card{
        display: flex;
        align-items: center;
        column-gap: 30px;
        width: 100%;
        padding: 20px;
        background: white;
        box-shadow: 0 6px 14px #c7c7c7a8;
        border-radius: 10px;
    }
    .card_cover{
        width: 110px;
        height: 70px;
        display: block;
    }
    .card_title{
        width: 371px;
        font-weight: 700;
        color: black;
        font-size: 16px;
    }

</style>
