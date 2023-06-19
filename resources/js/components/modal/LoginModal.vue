<template>
    <v-dialog v-model="dialog" max-width="600">
         <div class="dialog" style="height: 400px; max-width: 600px">
             <h2 class="title_dialog">Вход для администратора</h2>
             <div class="flex">
                 <input class="input" type="email" placeholder="Email">
                 <input class="input" type="text" placeholder="Пароль">
                 <button class="button">Войти</button>
             </div>
         </div>
    </v-dialog>
</template>

<script setup>
import {computed, defineEmits, defineProps} from 'vue'
   const props = defineProps({
        value: {
            type: Boolean,
            default: false
        }
    })
    const emit = defineEmits(['input'])
    const dialog = computed({
        get: () => props.value,
        set: (value) => {
            emit('input',value)
        }
    })
</script>

<style lang="scss" scoped>
    .dialog{
        background: #FFFFFF;
        padding: 30px;
        border-radius: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.4);
    }
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
</style>
