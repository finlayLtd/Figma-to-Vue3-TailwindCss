<template>
    <div class="lg:p-5 p-4 mb-[50px] dark:bg-white-5 border border-light-white-blue-8 bg-white rounded-[14px]">
        <div
        class="flex p-[3px] justify-center border rounded-[10px] border-solid border-light-white-gray dark:border-light-white-gray-8 bg-white-50 dark:bg-white-5"
      >
        <div
          class="flex w-full items-center justify-center px-5 py-2 "
          :class="activeIpManagementTab == 0 ? 'bg-white dark:bg-white-15 rounded-[8px] shadow-gray-15 dark:shadow-light-15' : 'opacity-70'"
          @click="activeIpManagementTab = 0"
        >
          <p class="text-dark dark:text-white lg:text-[15px] text-[14px]  font-medium leading-6">
            Assign IPv4
          </p>
        </div>

        <img src="../../../assets/svgs/divider.svg" class="mx-1.5 dark:brightness-[100]" alt="" />

        <div class="flex items-center justify-center px-5 py-2 w-full" @click="activeIpManagementTab = 1" :class="activeIpManagementTab == 1 ? 'bg-white dark:bg-white-15 rounded-[8px] shadow-gray-15 dark:shadow-light-15' : 'opacity-70'">
          <p class="text-dark dark:text-white lg:text-[15px] text-[14px]  font-medium leading-6">
            Swap IPv4
          </p>
        </div>
      </div>

      <div class="lg:mt-[25px] mt-5" v-if="activeIpManagementTab == 0">
        <p class="text-secondary dark:text-white lg:text-[15px] text-[14px]  font-medium leading-[140%]">IP Address Assignment</p>
        <p class="text-secondary-70 dark:text-white-70 lg:text-sm text-[13px]  font-normal leading-[140%] mt-[5px]">Assign floating IP address to VM</p>

        <hr class="my-5 opacity-70 dark:opacity-10">

        <p class="text-secondary dark:text-white text-[15px]  font-medium leading-[140%] mb-2.5">IP Address Assignment</p>

        <div class="py-3 px-3.5 flex justify-between border border-light dark:border-light-white-blue-8 rounded-[8px] h-[138px] overflow-hidden">
          <p class="text-secondary dark:text-white text-[15.5px]  font-medium leading-[140%] min-w-max">147.189.161.205</p>
          <p class="text-secondary dark:text-white text-[15.5px]  font-medium leading-[140%] min-w-max lg:mx-0 mx-6">Primary</p>
          <p class="text-secondary dark:text-white text-[15.5px]  font-medium leading-[140%] min-w-max">Main Server IP (Sticky) - Cannot be removed</p>
        </div>

        <hr class="my-5 opacity-70 dark:opacity-10">

        <p class="text-secondary dark:text-white lg:text-[15px] text-[14px]  font-medium leading-[140%] lg:mb-3.5 mb-3">Assign IP to server</p>

        <div class="py-2.5 px-3 max-w-[400px] w-full border border-light dark:border-light-white-blue-8 rounded-[8px] mb-[25px]">
          <select class="bg-transparent w-full outline-0 dark:text-white">
            <option value="papa-efyu-01.evoxt.com">papa-efyu-01.evoxt.com</option>
          </select>
        </div>

        <div class="flex items-center max-w-[400px] w-full">
          <Btn class="text-white w-full" bgColor="bg-blue" border-color="border-blue">Assign</Btn>
          <Btn class="w-full ml-2 min-w-fit" textColor="text-blue" borderColor="border border-blue-5" btnPadding="py-1.5 lg:px-4 px-[8.5px]" bgColor="bg-blue-5">Assign as Primary IP</Btn>
        </div>

        <p class="max-w-[900px] w-full text-secondary-70 dark:text-white-70 lg:text-sm text-[13px]  font-normal leading-[140%] mt-5">After Swapping IP address, our system will perform a reboot on your server, please make sure any temporary files are saved before performing IP assignment. This process will take around 3 minutes, please do not refresh this page.</p>
        <p class="text-blue text-[13px]  font-normal leading-[140%] lg:hidden block mt-[5px]">Click here to purchase Extra IP Address</p>

      </div>
      <div class="mt-[28px]" v-if="activeIpManagementTab == 1">
        <p class="text-secondary dark:text-white lg:text-[15px] text-[14px]  font-medium leading-[140%]">Swap IP</p>
        <p class="text-secondary-70 dark:text-white-70 lg:text-sm text-[13px]  font-normal leading-[140%] mt-[5px]">Swap the IP addresses of two virtual machines with each other</p>

        <hr class="my-5 opacity-70 dark:opacity-10">

        <p class="text-secondary dark:text-white lg:text-[15px] text-[14px]  font-medium leading-[140%] mb-2.5">Server 1</p>

        <div class="py-2.5 px-3 max-w-[400px] w-full border border-light dark:border-light-white-blue-8 rounded-[8px] mb-[25px]">
          <select class="bg-transparent w-full outline-0 dark:text-white">
            <option value="papa-efyu-01.evoxt.com">papa-efyu-01.evoxt.com</option>
          </select>
        </div>

        <p class="text-secondary dark:text-white text-[15px]  font-medium leading-[140%] mb-2.5">Server 2</p>

        <div class="py-2.5 px-3 max-w-[400px] w-full border border-light dark:border-light-white-blue-8 rounded-[8px] mb-[25px]">
          <select class="bg-transparent w-full outline-0 opacity-40 dark:text-white">
            <option value="papa-efyu-01.evoxt.com">Server</option>
          </select>
        </div>

        <Btn class="text-white max-w-[400px] w-full" bgColor="bg-blue" border-color="dark:border-blue">Swap IP</Btn>

        <p class="max-w-[900px] w-full text-secondary-70 dark:text-white-70 lg:text-sm text-[13px]  font-normal leading-[140%] mt-5">After Swapping IP address, our system will perform a reboot on your server, please make sure any temporary files are saved before performing IP assignment. This process will take around 3 minutes, please do not refresh this page.</p>

      </div>
    </div>
</template>

<script setup>
  import Btn from "@/components/Helper/Btn.vue";
  import {ref} from 'vue'
  const activeIpManagementTab = ref(0)
</script>