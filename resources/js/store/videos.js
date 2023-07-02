import {defineStore} from "pinia";

export const useVideosState = defineStore('videos', {
        state: () => ({
            allVideos: [],
            allVideosLoading: false,
        }),
        actions: {
            async getAllVideos(){
                try {
                    this.allVideosLoading = true
                    const { data } = await axios.get('api/video/all')
                    this.allVideos = [...data.videos]
                    this.allVideosLoading = false
                } catch (e) {
                    console.log(e)
                    this.allVideosLoading = false
                }
            },
            async removeVideo(id){
                try {
                    await axios.delete(`api/video/${id}`)
                }catch (e){
                    console.log(e)
                }
            }
        }

    }
)
