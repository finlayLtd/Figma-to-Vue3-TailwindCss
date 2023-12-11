<template>
  <div class="lg:p-5 p-4 bg-white dark:bg-white-5 border border-light-white-blue-8 rounded-[14px]">
    <div
      class="flex flex-wrap lg:flex-nowrap p-[3px] justify-center border rounded-[10px] border-solid border-light-white-gray dark:border-light-white-gray-8 bg-white-50 dark:bg-white-5"
    >
      <div
        class="flex lg:w-full w-[48%] items-center justify-center px-5 py-2"
        :class="
          activeBillingTab == 0
            ? 'bg-white rounded-[8px] shadow-gray-15  dark:bg-white-15 dark:shadow-light-15'
            : 'opacity-70'
        "
        @click="activeBillingTab = 0"
      >
        <p
          class="text-dark dark:text-white lg:text-[15px] text-[14px]  font-medium leading-6"
        >
          Renew Service
        </p>
      </div>

      <img
        src="../../../assets/svgs/divider.svg"
        class="mx-1.5 dark:brightness-[100]"
        alt="Divider"
      />

      <div
        class="flex lg:w-full w-[47%] items-center justify-center px-5 py-2"
        @click="activeBillingTab = 1"
        :class="
          activeBillingTab == 1
            ? 'bg-white rounded-[8px] shadow-gray-15 dark:bg-white-15 dark:shadow-light-15'
            : 'opacity-70'
        "
      >
        <p
          class="text-dark dark:text-white lg:text-[15px] text-[14px]  font-medium leading-6"
        >
          Invoices
        </p>
      </div>

      <img
        src="../../../assets/svgs/divider.svg"
        class="mx-1.5 hidden lg:block dark:brightness-[100]"
        alt="Divider"
      />

      <div
        class="flex lg:w-full w-[47%] items-center justify-center px-5 py-2"
        :class="
          activeBillingTab == 2
            ? 'bg-white rounded-[8px] shadow-gray-15 dark:bg-white-15 dark:shadow-light-15'
            : 'opacity-70'
        "
        @click="activeBillingTab = 2"
      >
        <p
          class="text-dark dark:text-white lg:text-[15px] text-[14px]  font-medium leading-6"
        >
          Cancellation
        </p>
      </div>

      <img
        src="../../../assets/svgs/divider.svg"
        class="mx-1.5 dark:brightness-[100]"
        alt="Divider"
      />

      <div
        class="flex lg:w-full w-[47%] items-center justify-center px-5 py-2"
        :class="
          activeBillingTab == 3
            ? 'bg-white rounded-[8px] shadow-gray-15 dark:bg-white-15 dark:shadow-light-15'
            : 'opacity-70'
        "
        @click="activeBillingTab = 3"
      >
        <p
          class="text-dark dark:text-white lg:text-[15px] text-[14px]  font-medium leading-6"
        >
          Refund
        </p>
      </div>
    </div>

    <div class="lg:mt-[25px] mt-5" v-if="activeBillingTab == 0">
      <p
        class="text-secondary-70 dark:text-white-70 lg:text-[15px] text-[14px]  font-medium leading-[140%]"
      >
        Current Due Date
      </p>
      <p
        class="text-secondary dark:text-white mt-[5px] mb-[14px] text-[15px]  font-medium leading-[140%]"
      >
        17/05/2023
      </p>
      <Btn class="text-white lg:max-w-[200px] w-full" bgColor="bg-blue" border-color="border-blue"
        >Renew Service</Btn
      >

      <p
        class="opacity-70 text-secondary-70 dark:text-white-70 text-sm  font-normal leading-[140%]; mt-5"
      >
        An invoice will be generated 7 days before the service's due date. Click
        Renew Service to manually renew your service before invoice generation.
      </p>
    </div>
    <div class="mt-[28px]" v-if="activeBillingTab == 2">
      <p
        class="text-secondary dark:text-white mt-[5px] mb-[14px] lg:text-[15px] text-[14px]  font-medium leading-[140%]"
      >
      Please click the button below to request for a service cancellation.
      </p>
      <Btn class="text-white lg:max-w-[200px] w-full" bgColor="bg-blue" border-color="border-blue"
        >Cancel Service</Btn
      >

      <p
        class="opacity-70 text-secondary-70 dark:text-white-70  lg:text-sm text-[13px]   font-normal leading-[140%]; mt-5 max-w-[900px]"
      >
        We will not process any refund request submitted through cancellation request. Please do not file for a cancellation if you wish to request for a refund, open a ticket to request for a refund.
      </p>
    </div>
    <div class="mt-[28px]" v-if="activeBillingTab == 3">
      <p
        class="text-secondary dark:text-white mt-[5px] mb-[14px] lg:text-[15px] text-[14px]  font-medium leading-[140%]"
      >
      Please open a ticket to request a refund.
      </p>
      <Btn class="text-white lg:max-w-[200px] w-full" bgColor="bg-blue"
        border-color="border-blue"
        >Open Ticket</Btn
      >

      <p
        class="opacity-70 text-secondary-70 dark:text-white-70  lg:text-sm text-[13px]  font-normal leading-[140%]; mt-5 max-w-[900px]"
      >
      This is subject to approval according to our Terms of Service.
      </p>
    </div>
  </div>

  <div class="my-5 bg-white dark:bg-white-5 border border-light-white-blue-8 rounded-t-[14px] overflow-hidden" v-if="activeBillingTab == 1">
    <Table :data="billingTabledata" :headings="billingTableHedding" overflow="overflow-x-auto">
      <template #id="{ tdata }">
        <div class="flex items-center">
          <div class="p-2 lg:mr-3 mr-2.5 rounded-[8px] bg-light-white dark:bg-light-white-8">
            <img :src="`/src/assets/svgs/${tdata.icon}`" class="dark:brightness-[100] min-w-[20px]" alt="Window" />
          </div>
          <div>
            <p
              class="text-primary dark:text-white text-[15px]  font-medium leading-[100%] tracking-[0.15px]"
            >
              {{ tdata.id }}
            </p>
          </div>
        </div>
      </template>
      <template #date="{ tdata }">
        <p
          class="text-primary dark:text-white text-[15px]  font-medium leading-[100%] tracking-[0.15px]"
        >
          {{ tdata.date }}
        </p>
      </template>
      <template #due="{ tdata }">
        <p
          class="text-primary dark:text-white text-[15px]  font-medium leading-[100%] tracking-[0.15px]"
        >
          {{ tdata.due }}
        </p>
      </template>
      <template #due2="{ tdata }">
        <p
          class="text-primary dark:text-white text-[15px]  font-medium leading-[100%] tracking-[0.15px]"
        >
          {{ tdata.due2 }}
        </p>
      </template>
      <template #paiddate="{ tdata }">
        <p
          class="text-primary dark:text-white text-[15px]  font-medium leading-[100%] tracking-[0.15px]"
        >
          {{ tdata.paid }}
        </p>
      </template>
      <template #amount="{ tdata }">
        <p
          class="text-primary dark:text-white text-[15px]  font-medium leading-[100%] tracking-[0.15px]"
        >
          {{ tdata.amount }}
        </p>
      </template>
      <template #action="{ tdata }">
        <span
          class="flex items-center w-fit bg-green-10 rounded-[16px] ml-auto py-1.5 px-1.5"
          v-if="tdata.status == 'Active'"
        >
          <img src="../../../assets/svgs/check-green.svg" alt="Check" />

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
      </template>
    </Table>
  </div>
