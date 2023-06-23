import {defineStore} from "pinia";
export const useModalState = defineStore('modal', {
        state: () => ({
            isLoginForm: true
        }),
        actions: {
            setIsLoginForm (value) {
                this.isLoginForm = value
            }
        }
    }

)
