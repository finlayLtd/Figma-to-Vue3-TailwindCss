<template>
  <Dashnavbar />
  <section class="lg:flex block relative bg-light-white dark:bg-[#1C1D20]" :class="!isSidebarOpen ? '' : 'lg:h-auto h-screen'">
    <Sidebar :nanoSidebar="isNanoSidebar" class=" w-full h-screen pt-[80px] lg:sticky fixed top-0 bg-transparent lg:bg-white dark:lg:bg-[#1A1A1D] z-10 lg:block scroll-smooth" :class="[!isSidebarOpen ? 'hidden' : '', isNanoSidebar ? 'lg:max-w-[288px] max-w-full min-w-[288px]' : 'lg:max-w-[256px] max-w-full min-w-[256px]']"/>
    <div class="pt-[66px] min-h-screen w-full  px-4" :class="[!isSidebarOpen ? '' : 'h-screen lg:h-full pointer-events-none overflow-hidden' ,isNanoSidebar ? 'lg:max-w-[calc(100vw-288px)] max-w-full lg:min-w-[calc(100vw-288px)] min-w-full' : 'lg:max-w-[calc(100vw-266px)] max-w-full lg:min-w-[calc(100vw-266px)] min-w-full']">
      <div class="h-full lg:block max-w-[1390px]  w-full mx-auto lg:pt-[60px] 2xl:pb-0 py-[50px]">
        <router-view></router-view>
      </div>
    </div>
  </section>
</template>

<script setup>
import Dashnavbar from "@/components/Layout/Dashnavbar.vue";
import Sidebar from "@/components/Layout/Sidebar.vue";
import { useRouter } from 'vue-router';
import { computed , onMounted } from "vue";
import { store } from "../../stores";
const isSidebarOpen = computed(() => store.getters['sidebar/getSidebarOpen'])
const router = useRouter()
const isNanoSidebar = computed(() => router.currentRoute.value.meta?.isNanoSidebar ? router.currentRoute.value.meta.isNanoSidebar : false)

onMounted(() => {
  store.dispatch('sidebar/set_sidebar_close')
}),

router.beforeEach(() => {
  store.dispatch('sidebar/set_sidebar_close')
})
</script>
