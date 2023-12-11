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
          General</span
        >
      </p>
      <h2
        class="text-primary dark:text-white lg:text-3xl text-[24px] font-bold leading-[115%] tracking-[0.3px] lg:my-4 my-3.5"
      >
        General
      </h2>
    </div>

    <SettingTab :active="0" />

    <div
      class="lg:mt-6 mt-5 mb-5 bg-white dark:bg-white-5 lg:p-5 p-4 rounded-[14px]"
    >
      <Menu as="div" class="relative inline-block text-left w-full">
        <div class="w-full">
          <MenuButton
            class="w-full rounded-md text-sm font-semibold text-gray-900"
          >
            <div
              class="py-2.5 px-3.5 w-full text-left flex items-center justify-between rounded-[8px] border border-[#E6E6E6] dark:border-light-8 dark:bg-white-5 shadow-light-white dark:shadow-light-black"
            >
              <div>
                <p
                  class="opacity-40 dark:text-white text-primary text-xs font-medium leading-[100%] tracking-[-0.12px]"
                >
                  Language
                </p>
                <div class="flex items-center justify-between mt-1.5">
                  <img
                    src="../../assets/svgs/flags/de.svg"
                    class="max-w-[16px] min-w-[16px]"
                    alt="Flag"
                  />
                  <p
                    class="text-primary dark:text-white ml-[5px] text-base font-medium leading-[100%] tracking-[-0.16px]"
                  >
                    English
                  </p>
                </div>
              </div>
              <img
                src="../../assets/svgs/drop-thin.svg"
                class="dark:brightness-[100]"
                alt="drop"
              />
            </div>
          </MenuButton>
        </div>

        <transition
          enter-active-class="transition ease-out duration-100"
          enter-from-class="transform opacity-0 scale-95"
          enter-to-class="transform opacity-100 scale-100"
          leave-active-class="transition ease-in duration-75"
          leave-from-class="transform opacity-100 scale-100"
          leave-to-class="transform opacity-0 scale-95"
        >
          <MenuItems
            class="absolute left-0 z-10 mt-2 w-full origin-top-right rounded-md bg-white dark:bg-[#323235] dark:border-light-8 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
          >
            <ul class="py-2.5 px-3.5">
              <li class="dark:text-white">English</li>
            </ul>
          </MenuItems>
        </transition>
      </Menu>
    </div>

    <div class="bg-white dark:bg-white-5 lg:p-5 p-4 rounded-[14px]">
      <div
        class="py-2.5 px-3.5 w-full text-left flex items-center justify-between rounded-[8px] border dark:bg-white-5 border-[#E6E6E6] dark:border-light-8 shadow-light-white dark:shadow-light-black"
      >
        <div>
          <p
            class="opacity-40 dark:text-white text-primary text-xs font-medium leading-[100%] tracking-[-0.12px]"
          >
            Old login
          </p>
          <p
            class="text-primary dark:text-white text-base font-medium leading-[100%] tracking-[-0.16px] mt-1.5"
          >
            Udodov
          </p>
        </div>
        <Btn bg-color="bg-blue-5" border-color="border-0" btn-padding="p-[5px]">
          <img src="../../assets/svgs/lock.svg" alt="lock" />
        </Btn>
      </div>
      <div
        class="py-2.5 px-3.5 my-2.5 w-full text-left rounded-[8px] border border-[#E6E6E6] dark:bg-white-5 dark:border-light-8 shadow-light-white dark:shadow-light-black"
      >
        <p
          class="opacity-40 text-primary dark:text-white text-xs font-medium leading-[100%] tracking-[-0.12px]"
        >
          New login
        </p>
        <p
          class="text-primary dark:text-white text-base font-medium leading-[100%] tracking-[-0.16px] mt-1.5"
        >
          Dmitry_Udodov
        </p>
      </div>

      <p
        class="opacity-50 text-primary dark:text-white lg:text-sm text-[13px] font-medium leading-[150%]"
      >
        You can change your username once every 30 days. Changing your username
        will also change you default shop name, therefore changing the URL with
        which your customers can see your Products. If you choose to change it,
        your old username will not be removed and it won't be available for
        other users.
      </p>

      <Btn
        class="text-white w-full lg:w-auto mt-[25px]"
        bg-color="bg-blue"
        border-color="border border-blue"
        >Change</Btn
      >
    </div>

    <div class="bg-white dark:bg-white-5 lg:p-5 p-4 mt-5 rounded-[14px]">
      <div
        class="py-2.5 px-3.5 my-2.5 w-full text-left rounded-[8px] border border-[#E6E6E6] dark:bg-white-5 dark:border-light-8 shadow-light-white dark:shadow-light-black"
      >
        <p
          class="opacity-40 dark:text-white text-primary text-xs font-medium leading-[100%] tracking-[-0.12px]"
        >
          Email
        </p>
        <p
          class="text-primary dark:text-white text-base font-medium leading-[100%] tracking-[-0.16px] mt-1.5"
        >
          serverly@gmail.com
        </p>
      </div>

      <p
        class="opacity-50 dark:text-white text-primary lg:text-sm text-[13px] font-medium leading-[150%]"
      >
        We will send you an email to your current email to verify the update, if
        you do not have access to your old email please contact us through a
        ticket.
      </p>

      <Btn
        class="w-full lg:w-auto mt-[25px]"
        bg-color="bg-blue-5 dark:bg-white-5"
        text-color="text-blue dark:text-white"
        border-color="border border-blue-5"
        >Send mail</Btn
      >
    </div>
  </div>
</template>

<script setup>
import { Menu, MenuButton, MenuItem, MenuItems } from "@headlessui/vue";
import Btn from "../../components/Helper/Btn.vue";
import SettingTab from './SettingTab.vue'
</script>
