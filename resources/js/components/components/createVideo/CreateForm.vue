<template>
  <div class="grid">
    <div class="form">
      <div class="form_create">
        <v-text-field v-model="createVideoStore.title" label="Название" variant="outlined"></v-text-field>
        <v-file-input @click:clear="createVideoStore.removeImage" @change="add" label="Обложка" variant="outlined" accept="image/png, image/jpeg"></v-file-input>
      </div>
      <button @click="remove" class="remove">
        Удалить видео
        <v-icon color="red">mdi-close</v-icon>
      </button>
    </div>
    <div class="img">
      <div class="avatar">
        <img v-if="createVideoStore.imageBase64" :src="createVideoStore.imageBase64" alt="hello">
      </div>
      <v-progress-linear
          class="linear"
          max="100"
          style="left: 0;transform: none"
          :style="{color: createVideoStore.progress >= 100 ? 'green':'#0083E2'}"
          :model-value="createVideoStore.progress"></v-progress-linear>
      <p v-if="createVideoStore.progress < 100" style="color: #0083E2; margin-top: 20px">В обработке</p>
      <p v-if="createVideoStore.progress >= 100" style="color: green; margin-top: 20px">Ждёт публикации</p>
      <button
          :disabled="!createVideoStore.title || !createVideoStore.imageBase64"
          @click="createVideoStore.publishVideo"
          class="publish">Опубликовать
      </button>
    </div>
  </div>
</template>

<script setup>
import {useCreateVideoState} from "@/store/createVideo.js";

const createVideoStore = useCreateVideoState()
const remove = () => {
  createVideoStore.removeVideo()
}
const add = async (e) => {
  const file = e.target.files[0]
  if(file && (file.type === 'image/jpeg' || file.type === 'image/png')) {
      createVideoStore.addImage(file)
    const reader = new FileReader();
    reader.onload = () => {
      createVideoStore.addImageBase64(reader.result)
    };

    reader.readAsDataURL(file);
  }
}
</script>

<style lang="scss" scoped>
.grid {
  width: 100%;
  display: grid;
  grid-template-areas: "form img";
  grid-template-columns: 410px 1fr;
  column-gap: 100px;
}

.form {
  grid-area: form;

  .remove {
    transition: all .2s;
    color: red;

    &:hover {
      transform: scale(1.1);
    }
  }
}

.img {
  grid-area: img;
  display: flex;
  flex-flow: column;
  justify-items: center;
  justify-content: flex-start;

  .avatar {
    width: 300px;
    height: 200px;
    background: #dbdbdb;

    img {
      display: block;
      width: inherit;
      height: inherit;
    }
  }

  .linear {
    left: 0;
    transform: none;
    justify-self: flex-start;
    display: block;
    width: 300px;
    margin-top: 30px;
    color: #0083E2;
  }
}

.publish {
  display: block;
  outline: none;
  margin-top: 20px;
  border: none;
  width: 210px;
  height: 50px;
  left: 455px;
  top: 369px;
  background: linear-gradient(180deg, #0083E2 0%, #004E86 100%);
  box-shadow: 0px 0px 8px #0083E2;
  font-style: normal;
  font-weight: 700;
  font-size: 20px;
  line-height: 23px;
  color: #FFFFFF;
  cursor: pointer;
    &:disabled{
        opacity: 0.5;
    }
}
</style>
