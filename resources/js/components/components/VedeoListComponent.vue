<template>
    <v-container>
        <div class="list">
            <video-card-component></video-card-component>
            <video-card-component></video-card-component>
            <video-card-component></video-card-component>
            <video-card-component></video-card-component>
            <video-card-component></video-card-component>
            <video-card-component></video-card-component>
            <video-card-component></video-card-component>
            <video-card-component></video-card-component>
        </div>
    </v-container>
</template>

<script setup>
import VideoCardComponent from './VideoCardComponent.vue';
</script>

<style lang="scss" scoped>
    .list{
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