<template>
    <a class="link" target="_blank" :href="link">
        <img width="20" height="20" :src="icon" alt="vk">
        <p>{{ text }}</p>
    </a>
</template>

<script setup>
import {defineProps} from 'vue'

defineProps({
    icon: {
        type: String
    },
    link: {
        type: String
    },
    text: {
        type: String
    }
})
</script>

<style lang="scss" scoped>
.link {
    display: flex;
    min-width: 200px;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    column-gap: 20px;

    p {
        color: black;
        font-size: 18px;
        font-weight: 500;
    }
}
</style>
