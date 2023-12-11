<template>
  <div
    class="bg-white dark:bg-white-5 w-full mt-5 rounded-[14px] overflow-hidden"
  >
    <div
      class="px-5 py-3.5 lg:flex block justify-between items-center border-b border-dark-5"
    >
      <div class="flex justify-between items-center">
        <h3
          class="text-primary dark:text-white lg:text-lg text-[16px]  font-medium leading-[normal] tracking-[0.18px] min-w-max"
        >
          Operations history
        </h3>
        <Search class="max-fixed lg:hidden block" />
      </div>
      <div class="flex items-center">
        <Tab class="m-none lg:w-fit w-full lg:mt-0 mt-2.5" />
        <Search class="ml-[18px] lg:flex hidden " />
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
                class="text-primary dark:text-white text-start lg:text-[15px] text-[14px]  font-medium leading-[100%] min-w-max tracking-[0.15px]"
              >
                {{ tdata.title }}
              </p>
            </div>
          </div>
        </template>
        <template #action="{ tdata }">
          <p
            class="text-primary-85 dark:text-white text-[14px] lg:text-[15px] text-left  font-medium leading-[100%] tracking-[0.15px] min-w-max 2xl:min-w-[500px]"
          >
            {{ tdata.action }}
          </p>
        </template>
        <template #date="{ tdata }">
          <p
            class="text-primary-85 dark:text-white text-[14px] lg:text-[15px] text-left  font-medium leading-[100%] tracking-[0.15px]"
          >
            {{ tdata.date }}
          </p>
        </template>
        <template #amount="{ tdata }">
          <p
            class="text-tomato text-[14px] lg:text-[15px] text-left  font-medium leading-[100%] tracking-[0.15px] min-w-max"
          >
            {{ tdata.amount }}
          </p>
        </template>
        <template #status="{ tdata }">
          <span
            class="flex items-center justify-center lg:w-fit w-full bg-green-10 rounded-[16px] lg:ml-auto py-1.5 px-1.5 min-w-max action-full"
            v-if="tdata.status == 'paid'"
          >
            <img src="../../../assets/svgs/check-green.svg" alt="Check" />

            <p
              class="text-green text-center lg:text-[15px] text-[14px] ml-[5px]  font-medium leading-[100%] tracking-[0.15px]"
            >
              Paid
            </p>
          </span>
          <span
            class="flex items-center justify-center bg-tomato-10 rounded-[16px] lg:w-fit w-full lg:ml-auto py-1.5 px-1.5 min-w-max action-full"
            v-else-if="tdata.status == 'unpaid'"
          >
            <img src="../../../assets/svgs/suspend.svg" alt="Check" />

            <p
              class="text-tomato text-center lg:text-[15px] text-[14px] ml-[5px]  font-medium leading-[100%] tracking-[0.15px]"
            >
              Unpaid
            </p>
          </span>
        </template>
      </Table>
    </div>
    <Pagination />
  </div>
</template>

<script setup>
import { ref } from "vue";
import Search from "@/components/Helper/Search.vue";
import Tab from "@/components/Helper/TabList.vue";
import Table from "@/components/server/Table.vue";
import Pagination from "../../../components/Helper/Pagination.vue";
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
    headPosition: "justify-end",
  },
]);

const Domainlist = ref([
  {
    icon: "world.svg",
    title: "Hosting tariff 1 (#232311)",
    action: "Web hosting renewal for 1 month",
    date: "12.07.2023",
    amount: "- $ 19.99",
    status: "paid",
  },
  {
    icon: "world.svg",
    title: "Hosting tariff 1 (#232311)",
    action: "Web hosting renewal for 1 month",
    date: "12.07.2023",
    amount: "- $ 19.99",
    status: "paid",
  },
  {
    icon: "world.svg",
    title: "Hosting tariff 1 (#232311)",
    action: "Web hosting renewal for 1 month",
    date: "12.07.2023",
    amount: "- $ 19.99",
    status: "paid",
  },
  {
    icon: "world.svg",
    title: "Hosting tariff 1 (#232311)",
    action: "Web hosting renewal for 1 month",
    date: "12.07.2023",
    amount: "- $ 19.99",
    status: "paid",
  },
  {
    icon: "world.svg",
    title: "Hosting tariff 1 (#232311)",
    action: "Web hosting renewal for 1 month",
    date: "12.07.2023",
    amount: "- $ 19.99",
    status: "paid",
  },
]);
</script>
