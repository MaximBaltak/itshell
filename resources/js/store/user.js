import {defineStore} from "pinia";

export const useUserState = defineStore('user',{
    state: () => {
        return {
            user: {},
            loginError: '',
            registerError:''
        }
    },
    actions: {
        clearError(){
            this.loginError = ''
            this.registerError = ''
        },
        async registerUser (value) {
            try {
                const { data } = await axios.post('api/register',value)
                this.user = {...data.user}
                localStorage.setItem('auth',JSON.stringify(data.access_token))
                this.registerError = ''
            } catch (e) {
                console.log(e)
                this.registerError = e?.response?.data?.message
            }
        },
        async getUser () {
            try {
                const { data } = await axios.get('api/user')
                console.log(data)
                this.user = {...data.data}
            } catch (e) {
            }
        },
        async loginUser (value) {
            try {
                const { data } = await axios.post('api/login',value)
                this.user = {...data.user}
                this.loginError = ''
                localStorage.setItem('auth',JSON.stringify(data.access_token))
            } catch (e) {
                this.loginError = e?.response?.data?.message
            }
        },
        async logoutUser () {
            try {
                await axios.get('api/logout')
                localStorage.removeItem('auth')
                this.user = {}
            } catch (e) {

            }
        }
    }
})
