<template>
  <Menu as="div" class="relative inline-block text-left lg:px-0 px-4">
    <div>
      <MenuButton
        class="inline-flex w-full justify-center gap-x-1.5 rounded-md text-sm font-semibold text-gray-900 shadow-sm lg:mt-0 lg:w-[128px]"
      >
        <Btn
          class="flex items-center justify-between w-full dark:bg-white-5 dark:border-light-8"
        >
          <p
            class="text-primary dark:text-white lg:text-[15px] text-[14px]  font-medium leading-6"
          >
            All types
          </p>
          <img
            src="../../assets/svgs/dropdown.svg"
            class="ml-[5px] dark:hidden block"
            alt="Dropdown"
          />
          <img
            src="../../assets/svgs/dropdown-white.svg"
            class="ml-[5px] dark:block hidden"
            alt="Dropdown"
          />
        </Btn>
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
        class="absolute left-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white dark:bg-[#323235] max-w-[150px] shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
      >
        <div class="py-1">
          <slot />
        </div>
      </MenuItems>
    </transition>
  </Menu>
</template>

<script setup>
      import { Menu, MenuButton, MenuItem, MenuItems } from "@headlessui/vue";
      import Btn from "../../components/Helper/Btn.vue";

</script>
