<template>
    <div :class="classes">
        <p>{{text}}</p>
    </div>
</template>

<script setup>
import {defineProps, reactive, watch} from 'vue'
    const props = defineProps({
        text: {
            type: String,
            required: true
        },
        isRole: {
            type: Boolean,
            required: true
        }
    })
  const classes = reactive({
      'role': true,
      'checked': props.isRole
  })
watch(() =>props.isRole,() => {
    classes.checked = props.isRole
} )
</script>

<style lang="scss" scoped>
    .role {
        border-radius: 10px;
        background: rgba(255, 0, 0, 0.3);
        color: #960000;
        font-size: 10px;
        padding: 5px;
        p{
            margin: 0;
        }
    }
    .checked{
        background: rgba(115, 255, 0, 0.3);
        color: #137c01;
    }
</style>
