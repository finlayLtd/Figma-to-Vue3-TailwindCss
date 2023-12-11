<template>
  <h1
    class="text-primary dark:text-white lg:text-3xl text-[24px]  font-bold leading-[115%] tracking-[0.3px] lg:mb-10 mb-[35px]"
  >
    Dedicated Server
  </h1>
  <div class="bg-white dark:bg-white-5 rounded-[14px] mb-10">
    <Tabletop />
    <Table :data="serverModels.data" :headings="serverModels.headings" overflow="overflow-x-auto">
      <template #product="{ tdata }">
        <div class="flex items-center lg:min-w-[260px] lg:max-w-[260px]">
          <div class="p-2 mr-3 rounded-[8px] bg-light-white dark:bg-light-white-8">
            <img
              :src="`/src/assets/svgs/${tdata.serverLogo}`"
              class="block dark:hidden min-w-[20px]"
              alt="Window"
            />
            <img
              :src="`/src/assets/svgs/${tdata.serverLogoLight}`"
              class="hidden dark:block min-w-[20px]"
              alt="Window"
            />
          </div>
          <div>
            <p
              class="text-primary-85 dark:text-[#ffffffd9] lg:text-[15px] text-[14px] text-start  font-medium leading-[100%] tracking-[0.15px]"
            >
              {{ tdata.name }}
            </p>
            <p
              class="text-primary-50 dark:text-white-50 lg:text-[14px] text-[13px] text-start mt-[7px]  font-normal leading-[100%] tracking-[0.14px]"
            >
              {{ tdata.caption }}
            </p>
          </div>
        </div>
      </template>
      <template #validUntil="{ tdata }">
        <div class="flex items-center">
          <p
            class="text-primary dark:text-white text-sm  font-medium leading-[100%] mr-3.5 tracking-[0.4px]"
          >
            12.07.2023
          </p>
          <Menu as="div" class="relative inline-block">
            <div>
              <MenuButton class="inline-flex w-full justify-center">
                <img
                  src="../../assets/svgs/open-menu-grid.svg"
                  class="lg:hidden block mr-[5px] dark:hidden"
                  alt="Menu"
                />
                <img
                  src="../../assets/svgs/open-menu-grid-white.svg"
                  class="dark:lg:hidden hidden mr-[5px] dark:block"
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
                class="absolute right-0 z-10 w-56 origin-top-right rounded-md bg-white dark:bg-black shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none mt-4"
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
      <template #country="{ tdata }">
        <div class="flex justify-center items-center">
          <img :src="`/src/assets/svgs/flags/${tdata.flag}`" alt="Flag" />
          <p class="ml-[5px] text-black dark:text-white">{{ tdata.country }}</p>
        </div>
      </template>
      <template #bench="{ tdata }">
        <p class="lg:text-[15px] text-[13px] text-black dark:text-white">
          {{ tdata.bench }}
        </p>
      </template>
      <template #cores="{ tdata }">
        <p class="lg:text-[15px] text-[13px] text-black dark:text-white">
          {{ tdata.cores }}
        </p>
      </template>
      <template #turboClock="{ tdata }">
        <p class="lg:text-[15px] text-[13px] text-black dark:text-white lg:min-w-max">
          {{ tdata.turbo }} GHs
        </p>
      </template>
      <template #ram="{ tdata }">
        <p class="lg:text-[15px] text-[13px] text-black dark:text-white lg:min-w-max">
          {{ tdata.ram }} GB
        </p>
      </template>
      <template #ssd="{ tdata }">
        <p class="lg:text-[15px] text-[13px] text-black dark:text-white lg:min-w-max">
          {{ tdata.ssd }} GB
        </p>
      </template>
      <template #ddos="{ tdata }">
        <span
          class="flex items-center bg-green rounded-[16px] py-1.5 px-1.5 w-max"
          v-if="tdata.ddos"
        >
          <img src="../../assets/svgs/shield-check-white.svg" alt="Check" />

          <p
            class="text-white text-center text-[15px]  font-medium leading-[100%] tracking-[0.15px] ml-[5px] mr-1.5"
          >
            Enabled
          </p>
        </span>

        <span
          class="flex items-center bg-tomato rounded-[16px] py-1.5 px-1.5"
          v-else
        >
          <img
            src="../../assets/svgs/shield-check-close-white.svg"
            alt="Check"
          />

          <p
            class="text-white text-center text-[15px]  font-medium leading-[100%] tracking-[0.15px] ml-[5px]"
          >
            Disabled
          </p>
        </span>
      </template>
      <template #status="{ tdata }">
        <div
          class="lg:flex block justify-between items-center lg:min-w-[140px]"
        >
          <span
            class="flex items-center bg-green-10 rounded-[16px] py-1.5 px-1.5 ml-3"
            v-if="tdata.status == 'Active'"
          >
            <img src="../../assets/svgs/check-green.svg" alt="Check" />

            <p
              class="text-green text-center text-[15px]  font-medium leading-[100%] tracking-[0.15px]"
            >
              Active
            </p>
          </span>
          <span
            class="flex items-center bg-tomato-10 rounded-[16px] py-1.5 px-1.5"
            v-else-if="tdata.status == 'Suspended'"
          >
            <img src="../../assets/svgs/suspend.svg" alt="Check" />

            <p
              class="text-tomato text-center text-[15px]  font-medium leading-[100%] tracking-[0.15px]"
            >
              Suspended
            </p>
          </span>
          <span
            class="flex items-center bg-orange-10 rounded-[16px] py-1.5 px-1.5"
            v-else
          >
            <img src="../../assets/svgs/attract.svg" alt="Check" />

            <p
              class="text-orange text-center text-[15px]  font-medium leading-[100%] tracking-[0.15px]"
            >
              Attracted
            </p>
          </span>

          <Menu as="div" class="relative lg:inline-block hidden">
            <div>
              <MenuButton class="inline-flex w-full justify-center">
                <img
                  src="../../assets/svgs/open-menu-grid.svg"
                  class="lg:block hidden mr-[5px] dark:hidden"
                  alt="Menu"
                />
                <img
                  src="../../assets/svgs/open-menu-grid-white.svg"
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
                class="absolute right-0 z-10 w-56 origin-top-right rounded-md bg-white dark:bg-black shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none mt-4"
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
    <!-- <div
      class="py-3 px-5 flex items-center justify-between bg-white dark:bg-transparent rounded-b-[14px]"
    >
      <div class="flex items-center">
        <img
          src="../../assets/svgs/prev.svg"
          class="dark:hidden block"
          alt="Pagination"
        />
        <img
          src="../../assets/svgs/prev-white.svg"
          class="dark:block hidden"
          alt="Pagination"
        />
        <p
          class="text-secondary-70 dark:text-white text-[15px]  font-normal leading-[100%] ml-[9px]"
        >
          Previous
        </p>
      </div>

      <ul class="flex">
        <li class="mx-1">
          <Button
            class="text-secondary dark:text-white text-[15px]  font-medium leading-[100%] tracking-[-0.15px] rounded-md bg-light-white dark:bg-[#f5f7f80a] h-[31px] w-[26px]"
            >1</Button
          >
        </li>
        <li class="mx-1">
          <Button
            class="text-secondary dark:text-white text-[15px]  font-medium leading-[100%] tracking-[-0.15px] rounded-md h-[31px] w-[26px]"
            >2</Button
          >
        </li>
        <li class="mx-1">
          <Button
            class="text-secondary dark:text-white text-[15px]  font-medium leading-[100%] tracking-[-0.15px] rounded-md h-[31px] w-[26px]"
            >3</Button
          >
        </li>
      </ul>

      <div class="flex items-center">
        <p
          class="text-secondary-70 dark:text-white text-[15px]  font-normal leading-[100%] mr-[9px]"
        >
          Next
        </p>
        <img
          src="../../assets/svgs/prev.svg"
          class="dark:hidden block rotate-180"
          alt="Pagination"
        />
        <img
          src="../../assets/svgs/prev-white.svg"
          class="dark:block hidden rotate-180"
          alt="Pagination"
        />
      </div>
    </div> -->
    <Pagination />
  </div>
