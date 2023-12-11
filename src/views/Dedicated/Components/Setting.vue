<template>
    <div class="lg:p-5 p-4 dark:bg-white-5 border border-light-white-blue-8 bg-white rounded-[14px]">
        <div
        class="flex p-[3px] justify-center border rounded-[10px] border-solid border-light-white-gray dark:border-light-white-gray-8 bg-white-50 dark:bg-white-5"
      >
        <div
          class="flex w-full items-center justify-center lg:px-5 px-3 py-2 "
          :class="activeIpManagementTab == 0 ? 'bg-white rounded-[8px] shadow-gray-15 dark:bg-white-15 dark:shadow-light-15' : 'opacity-70'"
          @click="activeIpManagementTab = 0"
        >
          <p class="text-dark dark:text-white lg:text-[15px] text-[14px]  font-medium leading-6 min-w-fit">
            Change Password
          </p>
        </div>

        <img src="../../../assets/svgs/divider.svg" class="mx-1.5 dark:brightness-[100]" alt="" />

        <div class="flex items-center justify-center lg:px-5 px-3 py-2 w-full" @click="activeIpManagementTab = 1" :class="activeIpManagementTab == 1 ? 'bg-white rounded-[8px] shadow-gray-15 dark:bg-white-15 dark:shadow-light-15' : 'opacity-70'">
          <p class="text-dark dark:text-white lg:text-[15px] text-[14px]  font-medium leading-6 min-w-fit">
            Change Hostname
          </p>
        </div>
      </div>

      <div class="lg:mt-[25px] mt-5" v-if="activeIpManagementTab == 0">
        <p class="text-secondary dark:text-white lg:text-[15px] text-[14px]  font-medium leading-[140%]">Change Hostname</p>
        <p class="text-secondary-70 dark:text-white-70 lg:text-sm text-[13px]  font-normal leading-[140%] mt-[5px]">New server password</p>

        <input type="password" placeholder="Minimum 8 character" class="lg:py-2.5 py-2 px-3 max-w-[400px] w-full mt-3.5 border border-light dark:bg-white-5 dark:border-light-8 rounded-[8px] outline-0">
        
        <p class="mt-[25px] mb-3.5 text-secondary dark:text-white text-[15px]  font-medium leading-[140%]">Confirm new server password</p>
        <input type="password" placeholder="Minimum 8 character" class="lg:py-2.5 py-2 px-3 max-w-[400px] w-full border border-light dark:border-light-8 dark:bg-white-5 rounded-[8px] outline-0">
        <br>
        <Btn class="text-white max-w-[400px] w-full mt-[25px]" bgColor="bg-blue" border-color="border-blue">Change password</Btn>
      </div>
      <div class="mt-[28px]" v-if="activeIpManagementTab == 1">
        <p class="text-secondary dark:text-white lg:text-[15px] text-[14px]  font-medium leading-[140%]">Change Hostname</p>
        <p class="text-secondary-70 dark:text-white-70 lg:text-sm text-[13px]  font-normal leading-[140%] mt-[5px]">New hostname</p>

        <input type="text" placeholder="Minimum 8 character" class="lg:py-2.5 py-2 px-3 max-w-[400px] w-full border border-light dark:border-light-8 dark:bg-white-5 rounded-[8px] outline-0 mt-3.5">
        <br>
        <Btn class="text-white max-w-[400px] w-full mt-[25px]" bgColor="bg-blue" border-color="border-blue">Change Hostname</Btn>

        <p class="max-w-[900px] mt-5 text-secondary-70 dark:text-white-70 text-sm  font-normal leading-[140%]">If the extra bandwidth you order has decimals, this will be automatically rounded up. Example: You have 500GB extra bandwidth and you order an extra 2 TB, this will be rounded up to 3 TB</p>
      </div>
    </div>
</template>

<script setup>
  import Btn from "@/components/Helper/Btn.vue";
  import {ref} from 'vue'
  const activeIpManagementTab = ref(0)
</script>