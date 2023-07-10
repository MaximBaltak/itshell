<template>
    <v-container>
        <ul class="list" v-if="!usersStore.usersLoading" >
            <li  v-if="usersStore.users.length > 0 &&
             !usersStore.usersLoading" v-for="user in usersStore.users" :key="user.id">
                <User :user="user"/>
            </li>
            <p v-if="!usersStore.users.length && !usersStore.usersLoading">Пользователей пока нет</p>
        </ul>
        <v-progress-circular
            v-if="usersStore.usersLoading"
            color="#2196f3"
            :indeterminate="true" size="70">

        </v-progress-circular>
    </v-container>
</template>

<script setup>
import User from "@/components/components/listUsers/User.vue";
import {useUsersState} from "@/store/users.js";
const usersStore = useUsersState();
usersStore.getUsers()
</script>

<style lang="scss" scoped>
.list{
    width: 600px;
    list-style-type: none;
    padding: 0 0 20px;
    li{
        margin-top: 20px;
    }
    p{
        text-align: center;
        font-size: 16px;
    }
}
</style>
