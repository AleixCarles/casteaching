<template>
    <div>
        <a class="text-indigo-600 hover:text-indigo-900 cursor-pointer"
        @click="remove">Delete</a>
    </div>
</template>

<script>
export default {
    name: "VideoDeleteLink",
    props: {
        video: {
            type: Object,
            required: true
        }
    },
    methods: {
        async remove(){
            this.videos = await window.casteaching.video.destroy(this.video.id)

        }
    }
}
</script>

<style scoped>

</style>
