<template>
    <v-dialog v-model="dialog" max-width="600px">
        <div class="dialog">
            <video v-if="video.video" id="vid" preload="auto" class="player" :poster="video.img" controls>
                <source :src="video.video" type="video/mp4">
            </video>
        </div>
    </v-dialog>
</template>

<script setup>
import {computed, defineEmits, defineProps, ref} from 'vue'

const props = defineProps({
    value: {
        type: Boolean,
        default: false
    },
    video: {
        type: Object,
    }
})
const emit = defineEmits(['input'])
const dialog = computed({
    get: () => props.value,
    set: (value) => {
        emit('input', value)
    }
})
</script>

<style lang="scss" scoped>
.dialog {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    background: #FFFFFF;
    border-radius: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.4);
}
.player{
    width: 600px;
    height: 338px;
    margin-left: auto;
    margin-right: auto;
    display: block
}
</style>
