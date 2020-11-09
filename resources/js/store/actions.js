export default {
    latestEventFromDatabase(context){
        axios.get("api/v1/events/latest")
             .then((response)=>{
                context.commit("latestEvent", response.data)
             })
             .catch((error)=>{
             //    console.log(error.response.data)
             })
     },
     createNewEvent(context, data){
         return new Promise((resolve, reject) => {
             axios.post('/api/v1/events', data).then(response => {
                     resolve(response)
                     context.commit("latestEvent", response.data)
                 }, (error)=>{
                     reject(error)
                 })
         })
     }
}
