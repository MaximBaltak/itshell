import {createRouter, createWebHistory} from 'vue-router'
import Home from './../components/Home.vue'
import Admin from './../components/Admin.vue'

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/admin',
            name: 'admin',
            component: Admin
        },
        {
            path: '/',
            name: 'home',
            component: Home
        },
    ]
})
export default router
