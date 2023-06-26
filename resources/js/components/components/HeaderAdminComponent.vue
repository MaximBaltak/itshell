<template>
    <div class="header">
        <p class="title"><span>IT</span>SHELL</p>
        <div>
            <p class="text">{{userStore.user.name}}</p>
            <p class="signIn" @click="logout()">Выход</p >
        </div>
    </div>
</template>

<script setup>
import {useUserState} from "@/store/user.js";
import {useRouter} from "vue-router";
const router = useRouter()
const userStore = useUserState()

const logout = async () => {
    await userStore.logoutUser()
    await router.push({
        name:'home'
    })
}
</script>

<style lang="scss" scoped>
    .header{
        width: 100%;
        height: 80px;
        padding: 19px 130px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        row-gap: 20px;
        border-bottom: solid 1px black;
        background: #FFFFFF;
        .title{
            font-style: normal;
            font-weight: 700;
            font-size: 36px;
            line-height: 42px;
            margin: 0;
            color: black;
            span{
                color: #0083E2;
            }
        }
        .signIn{
            margin: 0;
            font-style: normal;
            font-weight: 700;
            font-size: 24px;
            line-height: 28px;
            color: black;
        }
    }
</style>
