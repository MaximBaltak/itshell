<template>
  <v-app class="app" full-height>
    <router-view></router-view>
  </v-app>
</template>
<script setup>
import {useUserState} from "@/store/user.js";
import {useVideosState} from "@/store/videos.js";

const userStore = useUserState()
const videosStore = useVideosState()
userStore.getUser()
videosStore.getAllVideos()
</script>
<style lang="scss">
.app {
  margin: 0;
  padding: 0;
  height: 100%;
  font-family: 'Roboto';
}
</style>
