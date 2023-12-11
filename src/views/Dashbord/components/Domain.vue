<template>
  <div>
    <div
      class="px-5 py-3.5 lg:flex block justify-between items-center border-b border-dark-5"
    >
      <h3
        class="text-primary dark:text-white lg:text-lg text-[16px]  font-medium leading-[normal] tracking-[0.18px] mb-3 lg:mb-0"
      >
        Domain
      </h3>
      <Tab class="m-none lg:w-fit w-full" />
    </div>
    <div>
      <Table
        :data="data"
        :headings="head"
        head-position="text-start"
        class="text-start"
      >
        <template #name="{ tdata }">
          <div class="flex items-center lg:min-w-[250px] lg:max-w-[250px]">
            <div
              class="p-2 lg:mr-3 mr-2.5 rounded-[8px] bg-light-white dark:bg-light-white-8"
            >
              <img
                :src="`/src/assets/svgs/${tdata.icon}`"
                class="dark:brightness-[100] min-w-[20px]"
                alt="Window"
              />
            </div>
            <div class="max-w-[100%]">
              <p
                class="text-primary dark:text-white text-start lg:text-[15px] text-[14px]  font-medium leading-[100%] tracking-[0.15px]"
              >
                {{ tdata.title }}
              </p>
            </div>
          </div>
        </template>
        <template #date="{ tdata }">
          <div class="flex items-center">
            <p
              class="text-primary dark:text-white lg:text-[15px] text-[14px] text-start  font-medium leading-[100%] tracking-[0.15px] min-w-fit"
            >
              {{ tdata.date }}
            </p>
            <Menu
              as="div"
              class="relative inline-block ml-[14px] translate-y-1/4 lg:hidden"
            >
              <div>
                <MenuButton class="inline-flex w-full justify-center">
                  <img
                    src="../../../assets/svgs/open-menu-grid.svg"
                    class="lg:hidden block mr-[5px] dark:hidden"
                    alt="Menu"
                  />
                  <img
                    src="../../../assets/svgs/open-menu-grid-white.svg"
                    class="dark:lg:hidden block mr-[5px]"
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
                <!-- last:-translate-x-[10%] last:-translate-y-[100%]  -->
                <MenuItems
                  class="absolute right-0 z-10 w-56 origin-top-right rounded-md bg-white dark:bg-black shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none mt-4"
                  :class="
                    index == data.length - 1
                      ? 'last:-translate-x-[10%] last:-translate-y-[100%] '
                      : ''
                  "
                >
                  <div role="none">
                    <ul>
                      <li class="py-2.5 px-4">
                        <router-link
                          :to="{ name: 'Dedicated Detail' }"
                          class="flex"
                        >
                          <p
                            class="text-primary dark:text-white dark:opacity-80 text-[15px]  font-medium leading-[135%] ml-2.5"
                          >
                            Edit
                          </p>
                        </router-link>
                      </li>
                    </ul>
                  </div>
                </MenuItems>
              </transition>
            </Menu>
          </div>
        </template>
        <template #status="{ tdata }">
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
        </template>
        <template #action="{ index }">
          <div class="flex justify-between items-end">
            <Btn
              class="min-w-max"
              text-color="text-tomato-8 "
              border-color="border-0"
              bg-color="bg-transparent"
              btn-padding="lg:px-4 lg:py-1.5"
              >Delete domain</Btn
            >
            <Menu as="div" class="relative inline-block">
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
                <!-- last:-translate-x-[10%] last:-translate-y-[100%]  -->
                <MenuItems
                  class="absolute right-0 z-10 w-56 origin-top-right rounded-md bg-white dark:bg-black shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none mt-4"
                  :class="
                    index == data.length - 1
                      ? 'last:-translate-x-[10%] last:-translate-y-[100%] '
                      : ''
                  "
                >
                  <div role="none">
                    <ul>
                      <li class="py-2.5 px-4">
                        <router-link
                          :to="{ name: 'Dedicated Detail' }"
                          class="flex"
                        >
                          <p
                            class="text-primary dark:text-white dark:opacity-80 text-[15px]  font-medium leading-[135%] ml-2.5"
                          >
                            Edit
                          </p>
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
  </div>
</template>


<script setup> 
import { Menu, MenuButton, MenuItem, MenuItems } from "@headlessui/vue";
import Tab from "@/components/Helper/TabList.vue";
import Btn from "@/components/Helper/Btn.vue";
import Table from "@/components/server/Table.vue";

    const props = defineProps(
        {
            data : {
                required : true,
            },
            head : {
                required : true,
            }
        }
    )
</script>