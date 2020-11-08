import Vue from 'vue'
import Vuex from 'vuex'

// import actions from './actions'
// import getters from './getters'
// import mutations from './mutations'
// import state from './state'

Vue.use(Vuex)

export default new Vuex.Store({
    // actions,
    // getters,
    // mutations,
    // state
    state: {
        event: {
            name: "",
            stared_at: "",
            ended_at: "",
            days: [],
        }
     },
     getters: {
        getEvent(state){
           return state.event
        },
        getErrors(state){
            return state.errors
        }
     },
     actions: {
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
     },
     mutations: {
        latestEvent(state,data) {
           return state.event = data
        },
     }
})
