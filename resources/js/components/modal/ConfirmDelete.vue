<template>
    <v-dialog v-model="dialog" max-width="600px">
        <div class="dialog">
            <p class="title">Видео будет удалено безвозратно. Удалить?</p>
           <div class="actions">
               <button @click="back" class="yes">Нет</button>
               <button @click="remove" class="no">Да</button>
           </div>
        </div>
    </v-dialog>
</template>

<script setup>
import {computed, defineEmits, defineProps} from 'vue'
import {useVideosState} from "@/store/videos.js";
const videoStore = useVideosState()
const props = defineProps({
    value: {
        type: Boolean,
        default: false
    },
    video: {
        type: Object,
        default: () => {}
    }
})
const emit = defineEmits(['input','close'])
const dialog = computed({
    get: () => props.value,
    set: (value) => {
        emit('input', value)
    }
})
const remove = async () => {
    emit('close', false)
    await videoStore.removeVideo(props.video?.video_id)
    await videoStore.getAllVideos()
}
const back = () => {
    emit('close', false)
}
</script>

<style lang="scss" scoped>
.dialog {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-flow: column;
    padding: 20px;
    width: 100%;
    background: #FFFFFF;
    border-radius: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.4);
}
.title{
    font-size: 25px;
    color: black;
    font-weight: 500;
    text-align: center;
}
.actions{
    display: flex;
    align-items: center;
    justify-content: space-around;
    margin-top: 50px;
    width: 100%;
}
.yes{
    outline: none;
    font-size: 25px;
    color: green;
    font-weight: 700;
    transition: all .2s;
    &:hover{
        transform: scale(1.1);
    }
}
.no{
    outline: none;
    font-size: 25px;
    color: red;
    font-weight: 700;
    transition: all .2s;
    &:hover{
        transform: scale(1.1);
    }
}
</style>
