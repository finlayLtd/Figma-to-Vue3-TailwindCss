<template>
  <h1
    class="text-primary dark:text-white lg:text-3xl text-[24px] font-bold leading-[115%] tracking-[0.3px]"
  >
    Invoices
  </h1>

  <div
    class="grid lg:grid-cols-4 grid-cols-2 lg:gap-4 gap-3 mt-[35px] lg:mb-10 mb-[35px]"
  >
    <div
      class="py-3.5 lg:py-[18px] px-4 lg:px-5 bg-white dark:bg-white-5 rounded-[14px] col-start-1 col-end-3"
    >
      <p
        class="text-primary-70 dark:text-white-70 lg:text-[15.5px] text-[14.5px] font-normal leading-[115%]"
      >
        Balance
      </p>

      <div class="mt-3.5 flex justify-between items-center">
        <div>
          <h2
            class="text-primary dark:text-white text-[22px] lg:text-2xl font-medium leading-[115%] tracking-[0.24px] mb-3"
          >
            $316<span class="text-primary-50 dark:text-white-50">.00 </span>
          </h2>
          <p
            class="text-primary-50 dark:text-white-50 text-[14px] lg:text-[15px] font-normal leading-5"
          >
            0 outstanding invoices
          </p>
        </div>
        <Btn
          class="flex items-center"
          text-color="text-white"
          bg-color="bg-[#026DEB]"
          border-color="border border-[#026DEB]"
        >
          Add Funds
          <img
            src="../../assets/svgs/plus-blue.svg"
            class="ml-[7px]"
            alt="plus"
          />
        </Btn>
      </div>
    </div>

    <div
      class="py-3.5 lg:py-[18px] px-4 lg:px-5 bg-white dark:bg-white-5 rounded-[14px]"
    >
      <p
        class="text-primary-70 dark:text-white-70 lg:text-[15.5px] text-[14.5px] font-normal leading-[115%]"
      >
        Operations
      </p>
      <h2
        class="text-primary dark:text-white text-[22px] lg:text-2xl font-medium leading-[115%] tracking-[0.24px] mt-3.5 mb-3"
      >
        6
      </h2>
      <p
        class="text-primary-50 dark:text-white-50 text-[14px] lg:text-[15px] font-normal leading-5"
      >
        All time / <span class="text-primary dark:text-white"> Today </span> / A
        week
      </p>
    </div>
    <div
      class="py-3.5 lg:py-[18px] px-4 lg:px-5 bg-white dark:bg-white-5 rounded-[14px]"
    >
      <p
        class="text-primary-70 dark:text-white-70 lg:text-[15.5px] text-[14.5px] font-normal leading-[115%]"
      >
        Expenses
      </p>
      <h2
        class="text-danger text-[22px] lg:text-2xl font-medium leading-[115%] tracking-[0.24px] mt-3.5 mb-3"
      >
        - $ 78,00
      </h2>
      <p
        class="text-primary-50 dark:text-white-50 text-[14px] lg:text-[15px] font-normal leading-5"
      >
        <span class="text-primary dark:text-white"> All time </span> / Today / A
        week
      </p>
    </div>
  </div>

  <div class="bg-white dark:bg-white-5 w-full rounded-[14px] mb-10 overflow-hidden">
    <div
      class="px-5 py-3.5 lg:flex block justify-between items-center border-b border-dark-5"
    >
      <div class="flex justify-between items-center">
        <h3
          class="text-primary dark:text-white lg:text-lg text-[16px] font-medium leading-[normal] tracking-[0.18px] min-w-max"
        >
          Transaction history
        </h3>
        <Search class="max-fixed lg:hidden block" />
      </div>
      <div class="flex items-center">
        <Tab class="m-none lg:w-fit w-full lg:mt-0 mt-2.5" />
        <Search class="ml-[18px] lg:flex hidden" />
      </div>
    </div>
    <div class="overflow-x-auto">
      <Table
        :data="Domainlist"
        :headings="domainHead"
        head-position="text-start"
        class="text-start"
      >
        <template #invoice="{ tdata }">
          <div class="flex items-center">
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
                class="text-primary dark:text-white text-start lg:text-[15px] text-[14px] font-medium leading-[100%] min-w-max tracking-[0.15px]"
              >
                {{ tdata.title }}
              </p>
            </div>
          </div>
        </template>
        <template #action="{ tdata }">
          <p
            class="text-primary-85 dark:text-white text-[14px] lg:text-[15px] text-left font-medium leading-[100%] tracking-[0.15px] min-w-fit lg:min-w-max 2xl:min-w-[750px]"
          >
            {{ tdata.action }}
          </p>
        </template>
        <template #date="{ tdata }">
          <p
            class="text-primary-85 dark:text-white text-[14px] lg:text-[15px] text-left font-medium leading-[100%] tracking-[0.15px]"
          >
            {{ tdata.date }}
          </p>
        </template>
        <template #amount="{ tdata }">
          <p
            class="text-[14px] lg:text-[15px] text-left font-medium leading-[100%] tracking-[0.15px] min-w-max"
            :class="tdata.value < 0 ? 'text-tomato' : 'text-green'"
          >
            {{ tdata.amount }}
          </p>
        </template>
        <template #status="{ tdata }">
          <div
            class="lg:flex block justify-between items-center lg:min-w-[140px]"
          >
            <span
              class="flex items-center justify-center bg-green-10 rounded-[16px] py-1.5 px-1.5 lg:ml-3 lg:w-fit w-[calc(100vw-68px)]"
              v-if="tdata.status == 'paid'"
            >
              <img src="../../assets/svgs/check-green.svg" alt="Check" />

              <p
                class="text-green text-center text-[15px] font-medium leading-[100%] ml-[5px] tracking-[0.15px]"
              >
                Paid
              </p>
            </span>
            <span
              class="flex items-center bg-tomato-10 justify-center rounded-[16px] py-1.5 px-1.5 lg:w-fit w-[calc(100vw-68px)]"
              v-else-if="tdata.status == 'Canceled'"
            >
              <img src="../../assets/svgs/suspend.svg" alt="Check" />

              <p
                class="text-tomato text-center text-[15px] font-medium leading-[100%] ml-[5px] tracking-[0.15px]"
              >
              Canceled
              </p>
            </span>
            <span
              class="flex items-center bg-orange-10 justify-center rounded-[16px] py-1.5 px-1.5 lg:w-fit w-[calc(100vw-68px)]"
              v-else
            >
              <img src="../../assets/svgs/attract.svg" alt="Check" />

              <p
                class="text-orange text-center text-[15px] font-medium leading-[100%] ml-[5px] tracking-[0.15px]"
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
                            class="text-primary dark:text-white dark:opacity-80 text-[15px] font-medium leading-[135%] ml-2.5"
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
    <Pagination />
  </div>
