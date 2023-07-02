<template>
  <div>
    <header-admin-component></header-admin-component>
    <div class="header_main">
      <p @click="toBack" class="button">
        <v-icon style="transform: translateY(-1px);" color="black" size="25">mdi-arrow-left</v-icon>
        На главную
      </p>
    </div>
    <v-tabs color="black" v-model="state.tab" bg-color="blue">
      <v-tab value="createVideo">Добавить видео</v-tab>
      <v-tab value="listVideo">Список видео</v-tab>
    </v-tabs>
    <v-window v-model="state.tab">
      <v-window-item value="createVideo">
        <CreateVideo/>
      </v-window-item>
      <v-window-item value="listVideo">Список</v-window-item>
    </v-window>
  </div>
</template>

<script setup>
import HeaderAdminComponent from "@/components/components/HeaderAdminComponent.vue";
import {useRouter} from "vue-router";
import {reactive} from "vue";
import CreateVideo from "@/components/components/createVideo/CreateVideo.vue";
const state = reactive({
  tab: 'createVideo'
})
const router = useRouter()
const toBack = () => {
  router.push({
    name: 'home'
  })
}
</script>

<style lang="scss" scoped>
.header_main{
  width: 100%;
  background: #2196f3;;
}
.button {
  font-style: normal;
  font-weight: 700;
  font-size: 16px;
  line-height: 23px;
  color: black;
  cursor: pointer;
  transition: all .2s;
  padding: 20px;
}
</style>