</template>

<script setup>
import Table from "../../components/server/Table.vue";
import { reactive } from "vue";
import Tabletop from "../../components/Layout/filterSection.vue";
import { Menu, MenuButton, MenuItem, MenuItems } from "@headlessui/vue";
import Pagination from "../../components/Helper/Pagination.vue";

const serverModels = reactive({
  headings: [
    {
      name: "Product",
      slotName: "product",
      isSort: true,
    },
    {
      name: "Valid until",
      slotName: "validUntil",
      isSort: true,
    },
    {
      name: "Country",
      slotName: "country",
      isSort: false,
    },
    {
      name: "Bench",
      slotName: "bench",
      isSort: false,
    },
    {
      name: "Cores",
      slotName: "cores",
      isSort: false,
    },
    {
      name: "Turbo Clock",
      slotName: "turboClock",
      isSort: false,
    },
    {
      name: "RAM",
      slotName: "ram",
      isSort: false,
    },
    {
      name: "SSD",
      slotName: "ssd",
      isSort: false,
    },
    {
      name: "DDoS",
      slotName: "ddos",
      isSort: false,
    },
    {
      name: "Status",
      slotName: "status",
      isSort: false,
    },
  ],
  data: [
    {
      serverLogo: "window-dark.svg",
      serverLogoLight: "window-light.svg",
      name: "Intel Xeon E5-2609v2",
      caption: "Windows RDP 2019",
      valid: "12.07.2023",
      flag: "netherlands.svg",
      country: "Netherlands",
      bench: 3666,
      cores: 4,
      turbo: 2.5,
      ram: 32,
      ssd: "1x240",
      ddos: false,
      status: "Suspended",
    },
    {
      serverLogo: "window-dark.svg",
      serverLogoLight: "window-light.svg",
      name: "Intel Xeon E5-2609v2",
      caption: "Windows RDP 2019",
      valid: "12.07.2023",
      flag: "netherlands.svg",
      country: "Germany",
      bench: 3666,
      cores: 4,
      turbo: 2.5,
      ram: 32,
      ssd: "1x240",
      ddos: true,
      status: "Active",
    },
    {
      serverLogo: "window-dark.svg",
      serverLogoLight: "window-light.svg",
      name: "Intel Xeon E5-2609v2",
      caption: "Windows RDP 2019",
      valid: "12.07.2023",
      flag: "netherlands.svg",
      country: "Germany",
      bench: 3666,
      cores: 4,
      turbo: 2.5,
      ram: 32,
      ssd: "1x240",
      ddos: true,
      status: "Active",
    },
    {
      serverLogo: "window-dark.svg",
      serverLogoLight: "window-light.svg",
      name: "Intel Xeon E5-2609v2",
      caption: "Windows RDP 2019",
      valid: "12.07.2023",
      flag: "netherlands.svg",
      country: "Germany",
      bench: 3666,
      cores: 4,
      turbo: 2.5,
      ram: 32,
      ssd: "1x240",
      ddos: true,
      status: "Attracted",
    },
    {
      serverLogo: "window-dark.svg",
      serverLogoLight: "window-light.svg",
      name: "Intel Xeon E5-2609v2",
      caption: "Windows RDP 2019",
      valid: "12.07.2023",
      flag: "netherlands.svg",
      country: "Germany",
      bench: 3666,
      cores: 4,
      turbo: 2.5,
      ram: 32,
      ssd: "1x240",
      ddos: true,
      status: "Active",
    },
    {
      serverLogo: "window-dark.svg",
      serverLogoLight: "window-light.svg",
      name: "Intel Xeon E5-2609v2",
      caption: "Windows RDP 2019",
      valid: "12.07.2023",
      flag: "netherlands.svg",
      country: "Germany",
      bench: 3666,
      cores: 4,
      turbo: 2.5,
      ram: 32,
      ssd: "1x240",
      ddos: true,
      status: "Active",
    },
    {
      serverLogo: "window-dark.svg",
      serverLogoLight: "window-light.svg",
      name: "Intel Xeon E5-2609v2",
      caption: "Windows RDP 2019",
      valid: "12.07.2023",
      flag: "netherlands.svg",
      country: "Germany",
      bench: 3666,
      cores: 4,
      turbo: 2.5,
      ram: 32,
      ssd: "1x240",
      ddos: true,
      status: "Active",
    },
  ],
});
</script>
