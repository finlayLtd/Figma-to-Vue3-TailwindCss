export const thememodule = {
    namespaced : true , 

    state : () => {
        return {
            isDark : false
        }
    } ,

    getters : {
        getTheme : (state) => {
            return state.isDark
        } 
    },

    mutations : {
        setThemeDark : (state) => {
            state.isDark = true
        },
        setThemeLight : (state) => {
            state.isDark = false
        },
    } , 

    actions : {
        set_theme_dark :({commit}) => {
            commit('setThemeDark')
        } ,
        set_theme_light :({commit}) => {
            commit('setThemeLight')
        } ,
    }
}