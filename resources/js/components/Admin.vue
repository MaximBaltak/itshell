<template>
    <div>
        <header-admin-component></header-admin-component>
        <v-container :style="{marginTop: '111px'}">
            <button class="button" >
                На сайт
                <v-icon color="white">mdi-arrow-right</v-icon>
            </button>
        </v-container>
    </div>
</template>

<script setup>

import HeaderAdminComponent from "@/components/components/HeaderAdminComponent.vue";
</script>

<style lang="scss" scoped>
.button{
    display: block;
    outline: none;
    margin: 0 auto 0;
    border: none;
    width: 210px;
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
</style>
