<x-casteaching-layout>

    <button id="getVideos" type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
        GET VIDEOS
    </button>

    <script>
        document.getElementById('getVideos').addEventListener('click', async function (){
            try {
                const videos = await window.casteaching.videos()
                console.log(videos);
            } catch (err){
                console.log('ERROR:')
                console.log(err)
            }
        })
    </script>
</x-casteaching-layout>
