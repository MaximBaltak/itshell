import {defineStore} from "pinia";
import {th} from "vuetify/locale";

export const useCreateVideoState = defineStore('createVideo', {
        state: () => ({
            currentVideo: null,
            currentImage: null,
            imageBase64: '',
            title: '',
            progress: 0,
            statusVideo: 'create'
        }),
        actions: {
            removeVideo() {
                this.currentVideo = null
                this.currentImage = null
                this.imageBase64 = ''
                this.title = ''
                this.progress = 0
                this.statusVideo = 'create'
            },
            addVideo(video) {
                this.currentVideo = video
            },
            addImageBase64(base64){
                this.imageBase64 = base64
            },
            addImage(image){
                this.currentImage = image
            },
            updateProgress(value){
                this.progress = value
            },
            removeImage(){
                this.currentImage = null
                this.imageBase64 = ''
            },
            async publishVideo(){
                this.statusVideo = 'pending'
                this.progress = 0
                if(this.currentVideo && this.currentImage && this.title){
                    try {
                        const form = new FormData()
                        form.append('title',this.title)
                        form.append('video',this.currentVideo)
                        form.append('image',this.currentImage)

                        await axios.post('api/video',form, {
                            headers: {
                                'Content-Type': 'multipart/form-data'
                            },
                            onUploadProgress: progressEvent => {
                                const result =  Math.round(
                                    (progressEvent.loaded / progressEvent.total) * 100
                                );
                                this.progress = result
                                console.log(result)
                            }
                        })
                        this.statusVideo = 'success'
                    }catch (e){
                        this.statusVideo = 'create'
                        console.log(e)
                    }

                }
            }
        }
    }
)
