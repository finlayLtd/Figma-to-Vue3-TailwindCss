import {thememodule} from './theme'
import { createStore } from 'vuex'
import createPersisted from 'vuex-persistedstate'
import {notifivctionModul }from './notification'
import {sidebarModul }from './sidebar'
const createPersist = createPersisted(
    {
        paths  : ['theme']
    }
)

export const store = createStore(
    {
        modules : {
            theme : thememodule,
            notification : notifivctionModul,
            sidebar : sidebarModul
        } , 

        plugins : [createPersist]
    }
)       