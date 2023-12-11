export const notifivctionModul = {
    namespaced : true , 

    state : () => {
        return {
            isNotificationEffect : false
        }
    } ,

    getters : {
        getNotificationOpen : (state) => {
            return state.isNotificationEffect
        } 
    },

    mutations : {
        setNotificationOpen : (state) => {
            state.isNotificationEffect = ! state.isNotificationEffect
        }
    } , 

    actions : {
        set_notification_open :({commit}) => {
            commit('setNotificationOpen')
        } ,
    }
}