import {defineStore} from "pinia";
export const useModalState = defineStore('modal', {
        state: () => ({
            isLoginForm: true,
            isOpen: false
        }),
        actions: {
            setIsLoginForm (value) {
                this.isLoginForm = value
            },
            setModal(value){
                this.isOpen = value
            }
        }
    }

)
