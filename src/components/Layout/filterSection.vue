<template>
    <div class="px-5 py-3.5 items-center justify-between 2xl:flex hidden">
      <h5
        class="text-primary dark:text-white text-lg  font-medium lg:leading-[normal] leading-[0.24px] tracking-[0.18px]"
      >
        {{ title }}
      </h5>
  
      <div class="flex items-center justify-between">
        <Menu as="div" class="relative inline-block text-left ml-2.5">
          <div>
            <MenuButton
              class="inline-flex w-full justify-center gap-x-1.5 rounded-md text-sm font-semibold text-gray-900 shadow-sm lg:mt-0 lg:w-[128px]"
            >
              <Btn class="flex items-center justify-between w-full dark:bg-white-5 dark:border-light-8">
                <p
                  class="text-primary dark:text-white text-[15px]  font-medium leading-6"
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
              class="absolute left-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
            >
              <div class="py-1">
                <MenuItem v-slot="{ active }">
                  <a
                    href="#"
                    :class="[
                      active ? 'bg-gray-100 text-gray-900' : 'text-gray-700',
                      'block px-4 py-2 text-sm',
                    ]"
                    >Account settings</a
                  >
                </MenuItem>
                <MenuItem v-slot="{ active }">
                  <a
                    href="#"
                    :class="[
                      active ? 'bg-gray-100 text-gray-900' : 'text-gray-700',
                      'block px-4 py-2 text-sm',
                    ]"
                    >Support</a
                  >
                </MenuItem>
                <MenuItem v-slot="{ active }">
                  <a
                    href="#"
                    :class="[
                      active ? 'bg-gray-100 text-gray-900' : 'text-gray-700',
                      'block px-4 py-2 text-sm',
                    ]"
                    >License</a
                  >
                </MenuItem>
                <form method="POST" action="#">
                  <MenuItem v-slot="{ active }">
                    <button
                      type="submit"
                      :class="[
                        active ? 'bg-gray-100 text-gray-900' : 'text-gray-700',
                        'block w-full px-4 py-2 text-left text-sm',
                      ]"
                    >
                      Sign out
                    </button>
                  </MenuItem>
                </form>
              </div>
            </MenuItems>
          </transition>
        </Menu>
  
        <div
          class="flex p-[3px] h-[38px] justify-center border rounded-[10px] border-solid border-light-white-gray w-fit bg-white-50 dark:border-light-white-gray-8 dark:bg-light-white-gray-8  mx-4"
        >
          <div
            class="flex items-center justify-between px-3 py-[7.5px] bg-white dark:bg-white-15 rounded-[8px] shadow-gray-15 dark:shadow-light-15"
          >
            <p
              class="text-dark dark:text-white text-[15px]  font-medium leading-[115%]"
            >
              All
            </p>
          </div>
  
          <img src="../../assets/svgs/divider.svg" class="mx-1.5" alt="" />
  
          <div class="flex items-center justify-between px-3 py-[7.5px]">
            <p
              class="text-dark dark:text-white text-[15px]  font-medium leading-[115%]"
            >
              Active
            </p>
          </div>
  
          <img src="../../assets/svgs/divider.svg" class="mx-1.5" alt="" />
  
          <div class="flex items-center justify-between px-3 py-[7.5px]">
            <p
              class="text-dark dark:text-white text-[15px]  font-medium leading-[115%]"
            >
              Suspenaded
            </p>
          </div>
          <img src="../../assets/svgs/divider.svg" class="mx-1.5" alt="" />
  
          <div class="flex items-center justify-between px-3 py-[7.5px]">
            <p
              class="text-dark dark:text-white text-[15px]  font-medium leading-[115%]"
            >
              Attracted
            </p>
          </div>
        </div>
  
        <div
          class="flex h-[38px] justify-center items-center border shadow-gray-5 rounded-lg border-solid dark:border-light-8 border-light px-3 py-2 mr-4"
        >
          <img
            src="../../assets/svgs/search.svg"
            class="ml-[5px] dark:hidden block"
            alt="Dropdown"
          />
          <img
            src="../../assets/svgs/search-white.svg"
            class="ml-[5px] dark:block hidden"
            alt="Dropdown"
          />
  
          <input
            type="search"
            class="h-full w-full bg-transparent outline-0 ml-2.5"
            placeholder="Search"
          />
        </div>
  
        <Btn
          bg-color="bg-blue"
          text-color="text-white"
          border-color="border border-blue"
          class="flex items-center text-[15px] font-medium"
        >
          Create server
          <img src="../../assets/svgs/plus-blue.svg" class="ml-1.5" alt="Plus" />
        </Btn>
      </div>
    </div>
  
    <div class="px-4 py-3.5 2xl:hidden block">
      <div class="flex items-center justify-between">
        <h5
          class="text-primary dark:text-white text-[16px]  font-medium leading-[normal] tracking-[0.18px] min-w-fit mr-2.5"
        >
          Dedicated Server List
        </h5>
  
        <div
          class="flex h-[38px] justify-center items-center border shadow-gray-5 rounded-lg border-solid border-light dark:border-light-8 px-2.5 py-[7px]"
        >
          <img src="../../assets/svgs/search.svg" class="dark:hidden block" alt="Dropdown" />
          <img src="../../assets/svgs/search-white.svg" class="dark:block hidden" alt="Dropdown" />
  
          <input
            type="search"
            class="h-full w-full bg-transparent outline-0 ml-2.5 text-[14px]"
            placeholder="Search"
          />
        </div>
      </div>
  
      <div class="lg:flex block items-center justify-between">
        <Menu
          as="div"
          class="relative inline-block text-left lg:mt-0 mt-2.5 lg:w-fit w-full"
        >
          <div>
            <MenuButton
              class="inline-flex w-full justify-center gap-x-1.5 rounded-md text-sm font-semibold text-gray-900 shadow-sm lg:mt-0 lg:w-[128px]"
            >
              <Btn class="flex items-center justify-between w-full dark:bg-white-5 dark:border-light-8">
                <p
                  class="text-primary text-[14px]  font-medium leading-[22px] dark:text-white"
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
              class="absolute left-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
            >
              <div class="py-1">
                <MenuItem v-slot="{ active }">
                  <a
                    href="#"
                    :class="[
                      active ? 'bg-gray-100 text-gray-900' : 'text-gray-700',
                      'block px-4 py-2 text-sm',
                    ]"
                    >Account settings</a
                  >
                </MenuItem>
                <MenuItem v-slot="{ active }">
                  <a
                    href="#"
                    :class="[
                      active ? 'bg-gray-100 text-gray-900' : 'text-gray-700',
                      'block px-4 py-2 text-sm',
                    ]"
                    >Support</a
                  >
                </MenuItem>
                <MenuItem v-slot="{ active }">
                  <a
                    href="#"
                    :class="[
                      active ? 'bg-gray-100 text-gray-900' : 'text-gray-700',
                      'block px-4 py-2 text-sm',
                    ]"
                    >License</a
                  >
                </MenuItem>
                <form method="POST" action="#">
                  <MenuItem v-slot="{ active }">
                    <button
                      type="submit"
                      :class="[
                        active ? 'bg-gray-100 text-gray-900' : 'text-gray-700',
                        'block w-full px-4 py-2 text-left text-sm',
                      ]"
                    >
                      Sign out
                    </button>
                  </MenuItem>
                </form>
              </div>
            </MenuItems>
          </transition>
        </Menu>
  
        <div
          class="flex p-[3px] h-[38px] justify-center border rounded-[10px] border-solid border-light-white-gray dark:border-light-white-gray-8  w-full bg-white-50 dark:bg-light-white-gray-8 my-2.5 lg:w-fit"
        >
          <div
            class="flex items-center justify-between px-2.5 py-[7.5px] bg-white dark:bg-white-15 rounded-[8px] shadow-gray-15 dark:shadow-light-15"
          >
            <p
              class="text-dark dark:text-white text-[14px]  font-medium leading-[16.1px] max-[360px]:text-[12.5px]"
            >
              All
            </p>
          </div>
  
          <img
            src="../../assets/svgs/divider.svg"
            class="mx-1.5 my-[7.5px] dark:hidden block"
            alt=""
          />
          <img
            src="../../assets/svgs/divider-white.svg"
            class="mx-1.5 my-[7.5px] dark:block hidden"
            alt=""
          />
  
          <div class="flex items-center justify-between px-2.5 py-[7.5px]">
            <p
              class="text-dark dark:text-white text-[14px]  font-medium leading-[16.1px] max-[360px]:text-[12.5px]"
            >
              Active
            </p>
          </div>
  
          <img
            src="../../assets/svgs/divider.svg"
            class="mx-1.5 my-[7.5px] dark:hidden block"
            alt=""
          />
          <img
            src="../../assets/svgs/divider-white.svg"
            class="mx-1.5 my-[7.5px] dark:block hidden"
            alt=""
          />
  
          <div class="flex items-center justify-between px-2.5 py-[7.5px]">
            <p
              class="text-dark dark:text-white text-[14px]  font-medium leading-[16.1px] max-[360px]:text-[12.5px]"
            >
              Suspenaded
            </p>
          </div>
          <img
            src="../../assets/svgs/divider.svg"
            class="mx-1.5 my-[7.5px] dark:hidden block"
            alt=""
          />
          <img
            src="../../assets/svgs/divider-white.svg"
            class="mx-1.5 my-[7.5px] dark:block hidden"
            alt=""
          />
  
          <div class="flex items-center justify-between px-2.5 py-[7.5px]">
            <p
              class="text-dark dark:text-white text-[14px]  font-medium leading-[16.1px] max-[360px]:text-[12.5px]"
            >
              Attracted
            </p>
          </div>
        </div>
  
        <Btn
          bg-color="bg-blue"
          text-color="text-white"
          border-color="border border-blue"
          class="flex items-center justify-center text-[15px] leading-[22.5px] lg:w-fit w-full font-medium"
        >
          Create server
          <img src="../../assets/svgs/plus-blue.svg" class="ml-1.5" alt="Plus" />
        </Btn>
      </div>
    </div>
  </template>
  
  <script setup>
  import Btn from "../../components/Helper/Btn.vue";
  import { Menu, MenuButton, MenuItem, MenuItems } from "@headlessui/vue";

  const props = defineProps({
    title : {
      default : 'Dedicated Server List'
    }
  })
  </script>