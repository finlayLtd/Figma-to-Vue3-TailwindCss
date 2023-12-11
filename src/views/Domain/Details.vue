<template>
  <div>
    <div
      class="w-fit rounded-[8px] border border-light dark:border-light-8 py-2 px-3 mb-5"
    >
      <img src="../../assets/svgs/world-blue.svg" alt="Window" />
    </div>

    <div>
      <p>
        <span
          class="opacity-50 text-primary-50 dark:text-white lg:text-base text-[15px]  font-normal leading-[115%]"
          >Domain /</span
        ><span
          class="text-primary dark:text-white lg:text-base text-[15px]  font-medium leading-[115%]"
        >
          Serverly.com</span
        >
      </p>
      <h2
        class="text-primary dark:text-white lg:text-3xl text-[24px]  font-bold leading-[115%] tracking-[0.3px] lg:my-4 my-3.5"
      >
        <span class="text-[#15171c66] dark:text-[#ffffff66] font-medium"
          >Details:</span
        >
        serverly.com
      </h2>
    </div>
  </div>
  <div class="mt-[40px]">
    <Tab :tab-list="['Management', 'Operations', 'Contacts']" class="lg:w-fit w-full" @updateTab="(tabVal) => activeOverviweTab = tabVal" />
    <div class="mt-5">
      <Management v-if="activeOverviweTab == 0" />
      <Operations v-if="activeOverviweTab == 1" />
      <Contacts v-if="activeOverviweTab == 2" />
    </div>
  </div>
</template>

<script setup>
import { ref } from "vue";
import Tab from "../../components/Helper/TabList.vue";
import Management from "./components/Management.vue";
import Operations from "./components/Operations.vue";
import Contacts from "./components/Contacts.vue";
const activeOverviweTab = ref(0);
</script>

<style scoped>
.tabUl::-webkit-scrollbar {
  display: none;
}
</style>
