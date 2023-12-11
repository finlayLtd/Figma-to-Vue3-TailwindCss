<template>
  <div>
    <div class="w-fit rounded-[8px] border border-light dark:border-light-8 py-2 px-3 mb-5">
      <img src="../../assets/svgs/windows-dark-blue.svg" alt="Window" />
    </div>

    <div class="lg:flex block items-center justify-between">
      <div>
        <p>
          <span
            class="opacity-50 text-primary-50 dark:text-white lg:text-base text-[15px]  font-normal leading-[115%]"
            >Servers /</span
          ><span
            class="text-primary dark:text-white lg:text-base text-[15px]  font-medium leading-[115%]"
          >
            Papa-efyu-01.evoxt.com</span
          >
        </p>
        <h2
          class="text-primary dark:text-white lg:text-3xl text-[24px]  font-bold leading-[115%] tracking-[0.3px] lg:my-4 my-3.5"
        >
          Papa-efyu-01.evoxt.com
        </h2>
        <p
          class="text-primary-70 dark:text-white-70  lg:text-base text-[15px]  font-medium leading-[115%]"
        >
          Created 14 minuted ago
        </p>
      </div>
      <Btn
        bg-color="bg-[#FD323214]"
        btn-padding="py-[11px] px-3 lg:mt-0 mt-5"
        rounded="rounded-none"
        border-color="border-none"
      >
        <div class="flex items-center">
          <img src="../../assets/svgs/sutedown.svg" alt="Window" />
          <p
            class="text-danger text-right text-[15.5px]  font-medium leading-[115%] ml-2"
          >
            Shutdown
          </p>
        </div>
      </Btn>
    </div>
  </div>
  <div class="mt-[60px]">
    <Tab @updateTab="(tab) => activeOverviweTab = tab"/>
    <div class="mt-[25px]">
        <Overview v-if="activeOverviweTab == 0"/>
        <Analytics v-if="activeOverviweTab == 1" />
        <Connect v-else-if="activeOverviweTab == 2"/>
        <Reinstall v-else-if="activeOverviweTab == 3" />
        <AddressManagement v-else-if="activeOverviweTab == 4" />
        <Vnc v-else-if="activeOverviweTab == 5" />
        <Billing v-else-if="activeOverviweTab == 6" />
        <Setting v-else-if="activeOverviweTab == 7" />
    </div>
  </div>
</template>

<script setup>
import { ref } from "vue";
import Btn from "@/components/Helper/Btn.vue";
import Tab from './Components/Tab.vue'
import Overview from "./Components/ServerOverview.vue";
import AddressManagement from './Components/AddressManagement.vue'
import Setting from "./Components/Setting.vue";
import Vnc from "./Components/Vnc.vue";
import Billing from './Components/Billing.vue'
import Connect from "./Components/Connect.vue"
import Reinstall from "./Components/Reinstall.vue"
import Analytics from "./Components/Analytics.vue";
const activeOverviweTab = ref(0);
</script>

<style scoped>
.tabUl::-webkit-scrollbar {
  display: none;
}
</style>
