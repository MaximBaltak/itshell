<template>
    <div class="card">
        <p>#{{user.id}}</p>
        <p style="width: 230px">{{user.email}}</p>
        <p v-if="user.is_admin" style="color: green">Администратор</p>
        <p v-else style="color: orange">Пользователь</p>
    </div>
</template>

<script setup>
import { defineProps } from 'vue'
defineProps({
    user: {
        type: Object
    }
})
</script>

<style lang="scss" scoped>
.card{
    display: flex;
    align-items: center;
    column-gap: 30px;
    width: 100%;
    padding: 20px;
    background: white;
    box-shadow: 0 6px 14px #c7c7c7a8;
    border-radius: 10px;
}
</style>
