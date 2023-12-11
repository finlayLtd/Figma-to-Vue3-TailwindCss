import { createRouter, createWebHistory } from "vue-router";


const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: "/",
      name: "home",
      component:() => import('../views/Home.vue'),
    },
    {
      path: "/dedicated",
      name: "DedicatedLanding",
      component:() => import('../views/Dedicated.vue')
    },
    {
      path: "/help",
      name: "Help",
      component:() => import('../views/Help.vue')
    },
    {
      path: "/blog",
      name: "Blog",
      component:() => import('../views/Blog.vue')
    },
    {
      path: "/glass",
      name: "Glass",
      component:() => import('../views/Glass.vue')
    },
    {
      path: "/policy",
      name: "Policy",
      component:() => import('../views/Policy.vue')
    },
    {
      path: "/blog/:id",
      name: "BlogSingle",
      component:() => import('../views/BlogSingle.vue')
    },
    {
      path: "/about",
      name: "About",
      component:() => import('../views/About.vue')
    },
    {
      path: "/abuse",
      name: "Abuse",
      component:() => import('../views/Abuse.vue')
    },
    {
      path: '/login',
      name: 'Login',
      component:() => import('../views/auth/Login.vue')
    },
    {
      path: '/signup',
      name: 'Signup',
      component:() => import('../views/auth/Signup.vue')
    },

    {
      path: '/reset',
      name: 'Reset',
      component:() => import('../views/auth/Reset.vue')
    },

    {
      path: '/changepassword',
      name: 'ChangePassword',
      component:() => import('../views/auth/ChangePassword.vue')
    },

    {
      path: "/app",
      // name: "Dashbord",
      component:() => import('../views/layout/index.vue'),
      children : [
        {
          path : '',
          name : 'Dashboard',
          component :() =>  import('../views/Dashbord/index.vue'),
          meta:{
            headerName:'Dashboard'
          }
        },
        {
          path : 'dedicated',
          name : 'Dedicated',
          component : () => import('../views/Dedicated/index.vue'),
          meta:{
            headerName:'Dedicated Server'
          }
        },
        {
          path : 'dedicated/details',
          name : 'Dedicated Detail',
          component : () => import('../views/Dedicated/Details.vue'),
          meta:{
            headerName:'Dedicated Server'
          }
        },
        {
          path : 'invoices',
          name : 'Invoices',
          component : () => import('../views/Invoices/index.vue'),
          meta:{
            headerName:'Invoices'
          }
        },
        {
          path : 'support',
          name : 'Support',
          component : () => import('../views/Support/index.vue'),
          meta:{
            headerName:'Support'
          }
        },
        {
          path : 'support/chat',
          name : 'SupportChat',
          component : () => import('../views/Support/Chat.vue'),
          meta:{
            headerName:'Support'
          }
        },
        {
          path : 'settings',
          name : 'Settings',
          component : () => import('../views/Settings/index.vue'),
          meta:{
            headerName:'Settings',
            isNanoSidebar : true
          }
        },
        {
          path : 'settings/security',
          name : 'SettingsSecurity',
          component : () => import('../views/Settings/Security.vue'),
          meta:{
            headerName:'Settings',
            isNanoSidebar : true
          }
        },
        {
          path : 'settings/notification',
          name : 'SettingsNotification',
          component : () => import('../views/Settings/Notification.vue'),
          meta:{
            headerName:'Settings',
            isNanoSidebar : true
          }
        },
        {
          path : 'settings/identify',
          name : 'SettingsIdentify',
          component : () => import('../views/Settings/Identify.vue'),
          meta:{
            headerName:'Settings',
            isNanoSidebar : true
          }
        },
        {
          path : 'cloud',
          name : 'Cloud',
          component : () => import('../views/Cloud/index.vue'),
          meta:{
            headerName:'Cloud'
          }
        },
        {
          path : 'domain',
          name : 'Domain',
          component : () => import('../views/Domain/index.vue'),
          meta:{
            headerName:'Domain'
          }
        },
        {
          path : 'domain/details',
          name : 'Domain Detail',
          component : () => import('../views/Domain/Details.vue'),
          meta:{
            headerName:'Domain Server'
          }
        },
        {
          path : 'webhost',
          name : 'WebHost',
          component : () => import('../views/WebHost/index.vue'),
          meta:{
            headerName:'WebHost'
          }
        },
        {
          path : 'webhost/details',
          name : 'WebHost Detail',
          component : () => import('../views/WebHost/Details.vue'),
          meta:{
            headerName:'WebHost Server'
          }
        },
        {
          path : 'vps',
          name : 'VPS',
          component : () => import('../views/NewVps/index.vue'),
          meta:{
            headerName:'VPS'
          }
        },
        {
          path : 'newdedicated',
          name : 'Newdedicated',
          component : () => import('../views/NewDedicated/index.vue'),
          meta:{
            headerName:'Newdedicated'
          }
        },
        {
          path : 'newdomain',
          name : 'Newdomain',
          component : () => import('../views/NewDomain/index.vue'),
          meta:{
            headerName:'Newdomain'
          }
        },
        {
          path : 'sharedwebhost',
          name : 'SharedWebhost',
          component : () => import('../views/Sharedwebhost/index.vue'),
          meta:{
            headerName:'Webhost'
          }
        },
      ]
    },
    {
      path: "/about",
      name: "about",
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import("../views/AboutView.vue"),
    },
  ],
});

export default router;
