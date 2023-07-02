<template>
    <div class="dialog" style="max-width: 100%;height: 100%">
        <h2 class="title_dialog">Зарегистрироваться</h2>
        <p>Чтобы стать администратором, зарегистрируйтесь и свяжитесь с владельцем сайта</p>
      <p class="error_text" v-if="userStore.registerError">{{userStore.registerError}}</p>
        <div class="flex">
            <div style="width: 100%;">
                <input v-model="name" class="input" type="text" placeholder="Имя">
                <div class='error'>
                    <role text="Обязательно" :isRole="state.isRequiredName"></role>
                </div>
            </div>
            <div style="width: 100%;">
                <input v-model="email" class="input" type="email" placeholder="Email">
                <div class='error'>
                    <role text="Обязательно" :isRole="state.isRequiredEmail"></role>
                    <role text="Email" :isRole="state.isEmail"></role>
                </div>
            </div>
            <div style="width: 100%;">
                <input v-model="password" class="input" type="text" placeholder="Пароль">
                <div class='error'>
                    <role text="Обязательно" :isRole="state.isRequiredPassword"></role>
                    <role text="Верхний и нижний регистр"
                          :isRole="state.isLowerCasePassword && state.isUpperCasePassword"></role>
                    <role text="Есть цифры" :isRole="state.isNumber"></role>
                    <role text="Минимум 8 символов" :isRole="state.isLengthPassword"></role>
                </div>
            </div>
            <button @click="submit()" :disabled="!state.isValid" class="button">Зарегистрироваться</button>
            <p class="link" @click="modalStore.setIsLoginForm(true)">Войти</p>
        </div>
    </div>
</template>

<script setup>
import {useModalState} from "@/store/modal.js";
import {computed, reactive, watch, watchEffect} from "vue";
import Role from "@/components/components/Role.vue";
import {useUserState} from "@/store/user.js";
const modalStore = useModalState();
const userStore = useUserState();
const state = reactive({
    isRequiredName: false,
    isRequiredPassword: false,
    isLengthPassword: false,
    isUpperCasePassword: false,
    isLowerCasePassword: false,
    isNumber: false,
    isRequiredEmail: false,
    isEmail: false,
    name: '',
    password: '',
    email: '',
    isValid: false
})
const name = computed({
    get: () => state.name,
    set: value => {
        state.isRequiredName = value.length > 0
        state.name = value
    }
})
const password = computed({
    get: () => state.password,
    set: value => {
        state.isRequiredPassword = value.length > 0
        state.isLengthPassword = value.length >= 8
        state.isNumber = /\d/.test(value)
        state.isUpperCasePassword = /[A-Z]/.test(value)
        state.isLowerCasePassword = /[a-z]/.test(value)
        state.password = value
    }
})
const email = computed({
    get: () => state.email,
    set: value => {
        state.isRequiredEmail = value.length > 0
        state.isEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value)
        state.email = value
    }
})
watchEffect(() => {
    state.isValid = state.isRequiredName &&
        state.isRequiredPassword &&
        state.isLengthPassword &&
        state.isNumber &&
        state.isUpperCasePassword &&
        state.isLowerCasePassword &&
        state.isRequiredEmail &&
        state.isEmail
})
const submit = async () => {
        const payload = {
            name: state.name,
            email: state.email,
            password: state.password
        }
        await userStore.registerUser(payload)
        modalStore.isOpen = !!userStore.registerError
}
</script>

<style lang="scss" scoped>
.error {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    width: 100%;
    margin-top: 5px;
    gap: 5px;
}

.title_dialog {
    font-style: normal;
    font-weight: 700;
    font-size: 20px;
    line-height: 25px;
    color: #000000;
    text-align: center;
}

.flex {
    display: flex;
    width: 350px;
    flex-flow: column;
    align-items: center;
    row-gap: 50px;
    justify-content: center;
    margin: 52px auto;

}

.input {
    outline: none;
    padding: 5px;
    width: 100%;
    height: 40px;
    left: 693px;
    top: 547px;
    background: #FFFFFF;
    border: 1px solid #000000;
}

.button {
    display: block;
    outline: none;
    margin: 0 auto 0;
    border: none;
    width: 100%;
    height: 50px;
    left: 455px;
    top: 369px;
    background: linear-gradient(180deg, #0083E2 0%, #004E86 100%);
    box-shadow: 0 0 8px #0083E2;
    font-style: normal;
    font-weight: 700;
    font-size: 20px;
    line-height: 23px;
    color: #FFFFFF;
    cursor: pointer;
    &:disabled{
        cursor: default;
        opacity: 0.5;
    }
}

.link {
    margin: 0;
    font-weight: 500;
    color: #0083E2;
    font-size: 18px;
    cursor: pointer;
}
.error_text{
  font-size: 18px;
  color: red;
  font-weight: 500;
  text-align: center;
}
</style>
