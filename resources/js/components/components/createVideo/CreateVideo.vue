<template>
    <v-container>
        <div v-if="!createVideoStore.currentVideo">
            <input @change="add" id="input_file" type="file" accept="video/mp4" style="display: none">
            <label class="add" for="input_file">
                <v-icon size="40" color="white">mdi-plus</v-icon>
            </label>
        </div>
        <CreateForm v-else/>
    </v-container>
</template>

<script setup>
import CreateForm from "@/components/components/createVideo/CreateForm.vue";
import {useCreateVideoState} from "@/store/createVideo.js";

const createVideoStore = useCreateVideoState()
const add = async (e) => {
    const file = e.target.files[0]
    if (file && file.type === 'video/mp4') {
        createVideoStore.addVideo(file)
    }
}
</script>

<style lang="scss" scoped>
.add {
    outline: none;
    border: none;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #0083E2;
    border-radius: 100%;
    width: 70px;
    height: 70px;
    margin: 10px;
    cursor: pointer;
}
</style>
