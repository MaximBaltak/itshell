<template>
  <div class="header">
    <p class="title"><span>IT</span>SHELL</p>
    <p v-if="!userStore?.user?.id" class="signIn" @click="toModal">Вход</p>
    <div v-else>
      <p class="text">
        {{ userStore.user.name }}
        <span
            v-if="userStore.user.is_admin"
            style="font-size: 14px;"
        >админ</span>
      </p>
      <p v-if="userStore?.user?.is_admin" class="signIn" @click="toAdmin()">В панель управления</p>
      <p class="signIn" @click="logout()">Выход</p>
    </div>
    <login-modal v-model="modalStore.isOpen"></login-modal>
  </div>
</template>

<script setup>
import LoginModal from "@/components/modal/LoginModal.vue";
import {useModalState} from "@/store/modal.js";
import {useUserState} from "@/store/user.js";
import {useRouter} from "vue-router";

const modalStore = useModalState();
const router = useRouter()
const userStore = useUserState()
const toModal = () => {
  modalStore.isOpen = !modalStore.isOpen
}
const logout = async () => {
  await userStore.logoutUser()
}
const toAdmin = () => {
  router.push({
    name: 'admin'
  })
}
</script>

<style lang="scss" scoped>
.header {
  width: 100%;
  height: 80px;
  padding: 19px 130px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  flex-wrap: wrap;
  row-gap: 20px;

  .title {
    font-style: normal;
    font-weight: 700;
    font-size: 36px;
    line-height: 42px;
    margin: 0;
    color: #ffffff;

    span {
      color: #0083E2;
    }
  }

  .signIn {
    font-style: normal;
    font-weight: 700;
    font-size: 24px;
    line-height: 28px;
    color: #FFFFFF;
    cursor: pointer;
    transition: all .2s;
    margin: 5px 0 0;

    &:hover {
      transform: scale(1.1);
    }
  }

  .text {
    color: rgba(255, 255, 255, 0.7);
    font-size: 24px;
    font-weight: 400;
    margin: 0;
    line-height: 28px;
    cursor: pointer;
  }
}
</style>
