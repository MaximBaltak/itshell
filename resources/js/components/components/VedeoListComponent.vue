<template>
  <v-container>
    <div id="list" class="list">
      <video-card-component
          v-if="videosStore.allVideos.length && !videosStore.allVideosLoading"
          v-for="video in videosStore.allVideos"
          :key="video.video_id"
          :video="video"></video-card-component>
        <p v-if="!videosStore.allVideos.length && !videosStore.allVideosLoading">Нет опубликованных видео</p>
        <v-progress-circular
            v-if="videosStore.allVideosLoading"
            color="#2196f3"
            :indeterminate="true" size="70">

        </v-progress-circular>
    </div>
  </v-container>
</template>

<script setup>
import VideoCardComponent from './VideoCardComponent.vue';
import {useVideosState} from "@/store/videos.js";
const videosStore = useVideosState()
</script>

<style lang="scss" scoped>
.list {
  margin-top: 40px;
  display: flex;
  align-items: center;
  justify-content: center;
  column-gap: 40px;
  row-gap: 20px;
  flex-wrap: wrap;
  width: 100%;
}
</style>
