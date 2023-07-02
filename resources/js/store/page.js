import {defineStore} from "pinia";

export const usePageState = defineStore('page', {
        state: () => ({
            tab: 'createVideo'
        }),
    }
)
