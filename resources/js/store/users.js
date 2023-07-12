import {defineStore} from "pinia";

export const useUsersState = defineStore('users',{
    state: () => {
        return {
            users: [],
            usersLoading: false
        }
    },
    actions: {
        async getUsers(){
            this.usersLoading = true
            try {
               const { data } = await axios.get('api/users')
                console.log(data)
                this.users = [...data.users]
            } catch (e) {
                console.log(e)
            } finally {
                this.usersLoading = false
            }
        }
    }
})
