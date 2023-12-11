<template>
  <div class="bg-white dark:bg-white-5 rounded-[14px]">
    <div
      class="lg:px-5 px-4 py-3.5 flex justify-between items-center lg:border-b border-dark-5"
    >
      <h3
        class="text-primary dark:text-white lg:text-lg text-[16px]  font-medium leading-[normal] tracking-[0.18px]"
      >
        {{ title }}
      </h3>
      <div class="flex items-center">
        <TypesDropdown class="hidden lg:block">
          <ul class="p-1.5 max-w-[153px]">
            <li
              class="px-2.5 py-1.5 text-primary dark:text-white text-[15px]  font-medium leading-6 dark:hover:bg-light-white-8 hover:bg-light-white rounded-[6px] cursor-pointer"
            >
              Default types
            </li>
            <li
              class="px-2.5 py-1.5 text-primary dark:text-white text-[15px]  font-medium leading-6 dark:hover:bg-light-white-8 hover:bg-light-white rounded-[6px] cursor-pointer"
            >
              Default types
            </li>
            <li
              class="px-2.5 py-1.5 text-primary dark:text-white text-[15px]  font-medium leading-6 dark:hover:bg-light-white-8 hover:bg-light-white rounded-[6px] cursor-pointer"
            >
              Default types
            </li>
            <li
              class="px-2.5 py-1.5 text-primary dark:text-white text-[15px]  font-medium leading-6 dark:hover:bg-light-white-8 hover:bg-light-white rounded-[6px] cursor-pointer"
            >
              Default types
            </li>
          </ul>
        </TypesDropdown>
        <Search class="max-w-[293px] ml-4 lg:w-full w-[150px]" />
      </div>
    </div>
    <TypesDropdown class="w-full lg:hidden block mb-3.5">
      <ul class="p-1.5 lg:max-w-[153px]">
        <li
          class="px-2.5 py-1.5 text-primary text-[15px]  font-medium leading-6 hover:bg-light-white rounded-[6px] cursor-pointer"
        >
          Default types
        </li>
        <li
          class="px-2.5 py-1.5 text-primary text-[15px]  font-medium leading-6 hover:bg-light-white rounded-[6px] cursor-pointer"
        >
          Default types
        </li>
        <li
          class="px-2.5 py-1.5 text-primary text-[15px]  font-medium leading-6 hover:bg-light-white rounded-[6px] cursor-pointer"
        >
          Default types
        </li>
        <li
          class="px-2.5 py-1.5 text-primary text-[15px]  font-medium leading-6 hover:bg-light-white rounded-[6px] cursor-pointer"
        >
          Default types
        </li>
      </ul>
    </TypesDropdown>
    <div class="mb-auto">
      <Table
        :data="tableData"
        :headings="tableHead"
        head-position="justify-center"
        class="text-start"
      >
        <template #product="{ tdata }">
          <div class="flex items-center lg:min-w-[250px] lg:max-w-[250px]">
            <div
              class="p-2 lg:mr-3 mr-2.5 rounded-[8px] bg-light-white group-hover:bg-white dark:group-hover:bg-light-white-8 dark:bg-light-white-8"
            >
              <img
                src="../../../assets/svgs/window.svg"
                class="h-[20px] aspect-square group-hover:block hidden min-w-[20px]"
                alt="Window"
              />
              <img
                src="../../../assets/svgs/window-dark.svg"
                class="h-[20px] aspect-square group-hover:hidden block min-w-[20px] dark:brightness-[100]"
                alt="Window"
              />
            </div>
            <div>
              <p
                class="text-primary dark:text-white text-start text-[14px] lg:text-[15px]  font-medium leading-[100%] tracking-[0.15px]"
              >
                {{ tdata.title }}
              </p>
              <p
                class="text-primary-50 dark:text-white-50 text-[13px] lg:text-sm  text-start font-normal leading-[100%] tracking-[0.14px] mt-[7px]"
              >
                {{ tdata.cpation }}
              </p>
            </div>
          </div>
        </template>
        <template #date="{ tdata }">
          <div class="flex justify-between items-center">
            <p
              class="text-primary dark:text-white lg:text-[15px] text-[14px] text-start  font-medium leading-[100%] tracking-[0.15px]"
            >
              {{ tdata.date }}
              <!-- {{ tdata }} -->
            </p>
            <Menu as="div" class="z-20 relative ml-[20px] lg:hidden block translate-y-1/4">
              <div>
                <MenuButton class="inline-flex w-full justify-center">
                  <img
                    src="../../../assets/svgs/open-menu-grid.svg"
                    class="mr-[5px] dark:hidden"
                    alt="Menu"
                  />
                  <img
                    src="../../../assets/svgs/open-menu-grid-white.svg"
                    class="dark:block hidden mr-[5px]"
                    alt="Menu"
                  />
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
                  class="absolute -translate-x-4 max-w-[172px] right-0 w-56 origin-top-right rounded-md bg-white dark:bg-black shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                >
                  <div role="none">
                    <ul
                      class="[&>*]:rounded-[6px] [&>*:hover]:bg-light-white [&>*:hover]:text-primary [&>*]:text-primary-70 p-1.5"
                    >
                      <li class="py-2.5 px-4">
                        <router-link to="#" class="flex">
                          <div class="flex items-center">
                            <img src="../../../assets/svgs/cog.svg" alt="Cog" />
                            <p
                              class="text-start text-[15px]  font-medium leading-6 ml-2"
                            >
                              Settings server
                            </p>
                          </div>
                        </router-link>
                      </li>
                      <li class="py-2.5 px-4">
                        <router-link to="#" class="flex">
                          <div class="flex items-center">
                            <img
                              src="../../../assets/svgs/shutdown.svg"
                              alt="Cog"
                            />
                            <p
                              class="text-start text-[15px]  font-medium leading-6 ml-2"
                            >
                              Shutdown
                            </p>
                          </div>
                        </router-link>
                      </li>
                      <li class="py-2.5 px-4">
                        <router-link to="#" class="flex">
                          <div class="flex items-center">
                            <img
                              src="../../../assets/svgs/reload.svg"
                              alt="Cog"
                            />
                            <p
                              class="text-start text-[15px]  font-medium leading-6 ml-2"
                            >
                              Reload
                            </p>
                          </div>
                        </router-link>
                      </li>
                      <li class="py-2.5 px-4">
                        <router-link to="#" class="flex">
                          <div class="flex items-center">
                            <img
                              src="../../../assets/svgs/power.svg"
                              alt="Cog"
                            />
                            <p
                              class="text-start text-[15px]  font-medium leading-6 ml-2"
                            >
                              Power Off
                            </p>
                          </div>
                        </router-link>
                      </li>
                    </ul>
                  </div>
                </MenuItems>
              </transition>
            </Menu>
          </div>
        </template>
        <template #country="{ tdata }">
          <img
            :src="`src/assets/svgs/flags/${tdata.flag}`"
            class="mx-auto"
            alt="DE"
          />
        </template>
        <template #status="{ tdata }">
          <div class="flex justify-between items-end">
            <div>
              <span
                class="flex items-center w-fit bg-green-10 rounded-[16px] py-1.5 px-1.5 min-w-max"
                v-if="tdata.status == 'Active'"
              >
                <img src="../../../assets/svgs/check-green.svg" alt="Check" />

                <p
                  class="text-green text-center lg:text-[15px] text-[14px] ml-[5px]  font-medium leading-[100%] tracking-[0.15px]"
                >
                  Active
                </p>
              </span>
              <span
                class="flex items-center bg-tomato-10 rounded-[16px] py-1.5 px-1.5 min-w-max"
                v-else-if="tdata.status == 'Suspended'"
              >
                <img src="../../../assets/svgs/suspend.svg" alt="Check" />

                <p
                  class="text-tomato text-center lg:text-[15px] text-[14px] ml-[5px]  font-medium leading-[100%] tracking-[0.15px]"
                >
                  Suspended
                </p>
              </span>
              <span
                class="flex items-center bg-orange-10 rounded-[16px] py-1.5 px-1.5 min-w-max"
                v-else
              >
                <img src="../../../assets/svgs/attract.svg" alt="Check" />

                <p
                  class="text-orange text-center lg:text-[15px] text-[14px] ml-[5px]  font-medium leading-[100%] tracking-[0.15px]"
                >
                  Attracted
                </p>
              </span>
            </div>
            <Menu as="div" class="relative ml-[20px] lg:inline-block hidden">
              <div>
                <MenuButton class="inline-flex w-full justify-center">
                  <img
                    src="../../../assets/svgs/open-menu-grid.svg"
                    class="lg:block hidden mr-[5px] dark:hidden"
                    alt="Menu"
                  />
                  <img
                    src="../../../assets/svgs/open-menu-grid-white.svg"
                    class="dark:lg:block hidden mr-[5px]"
                    alt="Menu"
                  />
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
                  class="absolute max-w-[172px] right-0 z-10 w-56 origin-top-right rounded-md bg-white dark:bg-black shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none mt-4"
                >
                  <div role="none">
                    <ul
                      class="[&>*]:rounded-[6px] [&>*:hover]:bg-light-white [&>*:hover]:text-primary [&>*]:text-primary-70 p-1.5"
                    >
                      <li class="py-2.5 px-4">
                        <router-link to="#" class="flex">
                          <div class="flex items-center">
                            <img src="../../../assets/svgs/cog.svg" alt="Cog" />
                            <p
                              class="text-start text-[15px]  font-medium leading-6 ml-2"
                            >
                              Settings server
                            </p>
                          </div>
                        </router-link>
                      </li>
                      <li class="py-2.5 px-4">
                        <router-link to="#" class="flex">
                          <div class="flex items-center">
                            <img
                              src="../../../assets/svgs/shutdown.svg"
                              alt="Cog"
                            />
                            <p
                              class="text-start text-[15px]  font-medium leading-6 ml-2"
                            >
                              Shutdown
                            </p>
                          </div>
                        </router-link>
                      </li>
                      <li class="py-2.5 px-4">
                        <router-link to="#" class="flex">
                          <div class="flex items-center">
                            <img
                              src="../../../assets/svgs/reload.svg"
                              alt="Cog"
                            />
                            <p
                              class="text-start text-[15px]  font-medium leading-6 ml-2"
                            >
                              Reload
                            </p>
                          </div>
                        </router-link>
                      </li>
                      <li class="py-2.5 px-4">
                        <router-link to="#" class="flex">
                          <div class="flex items-center">
                            <img
                              src="../../../assets/svgs/power.svg"
                              alt="Cog"
                            />
                            <p
                              class="text-start text-[15px]  font-medium leading-6 ml-2"
                            >
                              Power Off
                            </p>
                          </div>
                        </router-link>
                      </li>
                    </ul>
                  </div>
                </MenuItems>
              </transition>
            </Menu>
          </div>
        </template>
      </Table>
    </div>
    <Pagination class="mt-auto" />
  </div>
</template>

<script setup>
const props = defineProps({
  title: {
    required: true,
  },
  tableHead: {
    required: true,
  },
  tableData: {
    required: true,
  },
});

import Pagination from "../../../components/Helper/Pagination.vue";
import { Menu, MenuButton, MenuItem, MenuItems } from "@headlessui/vue";
import Table from "../../../components/server/Table.vue";
import TypesDropdown from "../../../components/Helper/TypesDropdown.vue";
import Search from "../../../components/Helper/Search.vue";
</script>
