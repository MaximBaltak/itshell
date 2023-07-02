<template>
  <v-dialog v-model="dialog" max-width="600" sty>
    <login-form v-if="modalStore.isLoginForm"></login-form>
    <register-form v-else></register-form>
  </v-dialog>
</template>

<script setup>
import {computed, defineEmits, defineProps} from 'vue'
import {useModalState} from "@/store/modal.js";
import LoginForm from "@/components/components/LoginForm.vue";
import RegisterForm from "@/components/components/RegisterForm.vue";
import {useUserState} from "@/store/user.js";

const props = defineProps({
  value: {
    type: Boolean,
    default: false
  }
})
const modalStore = useModalState();
const userStore = useUserState();

const emit = defineEmits(['input'])
const dialog = computed({
  get: () => props.value,
  set: (value) => {
    if (!value) {
      userStore.clearError()
    }
    emit('input', value)
  }
})
</script>

<style lang="scss" scoped>
.dialog {
  background: #FFFFFF;
  padding: 30px;
  border-radius: 20px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.4);
}
</style>
