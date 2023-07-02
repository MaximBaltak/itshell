<template>
  <div @click="open" class="card">
    <img :src="video.img" alt="video">
    <p class="title">{{video.title}}</p>
      <player v-model="state.openPlayer" :video="video"></player>
  </div>
</template>

<script setup>
import {defineProps, reactive} from 'vue'
import Player from "@/components/modal/Player.vue";
const props = defineProps({
    video: {
        type: Object,
        default: () => {}
    }
})
const state = reactive({
    openPlayer: false
})
const open = () => {
    state.openPlayer = !state.openPlayer
}
</script>

<style lang="scss" scoped>
.card {
  width: 210px;
  height: 211px;
    cursor: pointer;

  img {
    width: 210px;
    height: 125px;
  }

  .title {
    word-break: break-all;
    height: 72px;
    font-style: normal;
    font-weight: 700;
    font-size: 14px;
    line-height: 16px;
    color: #000000;
    margin-top: 20px;
  }
}
</style>
