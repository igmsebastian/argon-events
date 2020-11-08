export default {
    getLatestEvent(commit){
        axios.get('/api/events').then(response =>{
            commit('updateEvent', response.data)
        })
    },
    createNewEvent(commit, data){
        axios.post('/api/events', data).then(response =>{
            commit('updateEvent', response.data)
        })
    }
}
