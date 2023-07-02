import {defineStore} from "pinia";

export const useCreateVideoState = defineStore('createVideo', {
        state: () => ({
            currentVideo: null,
            currentImage: null,
            imageBase64: '',
            title: '',
            progress: 0
        }),
        actions: {
            removeVideo() {
                this.currentVideo = null
                this.currentImage = null
                this.imageBase64 = ''
                this.title = ''
                this.progress = 0
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
                this.progress = 0
                if(this.currentVideo && this.currentImage && this.title){
                    try {
                        const form = new FormData()
                        form.append('title',this.title)
                        form.append('video',this.currentVideo)
                        form.append('image',this.currentImage)

                        const { data } = await axios.post('api/video',form, {
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
                        console.log(data)
                    }catch (e){
                        console.log(e)
                    }

                }
            }
        }
    }
)