</template>

<script setup>
import Btn from "@/components/Helper/Btn.vue";
import Table from "../../../components/server/Table.vue";
import { ref } from "vue";
const activeBillingTab = ref(0);

// const billingTab = ref(['Renew Service', 'Invoices', 'Cancellation', 'Refund'])

const billingTableHedding = ref([
  {
    name: "Invoice ID",
    slotName: "id",
    isSort: true,
    mobileIndex : 0
  },
  {
    name: "Invoice Date",
    slotName: "date",
    isSort: false,
    mobileIndex : 2
  },
  {
    name: "Due Date",
    slotName: "due",
    isSort: false,
    mobileIndex : 3
  },
  {
    name: "Due Date",
    slotName: "due2",
    isSort: false,
    mobileIndex : 4,
    mobileDisplay : false
  },
  {
    name: "Date Paid",
    slotName: "paiddate",
    isSort: false,
    mobileIndex : 5
  },
  {
    name: "Amount",
    slotName: "amount",
    isSort: false,
    mobileIndex : 1
  },
  {
    name: "Action",
    slotName: "action",
    isSort: false,
    mobileIndex : 6,
    headPosition : 'head-end'
  },
]);

const billingTabledata = ref([
  {
    icon: "billfile.svg",
    id: 58775,
    date: "2023-13-03",
    due: "2023-13-03",
    due2: "2023-13-03",
    paid: "2023-13-03  06:00:03",
    amount: "$ 9.99",
    status: "Active",
  },
  {
    icon: "billfile.svg",
    id: 58775,
    date: "2023-13-03",
    due: "2023-13-03",
    due2: "2023-13-03",
    paid: "2023-13-03  06:00:03",
    amount: "$ 9.99",
    status: "Active",
  },
  {
    icon: "billfile.svg",
    id: 58775,
    date: "2023-13-03",
    due: "2023-13-03",
    due2: "2023-13-03",
    paid: "2023-13-03  06:00:03",
    amount: "$ 9.99",
    status: "Active",
  },
]);
</script>

<style>
.head-end {
  @apply justify-end !important
}
</style>

