<template>
  <v-app class="app" full-height>
    <router-view></router-view>
  </v-app>
</template>
<script setup>
import {useUserState} from "@/store/user.js";

const userStore = useUserState()
userStore.getUser()
</script>
<style lang="scss">
.app {
  margin: 0;
  padding: 0;
  height: 100%;
  font-family: 'Roboto';
}
</style>
