<template>
    <div class="header">
        <p class="title"><span>IT</span>SHELL</p>
        <p class="signIn">Вход</p>
    </div>
</template>

<script setup>
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
        .title{
            font-style: normal;
            font-weight: 700;
            font-size: 36px;
            line-height: 42px;
            margin: 0;
            color: #ffffff;
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
            color: #FFFFFF;
        }
    }
</style>