</template>

<script setup>
import { ref } from "vue";
import Btn from "@/components/Helper/Btn.vue";
import Search from "@/components/Helper/Search.vue";
import Tab from "@/components/Helper/TabList.vue";
import { Menu, MenuButton, MenuItem, MenuItems } from "@headlessui/vue";
import Pagination from '@/components/Helper/Pagination.vue'
import Table from "@/components/server/Table.vue";
const domainHead = ref([
  {
    name: "Invoice",
    slotName: "invoice",
    isSort: true,
    mobileIndex: 0,
  },
  {
    name: "Action",
    slotName: "action",
    isSort: false,
    mobileIndex: 2,
  },
  {
    name: "Date",
    slotName: "date",
    isSort: true,
    mobileIndex: 3,
  },
  {
    name: "Amount",
    slotName: "amount",
    isSort: false,
    mobileIndex: 1,
  },
  {
    name: "Status",
    slotName: "status",
    isSort: false,
    mobileIndex: 4,
    headPosition: "justify-center",
  },
]);

const Domainlist = ref([
  {
    icon: "window-dark.svg",
    title: "Local Host",
    action: "Payment for services Renewal of web hosting (tariff 2)",
    date: "12.07.2023",
    value: -1,
    amount: "- $ 14.99",
    status: "paid",
  },
  {
    icon: "window-dark.svg",
    title: "Local Host",
    action: "Payment for services Renewal of web hosting (tariff 2)",
    date: "12.07.2023",
    value: +1,
    amount: "+ $ 34.98",
    status: "paid",
  },
  {
    icon: "window-dark.svg",
    title: "Local Host",
    action: "Payment for services Renewal of web hosting (tariff 2)",
    date: "12.07.2023",
    value: -1,
    amount: "- $ 19.99",
    status: "paid",
  },
  {
    icon: "window-dark.svg",
    title: "Local Host",
    action: "Payment for services Renewal of web hosting (tariff 2)",
    date: "12.07.2023",
    value: -1,
    amount: "- $ 9.99",
    status: "Attracted",
  },
  {
    icon: "window-dark.svg",
    title: "Local Host",
    action: "Payment for services Renewal of web hosting (tariff 2)",
    date: "12.07.2023",
    value: -1,
    amount: "- $ 9.99",
    status: "Canceled",
  },
  {
    icon: "window-dark.svg",
    title: "Local Host",
    action: "Payment for services Renewal of web hosting (tariff 2)",
    date: "12.07.2023",
    value: -1,
    amount: "- $ 9.99",
    status: "Canceled",
  },
]);
</script>

<style>
.max-fixed {
  @apply max-w-[145px];
}
</style>
