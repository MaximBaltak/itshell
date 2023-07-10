<template>
    <ul class="links">
        <li>
            <Link :icon="VkIcon"
                  text="Наша группа"
                  link="https://vk.com/shell_it"></Link>
        </li>
        <li>
            <Link :icon="TelegramIcon"
                  text="Телеграмм канал"
                  link="https://t.me/it_shell"></Link>
        </li>
        <li>
            <Link :icon="RutubeIcon"
                  text="Rutube канал"
                  link="https://rutube.ru/channel/18523376/"></Link>
        </li>
    </ul>
</template>

<script setup>
import Link from "@/components/components/links/Link.vue";
import VkIcon from '@a/img/icons/vk.svg'
import TelegramIcon from '@a/img/icons/telegram.svg'
import RutubeIcon from '@a/img/icons/rutube.svg'
</script>

<style lang="scss" scoped>
.links {
    list-style-type: none;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-wrap: wrap;
    width: 100%;
    background: linear-gradient(180deg, #560259 0%, #0e1150 100%);
    padding: 10px;
    min-height: 100px;
    li{
        border-left: solid 1px rgba(255, 255, 255, 0.2);
        padding: 0 40px;

    }
    li:first-child{
        border-left: none;
    }
    @media screen and (max-width: 670px ){
        flex-flow: column;
        li{
            border-left: none;
            border-bottom: solid 1px  rgba(255, 255, 255, 0.2);
            padding: 20px 0;
        }
        li:last-child{
            border-bottom: none;
        }
    }
}
</style>
