<template>
    <div class="links">
        <Link icon="../assets/img/icons/vk.svg"
              text="Наша группа"
              link="https://vk.com/shell_it"></Link>
        <Link icon="../assets/img/icons/telegram.svg"
              text="Телеграмм канал"
              link="https://t.me/it_shell"></Link>
        <Link icon="../resources/assets/img/icons/rutube.svg"
              text="Rutube канал"
              link="https://rutube.ru/channel/18523376/"></Link>
    </div>
</template>

<script setup>

import Link from "@/components/components/links/Link.vue";
</script>

<style lang="scss" scoped>
.links {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-wrap: wrap;
    width: 100%;
    background: linear-gradient(180deg, #0083E2 0%, #004E86 100%);
    padding: 10px;
    height: 100px;
}
</style>
