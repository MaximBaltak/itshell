<template>
    <v-container>
        <ul class="list" v-if="!videosStore.allVideosLoading">
            <li
                v-if="videosStore.allVideos.length > 0 &&
             !videosStore.allVideosLoading"
                v-for="video in videosStore.allVideos"
                :key="video.video_id">
                <card-video :video="video"></card-video>
            </li>
            <p v-if="!videosStore.allVideos.length && !videosStore.allVideosLoading">Видео пока нет</p>
        </ul>
        <v-progress-circular
            v-if="videosStore.allVideosLoading"
            color="#2196f3"
            :indeterminate="true" size="70">

        </v-progress-circular>
    </v-container>
</template>

<script setup>
import {useVideosState} from "@/store/videos.js";
import CardVideo from "@/components/components/listAllVideo/CardVideo.vue";
const videosStore = useVideosState();
videosStore.getAllVideos()
</script>

<style lang="scss" scoped>
    .list{
        width: 600px;
        list-style-type: none;
        padding: 0 0 20px;
        li{
            margin-top: 20px;
        }
        p{
            text-align: center;
            font-size: 16px;
        }
    }
</style>
