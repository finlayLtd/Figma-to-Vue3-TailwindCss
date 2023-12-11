<template>
  <div class="max-w-[1046px] mx-auto">
    <div>
      <p>
        <span
          class="opacity-50 text-primary-50 dark:text-white lg:text-base text-[15px] font-normal leading-[115%]"
          >Settings /</span
        ><span
          class="text-primary dark:text-white lg:text-base text-[15px] font-medium leading-[115%]"
        >
          Notifications</span
        >
      </p>
      <h2
        class="text-primary dark:text-white lg:text-3xl text-[24px] font-bold leading-[115%] tracking-[0.3px] lg:my-4 my-3.5"
      >
        Notifications
      </h2>
    </div>

    <SettingTab :active="2" />

    <div class="lg:p-5 p-4 mt-5 bg-white dark:bg-white-5 rounded-[14px] [&>*]:mb-[25px] [&>*:last-child]:mb-0">

      <div class="flex justify-between items-center" v-for="i in 5">

        <div>
          <p class="text-primary dark:text-white text-[15px] font-medium leading-[100%] tracking-[0.15px]">Tickets</p>
          <p class="text-primary-50 dark:text-white-50 text-sm font-normal leading-[100%] tracking-[0.14px] mt-[7px]">Receive an email when you make a new sale.</p>
        </div>

        <label class="relative inline-flex items-center cursor-pointer">
          <input type="checkbox" value="" class="sr-only peer" checked />
          <div
          class="w-11 h-6 bg-gray-200 rounded-full dark:bg-white-8 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-[#0000000D] peer-checked:bg-blue"
          ></div>
        </label>
      </div>
    </div>
  </div>
</template>

<script setup>
import { Menu, MenuButton, MenuItem, MenuItems } from "@headlessui/vue";
import Btn from "../../components/Helper/Btn.vue";
import SettingTab from "./SettingTab.vue";
</script>
