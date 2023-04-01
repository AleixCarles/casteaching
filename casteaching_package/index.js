import axios from 'axios'


const apiClient = axios.create({
    baseURL: 'http://casteaching.test/api',
    withCredentials: false,
    headers: {
        Accept: 'application/json',
        'Content-Type': 'application/json'
    }
})

export default {
    videos: async function (){
        console.log('prova');
        const response = await apiClient.get('/videos')
        return response.data
    },

    video: {
        show: async function (id){
            console.log('prova');
            const response = await apiClient.get('/videos/' + id)
            return response.data
        },
        create: async function (){
            console.log('prova');
            const response = await apiClient.post('/videos',data)
            return response.data
        },
        update: async function (){
            console.log('prova');
            const response = await apiClient.put('/videos/' + id,data)
            return response.data
        },
        destroy: async function (){
            console.log('prova');
            const response = await apiClient.delete('/videos' + data)
            return response.data
        }
    }
}
