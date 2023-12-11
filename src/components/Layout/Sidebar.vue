<template>
  <div class="h-full overflow-auto pb-0">
    <div
      class="lg:mx-0 mx-4 lg:shadow-none shadow-black-35 rounded-[12px] py-2 px-3 lg:p-0 bg-white backdrop-blur-[12.5px] dark:bg-[#252629e6] z-5 mb-2 lg:hidden block dark:border dark:border-white-8"
    >
      <div class="items-center flex py-[13px] px-3">
        <img
          src="../../assets/svgs/language.svg"
          class="mr-2 dark:hidden block"
          alt="Languange"
        />
        <img
          src="../../assets/svgs/language-white.svg"
          class="mr-2 dark:block hidden"
          alt="Languange"
        />
        <select class="bg-transparent dark:text-white w-full">
          <option value="english">English</option>
        </select>
      </div>
      <button
        class="py-[10px] px-3 flex items-center dark:text-white"
        @click="openNotification"
      >
        <img
          src="../../assets/svgs/ball.svg"
          class="dark:hidden block mr-3"
          alt="Ball"
        />
        <img
          src="../../assets/svgs/ball-white.svg"
          class="dark:block hidden mr-3"
          alt="Ball"
        />
        Notification
      </button>
    </div>

    <div class="flex h-full">
      <div
        class="lg:mx-0 mx-4 grow lg:shadow-none shadow-black-35  p-3 lg:px-4 backdrop-blur-[12.5px] dark:bg-[#252629e6] bg-white dark:border dark:lg:border-0 dark:lg:bg-transparent dark:border-white-8"
        :class="nanoSidebar ? 'lg:max-w-[76px] shadow-black-15' : ''"
        :style="nanoSidebar ? 'box-shadow: 0px 14px 10px 0px rgba(0, 0, 0, 0.15)' : ''"
      >
        <div v-for="(ul, index) in sidItem" :key="index">
          <ul>
            <li v-for="(li, ind) in ul" :key="ind">
              <router-link
                :to="li.link"
                class="flex items-center text-[#15171cb3] dark:text-white text-[15.5px] font-medium leading-[115%] px-3 py-2.5 mt-[3px] [&>img:nth-child(2)]:hidden [&>img:nth-child(3)]:hidden lg:[&>img:nth-child(1)]:block dark:[&>img:nth-child(1)]:hidden dark:[&>img:nth-child(2)]:hidden dark:[&>img:nth-child(3)]:block"
                :class="li.subRoutes.includes(router.name) ? 'router-link-exact-active' : ''"
                >
                <img :src="getImageUrl(li.icon)" class="mr-3" :alt="li.name" />
                <img
                  :src="getImageUrl(li.iconBlue)"
                  class="mr-3"
                  :alt="li.name"
                />
                <img
                  :src="getImageUrl(li.iconWhite)"
                  class="mr-3"
                  :alt="li.name"
                />
                <span :class="nanoSidebar ? 'lg:hidden' : ''">{{
                  li.name
                }}</span>
              </router-link>
            </li>
          </ul>

          <hr
            class="my-4 mx-2.5 dark:opacity-10"
            v-if="sidItem.length - 1 != index"
          />
        </div>
      </div>
      <div :class="nanoSidebar ? 'lg:block hidden' : 'hidden'" class="py-3 px-4 grow h-full" >
        <div v-for="(ul, index) in nanosidItem" :key="index">
          <ul>
            <li v-for="(li, ind) in ul" :key="ind">
              <router-link
                :to="li.link"
                class="flex items-center text-[#15171cb3] dark:text-white text-[15.5px] font-medium leading-[115%] px-3 py-2.5 mt-[3px] [&>img:nth-child(2)]:hidden [&>img:nth-child(3)]:hidden lg:[&>img:nth-child(1)]:block dark:[&>img:nth-child(1)]:hidden dark:[&>img:nth-child(2)]:hidden dark:[&>img:nth-child(3)]:block"
              >
                <img :src="getImageUrl(li.icon)" class="mr-3" :alt="li.name" />
                <img
                  :src="getImageUrl(li.iconBlue)"
                  class="mr-3"
                  :alt="li.name"
                />
                <img
                  :src="getImageUrl(li.icon)"
                  class="mr-3 dark:brightness-[100]"
                  :alt="li.name"
                />
                <span>{{
                  li.name
                }}</span>
              </router-link>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, computed } from "vue";
import { store } from "../../stores";
import { useRoute } from "vue-router";
const router = useRoute();

console.log(router.name);

const openNotification = () => {
  store.dispatch("notification/set_notification_open");
};

const props = defineProps({
  nanoSidebar: {
    default: false,
  },
});

