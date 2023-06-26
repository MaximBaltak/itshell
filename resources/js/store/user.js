import {defineStore} from "pinia";

export const useUserState = defineStore('user',{
    state: () => {
        return {
            user: {},
            error: {
                isError:'',
                message:''
            }
        }
    },
    actions: {
        async registerUser (value) {
            try {
                const { data } = await axios.post('api/register',value)
                this.user = {...data}
                this.error.isError = false
            } catch (e) {
                console.log(e)
                this.error.isError = true
            }
        },
        async getUser () {
            try {
                const { data } = await axios.get('api/user')
                console.log(data)
                this.user = {...data}
                this.error.isError = false
            } catch (e) {
                console.log(e)
                this.error.isError = true
            }
        },
        async loginUser (value) {
            try {
                const { data } = await axios.post('api/login',value)
                this.user = {...data}
                this.error.isError = false
            } catch (e) {
                console.log(e)
                this.error.isError = true
            }
        },
        async logoutUser () {
            try {
                await axios.post('api/logout',value)
                state.user = {}
                this.error.isError = false
            } catch (e) {
                console.log(e)
                this.error.isError = true
            }
        }
    }
})
