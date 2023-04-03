<template>
    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
            <div class="p-4">
                <div class="md:grid md:grid-cols-3 md:gap-6 bg-white md:bg-transparent">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Videos</h3>
                            <p class="mt-1 text-sm text-gray-600">Basic video information</p>
                        </div>
                    </div>
                    <div class="mt-5 md:col-span-2 md:mt-0">
                        <form data-qa="form_video_create" @submit.prevent="store" method="POST">
                            <div class="shadow sm:overflow-hidden sm:rounded-md">
                                <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                                    <div>
                                        <label for="title"
                                               class="block text-sm font-medium text-gray-700">Title</label>
                                        <div class="mt-1">
                                            <input required id="title" name="title" type="text" v-model="video.title"
                                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2"
                                                   placeholder="Video Title">
                                        </div>
                                        <p class="mt-2 text-sm text-gray-500">Short title for our video.</p>
                                    </div>
                                    <div>
                                        <label for="description"
                                               class="block text-sm font-medium text-gray-700">Description</label>
                                        <div class="mt-1">
                                                    <textarea required id="description" v-model="video.description" name="description" rows="3"
                                                              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                                              placeholder="Description"></textarea>
                                        </div>
                                        <p class="mt-2 text-sm text-gray-500">Description with a short summary of the video.</p>
                                    </div>

                                    <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                            <label for="url"
                                                   class="block text-sm font-medium text-gray-700">URL</label>
                                            <div class="mt-1 flex rounded-md shadow-sm">
                                                <span
                                                    class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-sm text-gray-500">http://</span>
                                                <input required type="url" name="url" id="url" v-model="video.url"
                                                       class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                                       placeholder="www.example.com">
                                            </div>
                                            <p class="mt-2 text-sm text-gray-500">Video link.</p>

                                        </div>
                                    </div>
                                </div>
                                <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                                    <button type="submit"
                                            class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                        Create
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
import bus from '../bus.js'
export default {
    name: "VideoForm",
    data(){
        return{
            video: {}
        }
    },
    methods: {
        store(){
            try {
                window.casteaching.video.create({
                    title: this.video.title,
                    description: this.video.description,
                    url: this.video.url
                })
                bus.$emit('created')
                bus.$emit('status','Video created successfully')
            }catch (error){ console.log(error);}


        }
    }
}
</script>

<style scoped>

</style>
