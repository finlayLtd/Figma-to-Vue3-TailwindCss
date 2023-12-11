export const sidebarModul = {
    namespaced : true , 

    state : () => {
        return {
            isSidebarOpen : false
        }
    } ,

    getters : {
        getSidebarOpen : (state) => {
            return state.isSidebarOpen
        } 
    },

    mutations : {
        setSidebarOpen : (state) => {
            state.isSidebarOpen = true
        },
        setSidebarClose : (state) => {
            state.isSidebarOpen = false
        }
    } , 

    actions : {
        set_sidebar_open :({commit}) => {
            commit('setSidebarOpen')
        } ,
        set_sidebar_close :({commit}) => {
            commit('setSidebarClose')
        } ,
    }
}