const sidItem = ref([
  [
    {
      icon: "home.svg",
      iconBlue: "home-blue.svg",
      iconWhite: "home-white.svg",
      name: "Dashboard",
      link: { name: "Dashboard" },
      subRoutes : []
    },
    {
      icon: "file.svg",
      iconBlue: "file-blue.svg",
      iconWhite: "file-white.svg",
      name: "Invoices",
      link: { name: "Invoices" },
      subRoutes : []
    },
    {
      icon: "flag.svg",
      iconBlue: "flag-blue.svg",
      iconWhite: "flag-white.svg",
      name: "Support Area",
      link: { name: "Support" },
      subRoutes : ['SupportChat']
    },
    {
      icon: "setting.svg",
      iconBlue: "setting-blue.svg",
      iconWhite: "setting-white.svg",
      name: "Settings",
      link: { name: "Settings" },
      subRoutes : ['SettingsSecurity', 'SettingsNotification', 'SettingsIdentify']
    },
  ],
  [
    {
      icon: "cloud-server.svg",
      iconBlue: "cloud-server-blue.svg",
      iconWhite: "cloud-server-white.svg",
      name: "Cloud Servers",
      link: { name: "Cloud" },
      subRoutes : []
    },
    {
      icon: "server.svg",
      iconBlue: "server-blue.svg",
      iconWhite: "server-white.svg",
      name: "Dedicated Servers",
      link: { name: "Dedicated" },
      subRoutes : ['Dedicated Detail']
    },
    {
      icon: "www.svg",
      iconBlue: "www-blue.svg",
      iconWhite: "www-white.svg",
      name: "Domain",
      link: { name: "Domain" },
      subRoutes : ['Domain Detail']
    },
    {
      icon: "server4.svg",
      iconBlue: "server4-blue.svg",
      iconWhite: "server4-white.svg",
      name: "WebHost",
      link: { name: "WebHost" },
      subRoutes : ['WebHost Detail']
    },
  ],
  [
    {
      icon: "cloud-server-plus.svg",
      iconBlue: "cloud-server-plus-blue.svg",
      iconWhite: "cloud-server-plus-white.svg",
      name: "New VPS Cloud Server",
      link: { name: "VPS" },
      subRoutes : []
    },
    {
      icon: "dedicated-server-plus.svg",
      iconBlue: "dedicated-server-plus-blue.svg",
      iconWhite: "dedicated-server-plus-white.svg",
      name: "New Dedicated Server",
      link: { name: "Newdedicated" },
      subRoutes : []
    },
  ],
  [
    {
      icon: "www-plus.svg",
      iconBlue: "www-plus-blue.svg",
      iconWhite: "www-plus-white.svg",
      name: "New Domain",
      link: { name: "Newdomain" },
      subRoutes : []
    },
    {
      icon: "server-plus.svg",
      iconBlue: "server-plus-blue.svg",
      iconWhite: "server-plus-white.svg",
      name: "New Shared Webhost",
      link: { name: "SharedWebhost" },
      subRoutes : []
    },
  ],
]);

const nanosidItem = ref([
  [
    {
      icon: "general.svg",
      iconBlue: "general-blue.svg",
      iconWhite: "home-white.svg",
      name: "General",
      link: { name: "Settings" },
    },
    {
      icon: "security-side.svg",
      iconBlue: "security-side-blue.svg",
      iconWhite: "file-white.svg",
      name: "Security",
      link: { name: "SettingsSecurity" },
    },
    {
      icon: "notification.svg",
      iconBlue: "notification-blue.svg",
      iconWhite: "flag-white.svg",
      name: "Notification",
      link: { name: "SettingsNotification" },
    },
    {
      icon: "identify.svg",
      iconBlue: "identify-blue.svg",
      iconWhite: "setting-white.svg",
      name: "Identify",
      link: { name: "SettingsIdentify" },
    },
  ],
]);

const getImageUrl = (name) => {
  return new URL(`../../assets/svgs/dashbord/${name}`, import.meta.url).href;
};
</script>

<style scoped>
.router-link-exact-active {
  @apply lg:text-blue dark:lg:text-white text-[15.5px]  font-medium leading-[115%] lg:bg-blue-5 dark:lg:bg-blue rounded-[8px] bg-blue text-white;
}

.router-link-exact-active {
  @apply [&>img:nth-child(1)]:hidden lg:[&>img:nth-child(2)]:block dark:lg:[&>img:nth-child(2)]:hidden lg:[&>img:nth-child(3)]:hidden dark:lg:[&>img:nth-child(3)]:block [&>img:nth-child(3)]:block;
}
</style>
