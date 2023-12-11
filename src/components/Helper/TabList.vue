<template>
  <div
    class="flex [&>*:last-child>img]:hidden p-[3px] h-[38px] justify-center border rounded-[10px] border-solid border-light-white-gray w-fit bg-white-50 dark:border-light-white-gray-8 dark:bg-light-white-gray-8"
  >
    
    <div class="flex lg:w-auto w-full" v-for="(tab, index) in tabList">
      <div class="flex items-center justify-center lg:px-3 px-2.5 py-[7.5px] w-full cursor-pointer" :class=" index == activeTab ? 'bg-white dark:bg-white-15 rounded-[8px] shadow-gray-15 font-medium dark:shadow-light-15 text-dark' : 'font-normal text-[#1F2022B8]'" @click="activeTab = index , $emit('updateTab',index)">
        <p
          class=" xsm:text-[14px] dark:text-white lg:text-[15px]  leading-[115%] min-w-max"
          :class="tabList.length > 3 ? 'text-[11.5px]': 'text-[14px]'"
        >
          {{ tab }}
        </p>
      </div>

      <img src="../../assets/svgs/divider.svg" class="mx-1.5 my-1.5 dark:brightness-[100]" alt="Divider" />
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
const activeTab = ref(0)
const props = defineProps({
  tabList: {
    default: ["All", "Active", "Suspenaded", "Attracted"],
  },
});
</script>
