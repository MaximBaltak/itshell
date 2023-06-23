<template>
    <div class="dialog" style="max-width: 100%;height: 100%">
        <h2 class="title_dialog">Зарегистрироваться</h2>
        <p>Чтобы стать администратором, зарегистрируйтесь и свяжитесь с владельцем сайта</p>
        <div class="flex">
            <input class="input" type="text" placeholder="Имя">
            <input class="input" type="email" placeholder="Email">
            <input class="input" type="text" placeholder="Пароль">
            <button class="button">Зарегистрироваться</button>
            <p class="link" @click="modalStore.setIsLoginForm(true)">Войти</p>
        </div>
    </div>
</template>

<script setup>
    import {useModalState} from "@/store/modal.js";

    const modalStore = useModalState();

</script>

<style lang="scss" scoped>
.title_dialog{
    font-style: normal;
    font-weight: 700;
    font-size: 20px;
    line-height: 25px;
    color: #000000;
    text-align: center;
}
.flex{
    display: flex;
    width: 350px;
    flex-flow: column;
    align-items: center;
    row-gap: 50px;
    justify-content: center;
    margin: 52px auto;

}
.input{
    outline: none;
    padding: 5px;
    width: 100%;
    height: 40px;
    left: 693px;
    top: 547px;
    background: #FFFFFF;
    border: 1px solid #000000;
}
.button{
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
}
.link{
    margin: 0;
    font-weight: 500;
    color: #0083E2;
    font-size: 18px;
    cursor: pointer;
}
</style>
